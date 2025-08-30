# CS2 Config Generator 🎮

A modern, web-based configuration generator for Counter-Strike 2. Create professional configs with an intuitive interface featuring key capture, smart resolution matching, and comprehensive settings coverage.

## ⚠️ IMPORTANT DISCLAIMER

**USE AT YOUR OWN RISK**: This tool generates configuration files for Counter-Strike 2. The author(s) are NOT responsible for:
- Game crashes or instability
- FPS drops or performance issues
- Hardware damage or system problems
- Any other issues that may arise from using generated configs

**ALWAYS VERIFY**: Before using any generated configuration:
1. ✅ Review all commands in the generated files
2. ✅ Test configs in a safe environment first
3. ✅ Backup your existing configs
4. ✅ Understand what each command does
5. ✅ Check for CS2 compatibility

**YOU ARE RESPONSIBLE** for ensuring the configs work properly with your system and CS2 installation.

## 🚀 Features

### Core Functionality
- **🎯 Complete Config Generation**: autoexec.cfg, video.cfg, binds
- **⌨️ Interactive Key Capture**: Press any key to auto-detect and bind
- **📺 Smart Resolution Matching**: Aspect ratio updates available resolutions
- **🎨 Modern UI**: CS2-themed dark interface with glassmorphism effects
- **💾 Multiple Export Options**: Download individual or complete config packages

### Supported Settings
- **Game Settings**: Rates, FPS limits, network optimization
- **Mouse Settings**: Sensitivity, acceleration, zoom ratios
- **Video Settings**: Resolution, graphics quality, display options
- **Audio Settings**: Volume, Steam Audio, voice chat
- **Crosshair Settings**: Complete customization with all CS2 options
- **HUD Settings**: Radar, UI elements, spectator options
- **Key Binds**: Movement, weapons, utilities, custom commands

## 🖥️ System Requirements

- Modern web browser (Chrome, Firefox, Edge, Safari)
- JavaScript enabled
- Counter-Strike 2 installed
- Basic understanding of CS2 console commands

## 📋 Quick Start

1. **Open the Tool**: Navigate to `index.html` in your browser
2. **Configure Settings**: Adjust values in each section as needed
3. **Use Key Capture**: Click "Capture" buttons to auto-detect keys
4. **Generate Configs**: Click "Generate" for each section you want
5. **Download Files**: Save the .cfg files to your CS2 config folder
6. **Install Configs**: Copy files to your CS2 cfg directory

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

## ⚙️ Technical Details

### File Structure
- `index.html` - Main application (single file, no dependencies)
- `STEAM_GUIDE.md` - Comprehensive user guide for Steam
- `README.md` - This file

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

## 🌐 Hosting

### Local Hosting
1. Download/clone the files
2. Open `index.html` in any modern browser
3. No server required for basic functionality

### Web Server Hosting
1. Upload `index.html` to your web server
2. Ensure proper MIME types for .cfg downloads
3. Configure HTTPS (recommended)
4. Test all features work correctly

### Server Requirements
- Static file hosting (Apache, Nginx, or any HTTP server)
- No database or backend required
- Minimal bandwidth usage

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

This is a community project. Feel free to:
- Report bugs or issues
- Suggest new features
- Share improved configs
- Help with documentation
- Translate to other languages

## 📄 License

This project is provided "as-is" for educational and community purposes. Use responsibly and at your own risk.

## 🙏 Acknowledgments

- CS2 community for testing and feedback
- Professional players for config insights
- Valve for Counter-Strike 2
- Open source community for inspiration

---

**Remember**: The best config is one that works for YOUR setup and playstyle. Use this tool as a starting point, then customize based on your needs and preferences.

**Stay safe, play fair, and have fun! 🎯**
