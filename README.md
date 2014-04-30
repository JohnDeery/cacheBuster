# Piwik cacheBuster Plugin

## Description

This plugin will clear out the tmp dir of Piwik. Useful for when you are developing other plugins or just need to kill that file and can't get to your installation to delete it normally

## Changelog
~2014~

2014-04-29 - Thanks to Thomas-Piwik at (http://forum.piwik.org/read.php?9,114223,114638#msg-114638), we now have a nice message that let's us know that the cache has been cleared. Also, per that same thread, updated the delete code to use Filesystem::unlinkRecursive instead of native delete commands. 

2014-04-19 - Updated to work with 2.2.0. Removed the custom directory separator code and switch to use the PHP constant.

2014-02-21 - Update some more code, added in notification area but it's not quite working yet (TODO - make it work)

2014-02-21 - Rebranded to cacheBuster and set version to 1.0, updated code to use a better check for directory seperator

2014-02-20 - v2.0 - Updated plugin to work with Piwik 2.0.3

~2013~

Inital creation of plugin at http://www.spherexx.com under the name ClearCache

## Support
Please direct any feedback to john.deery@gmail.com