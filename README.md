# Timezone Plugin #

## Description ##

This plugin allows you to set the php and the mysql timezones.
phplist lets you set the timezone using a config file parameter, SYSTEM_TIMEZONE, but that has to be a value that is valid for both
php and for mysql, such as 'Australia/Sydney'. This requires mysql to support time zone information tables, which often is not the case.

This plugin sets the mysql timezone using an offset calculated from the php timezone.

## Installation ##

### Dependencies ###

Requires phpList version 3.3.0 or later and also requires the Common Plugin to be enabled.

### Install through phplist ###

Install on the Plugins page (menu Config > Manage Plugins) using the package URL `https://github.com/bramley/phplist-plugin-timezone/archive/master.zip`

Then click the Enable button to enable the plugin.

## Configuration ##

The plugin provides a page that displays the php and mysql timezone and time, and lets you select the php timezone.
The page is accessed through menu Config > Timezones.

## Donation ##

This plugin is free but if you install and find it useful then a donation to support further development is greatly appreciated.

[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W5GLX53WDM7T4)

## Version history ##

    version     Description
    2.1.2+20230609  Ensure that this plugin is activated after Common plugin and before other plugins
    2.1.1+20210629  Make the dependency check message regarding Common Plugin a bit clearer
    2.1.0+20181127  Use a drop-down list to select timezone
    2.0.2+20160217  Change menu caption
    2.0.1+20150906  Fix problem where settings are not displayed
    2014-12-21      Set mysql timezone to offset calculated from the php timezone.
    2014-12-04      Initial release
