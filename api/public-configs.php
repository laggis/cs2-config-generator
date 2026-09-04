<?php
// CS2 Config Generator - public configuration API
// Compatible with PHP 7.2+ (and PHP 8.x).

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

// Do not let PHP warnings/notices corrupt the JSON response.
ini_set('display_errors', '0');
error_reporting(E_ALL);

$MAX_CONFIG_BYTES = 262144; // 256 KiB
$MAX_NAME_LENGTH = 80;
$MAX_USERNAME_LENGTH = 40;
$storageRoot = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'public-configs';

function respond($status, $payload) {
    http_response_code((int)$status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

function readBody($maxConfigBytes) {
    $raw = file_get_contents('php://input');
    if ($raw === false || $raw === '') {
        return array();
    }

    if (strlen($raw) > $maxConfigBytes + 16384) {
        respond(413, array('ok' => false, 'error' => 'Request is too large.'));
    }

    $data = json_decode($raw, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        respond(400, array('ok' => false, 'error' => 'Invalid JSON request.'));
    }

    return is_array($data) ? $data : array();
}

function cleanText($value, $max) {
    $value = trim((string)$value);
    if (function_exists('mb_substr')) {
        return mb_substr($value, 0, $max, 'UTF-8');
    }
    return substr($value, 0, $max);
}

function makeOwnerKey($username) {
    $slug = strtolower($username);
    $slug = preg_replace('/[^a-z0-9_-]+/i', '-', $slug);
    if ($slug === null) {
        $slug = 'user';
    }
    $slug = trim($slug, '-_');
    if ($slug === '') {
        $slug = 'user';
    }
    $slug = substr($slug, 0, 28);
    return $slug . '-' . substr(hash('sha256', $username), 0, 10);
}

function validOwnerKey($key) {
    return preg_match('/^[a-z0-9_-]{1,50}$/', $key) === 1;
}

function validId($id) {
    return preg_match('/^[a-f0-9]{32}$/', $id) === 1;
}

function ensureStorage($root) {
    if (!is_dir($root)) {
        if (!mkdir($root, 0750, true) && !is_dir($root)) {
            respond(500, array(
                'ok' => false,
                'error' => 'Public configuration storage is not writable. Give the web/PHP user write permission to storage/public-configs.'
            ));
        }
    }

    if (!is_writable($root)) {
        respond(500, array(
            'ok' => false,
            'error' => 'storage/public-configs exists but PHP cannot write to it. Check NTFS/web-server permissions.'
        ));
    }
}

function ownerFile($dir) {
    return $dir . DIRECTORY_SEPARATOR . '_owner.json';
}

function verifyOrClaimOwner($root, $username, $token, $maxUsernameLength) {
    if ($username === '' || strlen($username) > $maxUsernameLength) {
        respond(400, array('ok' => false, 'error' => 'Username must be between 1 and 40 characters.'));
    }

    if (strlen($token) < 20 || strlen($token) > 256) {
        respond(400, array('ok' => false, 'error' => 'Invalid publishing key.'));
    }

    $key = makeOwnerKey($username);
    $dir = $root . DIRECTORY_SEPARATOR . $key;

    if (!is_dir($dir)) {
        if (!mkdir($dir, 0750, true) && !is_dir($dir)) {
            respond(500, array('ok' => false, 'error' => 'Could not create the publisher directory. Check folder permissions.'));
        }
    }

    $ownerPath = ownerFile($dir);
    if (is_file($ownerPath)) {
        $ownerRaw = file_get_contents($ownerPath);
        $owner = $ownerRaw !== false ? json_decode($ownerRaw, true) : null;

        if (!is_array($owner) || !isset($owner['tokenHash']) || !password_verify($token, (string)$owner['tokenHash'])) {
            respond(403, array(
                'ok' => false,
                'error' => 'This public username is already claimed by a different browser/publishing key.'
            ));
        }
    } else {
        $owner = array(
            'username' => $username,
            'tokenHash' => password_hash($token, PASSWORD_DEFAULT),
            'created' => gmdate('c')
        );

        $encodedOwner = json_encode($owner, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if ($encodedOwner === false || file_put_contents($ownerPath, $encodedOwner, LOCK_EX) === false) {
            respond(500, array('ok' => false, 'error' => 'Could not save publisher ownership data. Check folder permissions.'));
        }
    }

    return array($key, $dir);
}

function readConfigFile($path) {
    if (!is_file($path)) {
        return null;
    }

    $raw = file_get_contents($path);
    if ($raw === false) {
        return null;
    }

    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : null;
}

function compareSavedNewestFirst($a, $b) {
    $aSaved = isset($a['saved']) ? (string)$a['saved'] : '';
    $bSaved = isset($b['saved']) ? (string)$b['saved'] : '';
    return strcmp($bSaved, $aSaved);
}

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';
if ($method === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($method !== 'POST') {
    respond(405, array('ok' => false, 'error' => 'POST requests only.'));
}

ensureStorage($storageRoot);
$body = readBody($MAX_CONFIG_BYTES);
$action = isset($body['action']) ? (string)$body['action'] : '';

// Lightweight test used for troubleshooting.
if ($action === 'status') {
    respond(200, array(
        'ok' => true,
        'api' => 'public-configs',
        'version' => '2.1',
        'phpVersion' => PHP_VERSION,
        'storageWritable' => is_writable($storageRoot)
    ));
}

if ($action === 'publish') {
    $username = cleanText(isset($body['username']) ? $body['username'] : '', $MAX_USERNAME_LENGTH);
    $token = isset($body['publishToken']) ? (string)$body['publishToken'] : '';
    $name = cleanText(isset($body['name']) ? $body['name'] : '', $MAX_NAME_LENGTH);
    $type = cleanText(isset($body['type']) ? $body['type'] : '', 20);
    $data = isset($body['data']) ? (string)$body['data'] : '';

    if ($name === '') {
        respond(400, array('ok' => false, 'error' => 'Configuration name is required.'));
    }

    if (!in_array($type, array('autoexec', 'binds', 'practice'), true)) {
        respond(400, array('ok' => false, 'error' => 'Unsupported configuration type.'));
    }

    if ($data === '' || strlen($data) > $MAX_CONFIG_BYTES) {
        respond(400, array('ok' => false, 'error' => 'Configuration must be between 1 byte and 256 KiB.'));
    }

    list($key, $dir) = verifyOrClaimOwner($storageRoot, $username, $token, $MAX_USERNAME_LENGTH);
    $id = bin2hex(random_bytes(16));
    $saved = gmdate('c');

    $record = array(
        'id' => $id,
        'ownerKey' => $key,
        'username' => $username,
        'name' => $name,
        'type' => $type,
        'saved' => $saved,
        'size' => strlen($data),
        'data' => $data
    );

    $path = $dir . DIRECTORY_SEPARATOR . $id . '.json';
    $encodedRecord = json_encode($record, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    if ($encodedRecord === false || file_put_contents($path, $encodedRecord, LOCK_EX) === false) {
        respond(500, array('ok' => false, 'error' => 'Could not save the public configuration. Check folder permissions.'));
    }

    $meta = $record;
    unset($meta['data']);
    respond(201, array('ok' => true, 'config' => $meta));
}

if ($action === 'list') {
    $configs = array();
    $dirs = glob($storageRoot . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);
    if ($dirs === false) {
        $dirs = array();
    }

    foreach ($dirs as $dir) {
        $files = glob($dir . DIRECTORY_SEPARATOR . '*.json');
        if ($files === false) {
            $files = array();
        }

        foreach ($files as $file) {
            if (basename($file) === '_owner.json') {
                continue;
            }

            $record = readConfigFile($file);
            if (!$record || !isset($record['id'], $record['username'], $record['name'], $record['type'])) {
                continue;
            }

            unset($record['data']);
            $configs[] = $record;
        }
    }

    usort($configs, 'compareSavedNewestFirst');
    $configs = array_slice($configs, 0, 250);
    respond(200, array('ok' => true, 'configs' => $configs));
}

if ($action === 'get') {
    $key = isset($body['ownerKey']) ? (string)$body['ownerKey'] : '';
    $id = isset($body['id']) ? (string)$body['id'] : '';

    if (!validOwnerKey($key) || !validId($id)) {
        respond(400, array('ok' => false, 'error' => 'Invalid public configuration ID.'));
    }

    $path = $storageRoot . DIRECTORY_SEPARATOR . $key . DIRECTORY_SEPARATOR . $id . '.json';
    $record = readConfigFile($path);
    if (!$record) {
        respond(404, array('ok' => false, 'error' => 'Public configuration not found.'));
    }

    respond(200, array('ok' => true, 'config' => $record));
}

if ($action === 'delete') {
    $username = cleanText(isset($body['username']) ? $body['username'] : '', $MAX_USERNAME_LENGTH);
    $token = isset($body['publishToken']) ? (string)$body['publishToken'] : '';
    $requestedKey = isset($body['ownerKey']) ? (string)$body['ownerKey'] : '';
    $id = isset($body['id']) ? (string)$body['id'] : '';

    if (!validOwnerKey($requestedKey) || !validId($id)) {
        respond(400, array('ok' => false, 'error' => 'Invalid public configuration ID.'));
    }

    list($key, $dir) = verifyOrClaimOwner($storageRoot, $username, $token, $MAX_USERNAME_LENGTH);
    if (!hash_equals($key, $requestedKey)) {
        respond(403, array('ok' => false, 'error' => 'You can only delete your own public configurations.'));
    }

    $path = $dir . DIRECTORY_SEPARATOR . $id . '.json';
    if (!is_file($path)) {
        respond(404, array('ok' => false, 'error' => 'Public configuration not found.'));
    }

    if (!unlink($path)) {
        respond(500, array('ok' => false, 'error' => 'Could not delete the public configuration.'));
    }

    respond(200, array('ok' => true));
}

respond(400, array('ok' => false, 'error' => 'Unknown action.'));
