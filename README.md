# CS2 Configuration Generator 🎮

**Open Source & Privacy-First** - A modern, web-based configuration generator for Counter-Strike 2. Create professional configs with an intuitive interface featuring key capture, smart resolution matching, and comprehensive settings coverage.

[![100% Client-Side](https://img.shields.io/badge/100%25-Client--Side-4CAF50?style=flat-square)](https://github.com/LaGgIs/cs2-config-generator)
[![Privacy Protected](https://img.shields.io/badge/Privacy-Protected-2196F3?style=flat-square)](#-privacy--security)
[![Open Source](https://img.shields.io/badge/Open-Source-ff6b35?style=flat-square)](https://github.com/LaGgIs/cs2-config-generator)

## ⚠️ IMPORTANT DISCLAIMER

**USE AT YOUR OWN RISK**: This tool generates configuration files for Counter-Strike 2. The author(s) are NOT responsible for:
- Game crashes or instability
- FPS drops or performance issues
- VAC bans or account issues
- Hardware damage or system problems
- Any other issues that may arise from using generated configs

**ALWAYS VERIFY**: Before using any generated configuration:
1. ✅ Review all commands in the generated files
2. ✅ Test configs in a safe environment first
3. ✅ Backup your existing configs
4. ✅ Understand what each command does
5. ✅ Check for CS2 compatibility

**YOU ARE RESPONSIBLE** for ensuring the configs work properly with your system and CS2 installation.

## 🛡️ Privacy & Security

### 100% Client-Side Operation
- **No Data Collection**: We don't collect, store, or have access to any of your data
- **Local Storage Only**: Your browser stores settings locally using localStorage
- **No External Servers**: Everything runs in your browser - no data sent anywhere
- **Complete Privacy**: Your configurations never leave your device
- **Open Source**: Full transparency - [view the source code](https://github.com/LaGgIs/cs2-config-generator)

### What's Stored Locally
- Your username and password (base64 encoded) for convenience
- Your CS2 game configurations and preferences
- All data stays in your browser's local storage

### What We DON'T Do
- ❌ No IP address logging
- ❌ No analytics or tracking
- ❌ No external API calls
- ❌ No data transmission to servers
- ❌ No cookies or persistent tracking

## 🚀 Features

### Core Functionality
- **🎯 Complete Config Generation**: autoexec.cfg, video.cfg, binds, and more
- **⌨️ Interactive Key Capture**: Press any key to auto-detect and bind instantly
- **📺 Smart Resolution Matching**: Aspect ratio automatically updates available resolutions
- **🎨 Modern Dark UI**: CS2-themed interface with glassmorphism effects and smooth animations
- **💾 Multiple Export Options**: Download individual configs or complete packages
- **🔄 Real-time Preview**: See changes instantly as you configure settings
- **💾 Auto-Save**: Your settings are automatically saved locally as you work
- **🏆 Pro Player Configs**: Pre-configured settings from top CS2 professionals (m0NESY, donk, s1mple, ZywOo, NiKo, sh1ro)

### Comprehensive Settings Coverage
- **🎮 Game Settings**: Network rates, FPS limits, performance optimization, developer options
- **🖱️ Mouse Settings**: Sensitivity, acceleration, zoom ratios, raw input
- **📺 Video Settings**: Resolution, aspect ratio, graphics quality, display modes
- **🔊 Audio Settings**: Master/game/voice volumes, Steam Audio, voice chat settings
- **🎯 Crosshair Settings**: Complete customization with all CS2 crosshair options and real-time preview
- **🖥️ HUD Settings**: Radar configuration, UI elements, spectator options, scaling
- **⌨️ Advanced Binds**: Movement, weapons, utilities, grenades, custom commands
- **⚙️ Autoexec Settings**: Launch options, console commands, advanced configurations

## 🖥️ System Requirements

- Modern web browser (Chrome, Firefox, Edge, Safari)
- JavaScript enabled
- Counter-Strike 2 installed
- Basic understanding of CS2 console commands

## 📋 Quick Start

1. **Open the Tool**: Navigate to `index.html` in your browser or visit the hosted version
2. **Login (Optional)**: Create a username/password to save your configurations locally
3. **Configure Settings**: 
   - Navigate through tabs (Game, Mouse, Video, Audio, Crosshair, HUD, Binds, Autoexec)
   - Adjust values - they auto-save as you work
   - Use "Capture" buttons for instant key detection
4. **Generate Configs**: Click "Generate" buttons for each section you want to export
5. **Download Files**: Save the .cfg files (browser may warn - click "Keep" to proceed)
6. **Install Configs**: Copy files to your CS2 cfg directory (see paths below)

## 📁 Installation Paths

### Windows
```
C:\Program Files (x86)\Steam\userdata\[USERID]\730\local\cfg\
```

### macOS
```
~/Library/Application Support/Steam/userdata/[USERID]/730/local/cfg/
```

### Linux
```
~/.local/share/Steam/userdata/[USERID]/730/local/cfg/
```

**Finding Your Steam ID**: Go to Steam → View → Settings → Interface → Check "Display Steam URL address bar" → Visit your profile → The number in the URL is your Steam ID.

## 🔧 Usage Guide

### Basic Configuration
1. **Game Settings**: Set rates (128 for competitive), FPS limits, network settings
2. **Mouse Settings**: Configure sensitivity, zoom ratio, acceleration
3. **Video Settings**: Choose aspect ratio, resolution, graphics quality
4. **Audio Settings**: Set volumes, enable/disable Steam Audio

### Advanced Features
- **Key Capture**: Click any "Capture" button, then press your desired key
- **Aspect Ratio Linking**: Changing aspect ratio automatically filters resolutions
- **Custom Binds**: Add your own commands and key combinations
- **Export Options**: Generate individual sections or complete config packages
- **Pro Player Configs**: One-click download of professional player configurations

### 🏆 Pro Player Configurations

The tool includes pre-configured settings from top CS2 professionals:

#### Featured Players
- **m0NESY** 🇷🇺 (Falcons Esports) - Sensitivity: 2.3, DPI: 400, Resolution: 1280x960
- **donk** 🇷🇺 (Team Spirit) - Sensitivity: 1.25, DPI: 400, Resolution: 1280x960  
- **s1mple** 🇺🇦 (B8.Game) - Sensitivity: 3.09, DPI: 400, Resolution: 1280x960
- **ZywOo** 🇫🇷 (Team Vitality) - Sensitivity: 2.0, DPI: 400, Resolution: 1280x960
- **NiKo** 🇧🇦 (Falcons Esports) - Sensitivity: 1.35, DPI: 400, Resolution: 1280x960
- **sh1ro** 🇷🇺 (Cloud9) - Sensitivity: 1.3, DPI: 400, Resolution: 1280x960

#### What's Included
Each pro config contains:
- **Mouse Settings**: Exact sensitivity, DPI, and zoom ratios
- **Video Settings**: Resolution, aspect ratio, and graphics preferences
- **Viewmodel Settings**: Weapon positioning and field of view
- **Crosshair Settings**: Complete crosshair configuration
- **Advanced Settings**: Network rates, FPS limits, and performance optimizations

#### How to Use Pro Configs
1. Browse the **Pro Players** section in the interface
2. Click on any player card to view their detailed settings
3. Click **"📥 Download Config"** to get their complete configuration
4. The downloaded config includes all their optimized settings
5. Copy the files to your CS2 cfg directory and restart the game

## ⚠️ Browser Security Notice

When downloading .cfg files, browsers may show security warnings like "This file could harm your computer" or "Potentially dangerous file." This is **normal behavior** because:

- Browsers flag any executable/configuration files as potentially risky
- .cfg files are text-based configuration files, not executable programs
- The files are completely safe - they only contain CS2 console commands
- **Solution**: Click "Keep," "Allow," or "Download anyway" when prompted

This security warning appears for ALL .cfg files, regardless of source. It's a browser safety feature, not an indication of malicious content.

## ⚙️ Technical Details

### Architecture
- **Single File Application**: Everything contained in `index.html` - no external dependencies
- **Pure Client-Side**: No server required, runs entirely in your browser
- **Zero Dependencies**: No frameworks, libraries, or external resources needed
- **Lightweight**: Fast loading and responsive performance
- **Optimized Rendering**: Enhanced CSS specificity handling for consistent UI display
- **Professional UI**: Modern glassmorphism design with gradient backgrounds and smooth animations

### File Structure
- `index.html` - Complete application (HTML, CSS, JavaScript all-in-one)
- `README.md` - This documentation file
- `STEAM_GUIDE.md` - Comprehensive user guide for Steam (if present)

### Browser Compatibility
- ✅ Chrome 80+
- ✅ Firefox 75+
- ✅ Edge 80+
- ✅ Safari 13+

### Key Mapping Support
- Full keyboard support (including 60% keyboards)
- Mouse buttons (left, right, middle, side buttons)
- Scroll wheel (up/down)
- Special keys (F1-F12, arrows, etc.)

## 🌐 Hosting & Deployment

### Local Usage (Recommended)
1. Download `index.html` 
2. Double-click to open in your browser
3. **That's it!** - No installation, no server, no setup required
4. Works completely offline

### Web Hosting (Optional)
1. Upload `index.html` to any web server
2. Access via your domain - fully functional immediately
3. **Zero Configuration** - no database, no backend setup needed

### Deployment Benefits
- **Instant Setup**: Single file deployment
- **No Dependencies**: No Node.js, PHP, databases, or frameworks required
- **Universal Compatibility**: Works on any web server or locally
- **Privacy by Design**: No server-side data processing or storage
- **Minimal Resources**: Tiny bandwidth usage, fast loading

### Server Requirements
- **Static File Hosting**: Any web server (Apache, Nginx, GitHub Pages, Netlify, etc.)
- **HTTPS**: Recommended for web deployment
- **MIME Types**: Ensure .cfg files download properly (usually automatic)

## 🐛 Troubleshooting

### Common Issues

**Config not loading in CS2:**
- Verify files are in correct cfg folder
- Check file permissions
- Try `exec autoexec` in CS2 console
- Ensure CS2 is closed when copying files

**Key capture not working:**
- Click "Capture" button first
- Ensure browser has focus
- Try refreshing the page
- Some special keys may not be supported

**Download issues:**
- Check browser download settings
- Disable popup blockers
- Try right-click → "Save as"
- Clear browser cache

**Performance problems:**
- Review FPS limit settings
- Check graphics quality options
- Verify hardware compatibility
- Test with minimal configs first

**Pro player configs not displaying:**
- Refresh the page and wait for full loading
- Ensure JavaScript is enabled in your browser
- Check browser console for any errors (F12)
- Try clearing browser cache and reloading

## ⚠️ Safety Guidelines

### Before Using Generated Configs
1. **Backup existing configs** - Save your current working configs
2. **Test in offline mode** - Try configs in bot matches first
3. **Review all commands** - Understand what each setting does
4. **Start minimal** - Begin with basic settings, add complexity gradually
5. **Monitor performance** - Watch for FPS drops or stability issues

### Red Flags to Watch For
- Unusual FPS drops after applying configs
- Game crashes or freezing
- Input lag or responsiveness issues
- Graphics artifacts or display problems
- Network connectivity issues

### If Problems Occur
1. **Immediately revert** to your backup configs
2. **Restart CS2** completely
3. **Verify game files** through Steam if needed
4. **Test individual sections** to isolate problematic settings
5. **Seek community help** if issues persist

## 📚 Resources

### Official Documentation
- [CS2 Console Commands](https://developer.valvesoftware.com/wiki/Counter-Strike_2)
- [Steam Support](https://help.steampowered.com/)

### Community Resources
- r/GlobalOffensive - Reddit community
- r/CounterStrike - CS2-specific discussions
- HLTV.org - Professional configs and guides
- Steam Community Guides

### Useful Console Commands
```
exec autoexec          // Reload autoexec.cfg
host_writeconfig       // Save current settings
clear                  // Clear console
find [command]         // Search commands
help [command]         // Get command help
```

## 🤝 Contributing

This is an open-source community project. Contributions welcome:
- 🐛 Report bugs or issues
- 💡 Suggest new features or improvements
- 📝 Help with documentation
- 🌍 Translate to other languages
- 🔧 Submit code improvements
- 📊 Share config optimizations

**GitHub Repository**: [LaGgIs/cs2-config-generator](https://github.com/LaGgIs/cs2-config-generator)

## 🎯 Project Philosophy

### Privacy-First Design
- **Your Data, Your Device**: Everything stays local - we never see your configurations
- **No Tracking**: Zero analytics, cookies, or data collection
- **Open Source**: Complete transparency in how your data is handled
- **Offline Capable**: Works without internet connection

### Community-Driven
- Built by the CS2 community, for the CS2 community
- Feedback and suggestions drive development
- Professional player insights incorporated
- Continuous improvement based on user needs

## 📄 License

This project is provided "as-is" for educational and community purposes. Use responsibly and at your own risk.

## 🙏 Acknowledgments

- **CS2 Community**: For testing, feedback, and feature requests
- **Professional Players**: For sharing optimal configuration insights
- **Privacy Advocates**: For inspiring the privacy-first approach
- **Open Source Community**: For tools, inspiration, and best practices
- **Valve**: For Counter-Strike 2 and comprehensive console documentation

---

## 💭 Final Notes

**Remember**: The best config is one that works for YOUR setup and playstyle. Use this tool as a starting point, then customize based on your needs and preferences.

**Privacy Matters**: Your gaming configurations are personal. That's why this tool keeps everything local and private.

**Stay safe, play fair, and have fun! 🎯**