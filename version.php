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
 * Version information for availability_groupmanager.
 *
 * This availability condition enforces access control based on group intake dates
 * managed by local_groupmanager. It integrates with Moodle's core availability
 * system to properly hide activities before/after access windows.
 *
 * v2.0.3: FIX duplicate admin page name error - settings.php now uses Moodle-provided $settings object
 *
 * @package   availability_groupmanager
 * @copyright 2025 Essay Grader AI
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'availability_groupmanager';
$plugin->version   = 2026082901;
$plugin->requires  = 2022041900; // Moodle 4.0+
$plugin->supported  = [400, 500];  // Moodle 4.0 to 5.x
$plugin->maturity  = MATURITY_STABLE;
$plugin->release   = '2.0.7'; // RELEASE RECOVERY: Republished the reviewed authoritative source under a new immutable tag because the historical tag contained a different source tree. No functional changes.
$plugin->dependencies = [
    'local_groupmanager' => 2025121800
];
