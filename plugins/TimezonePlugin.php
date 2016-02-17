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
 * @copyright 2014-2016 Duncan Cameron
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
    public $documentationUrl = 'https://resources.phplist.com/plugin/timezone';
    public $settings = array(
        'timezone_php' => array (
          'value' => '',
          'description' => 'php timezone (leave empty to use the system value)',
          'type' => 'text',
          'allowempty' => true,
          'category'=> 'Timezone',
        )
    );
    public $topMenuLinks = array(
        'displaytz' => array('category' => 'config'),
    );
    public $pageTitles = array(
        'displaytz' => 'Timezones',
    );

    public function __construct()
    {
        $this->coderoot = dirname(__FILE__) . '/' . self::PLUGIN . '/';
        $this->version = (is_file($f = $this->coderoot . self::VERSION_FILE))
            ? file_get_contents($f)
            : '';
        parent::__construct();
    }

    public function activate()
    {
        parent::activate();
        $tz = getConfig('timezone_php');
        
        if ($tz == '') {
            return;
        }

        if (!date_default_timezone_set($tz)) {
            echo "Error setting php timezone, $tz" . '<br/>';
            return;
        }

        $dt = new DateTime();
        $gmtOffset = $dt->format('P');
        Sql_Query("set time_zone = '$gmtOffset'");
    }

    public function adminmenu()
    {
        return $this->pageTitles;
    }
}
