# Timezone Plugin #

## Description ##

This plugin allows you to set the php and the mysql timezones.
phplist lets you set the timezone using a config file parameter, SYSTEM_TIMEZONE, but that has to be a value that is valid for both
php and for mysql, such as 'Australia/Sydney'. This requires mysql to support time zone information tables, which often is not the case.

This plugin sets the mysql timezone using an offset calculated from the php timezone.

The plugin also adds an item to the Config menu for a page that displays the php timezone and time, and the mysql timezone and time.

## Installation ##

### Dependencies ###

Requires php version 5.3 or later.

### Set the plugin directory ###
The default plugin directory is `plugins` within the phplist `admin` directory but you can use a directory outside of the web root by
changing the definition of `PLUGIN_ROOTDIR` in config.php.
The benefit of this is that plugins will not be affected when you upgrade phplist.

### Install through phplist ###
Install on the Plugins page (menu Config > Manage Plugins) using the package URL `https://github.com/bramley/phplist-plugin-timezone/archive/master.zip`.

In phplist releases 3.0.5 and earlier there is a bug that can cause a plugin to be incompletely installed on some configurations (<https://mantis.phplist.com/view.php?id=16865>). 
Check that these files are in the plugin directory. If not then you will need to install manually. The bug has been fixed in release 3.0.6.

* the file TimezonePlugin.php
* the directory TimezonePlugin

Then click the small orange icon to enable the plugin.

### Install manually ###
Download the plugin zip file from <https://github.com/bramley/phplist-plugin-timezone/archive/master.zip>

Expand the zip file, then copy the contents of the plugins directory to your phplist plugins directory.
This should contain

* the file TimezonePlugin.php
* the directory TimezonePlugin

Then click the small orange icon to enable the plugin.

## Configuration ##
In the Timezone group on the Settings page you can specify the php timezone.
This should be a value similar to 'Australia/Sydney'. See <http://php.net/manual/en/timezones.php> for the supported timezones.

## Donation ##

This plugin is free but if you install and find it useful then a donation to support further development is greatly appreciated.

[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W5GLX53WDM7T4)

## Version history ##

    version     Description
    2.0.2+20160217
    2.0.1+20150906  Fix problem where settings are not displayed
    2014-12-21      Set mysql timezone to offset calculated from the php timezone.
    2014-12-04      Initial release