<?php
/**
 * TimezonePlugin for phplist
 * 
 * This file is a part of TimezonePlugin.
 *
 * This plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * @category  phplist
 * @package   TimezonePlugin
 * @author    Duncan Cameron
 * @copyright 2014 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

 /**
 * Registers the plugin with phplist
 */

class TimezonePlugin extends phplistPlugin
{
    const VERSION_FILE = 'version.txt';
    const PLUGIN = 'TimezonePlugin';

    /*
     *  Inherited variables
     */
    public $name = 'Timezone plugin';
    public $authors = 'Duncan Cameron';
    public $description = 'Allows you to set the php and mysql timezones.';
    public $enabled = 1;
    public $settings;
    public $topMenuLinks = array(
        'displaytz' => array('category' => 'config'),
    );
    public $pageTitles = array(
        'displaytz' => 'Display timezone',
    );

    public function __construct()
    {
        $this->coderoot = dirname(__FILE__) . '/' . self::PLUGIN . '/';
        $this->version = (is_file($f = $this->coderoot . self::VERSION_FILE))
            ? file_get_contents($f)
            : '';
        $this->settings = array(
            'timezone_php' => array (
              'value' => 'Europe/London',
              'description' => 'php timezone',
              'type' => 'text',
              'allowempty' => false,
              'category'=> 'Timezone',
            ),
            'timezone_mysql' => array (
              'value' => '+00:00',
              'description' => 'mysql timezone',
              'type' => 'text',
              'allowempty' => false,
              'category'=> 'Timezone',
            )
        );
        parent::__construct();
    }

    public function activate()
    {
        $tz = sql_escape(getConfig('timezone_mysql'));
        Sql_Query("set time_zone = '$tz'");
        $result = Sql_Fetch_Row_Query('select @@session.time_zone');

        if ($result[0] != $tz) {
            print "Error setting mysql timezone, $tz {$result[0]}" . '<br/>';
        }

        $tz = getConfig('timezone_php');
        
        if (!date_default_timezone_set($tz)) {
            print "Error setting php timezone, $tz" . '<br/>';
        }
    }
}
