<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings for availability_groupmanager.
 *
 * @package   availability_groupmanager
 * @copyright 2025 Essay Grader AI
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $centralconfiginstalled = file_exists($CFG->dirroot . '/local/aiconfig/version.php');

    $settings->add(new admin_setting_heading(
        'availability_groupmanager/apicredentials',
        get_string('apicredentials', 'availability_groupmanager'),
        get_string('apicredentials_desc', 'availability_groupmanager')
    ));

    $settings->add(new admin_setting_configtext(
        'availability_groupmanager/siteid',
        get_string('siteid', 'availability_groupmanager'),
        get_string('siteid_desc', 'availability_groupmanager') . ($centralconfiginstalled ? ' ' . get_string('centralconfig_fallback', 'availability_groupmanager') : ''),
        '',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configpasswordunmask(
        'availability_groupmanager/apikey',
        get_string('apikey', 'availability_groupmanager'),
        get_string('apikey_desc', 'availability_groupmanager') . ($centralconfiginstalled ? ' ' . get_string('centralconfig_fallback', 'availability_groupmanager') : ''),
        ''
    ));
}
