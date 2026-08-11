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
 * Availability condition for group intake access control.
 *
 * This is where activity hiding actually works in Moodle 4.2+.
 * The condition runs BEFORE modinfo is cached, which is the only
 * correct way to control activity visibility.
 *
 * @package   availability_groupmanager
 * @copyright 2025 Essay Grader AI
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace availability_groupmanager;

use core_availability\condition as base_condition;
use core_availability\info;
use context_course;

defined('MOODLE_INTERNAL') || die();

class condition extends base_condition {
    /**
     * Constructor.
     *
     * @param \stdClass $structure Data structure from JSON decode
     */
    public function __construct($structure) {
        // No configuration needed - condition applies course-wide
    }

    /**
     * Saves data back to a structure object.
     *
     * @return \stdClass Structure object to be encoded to JSON
     */
    public function save() {
        return (object)['type' => 'groupmanager'];
    }

    /**
     * Determines whether the availability condition is met.
     *
     * This runs BEFORE modinfo is cached - the correct place for access control.
     *
     * @param bool $not Set true if we are inverting the condition
     * @param info $info Item we're checking
     * @param bool $graession Get reason for lack of access
     * @param int $userid User ID to check condition for (0 = current user)
     * @return bool True if available
     */
    public function is_available($not, info $info, $graession, $userid) {
        global $CFG;

        // Guests never pass
        if (!$userid) {
            $result = false;
        } else {
            $course = $info->get_course();
            $context = context_course::instance($course->id);

            // Capability bypass - teachers/admins always have access
            if (has_capability('local/groupmanager:bypass', $context, $userid)) {
                $result = true;
            } else {
                // Call the existing logic in local_groupmanager
                require_once($CFG->dirroot . '/local/groupmanager/lib.php');
                $result = \local_groupmanager_user_has_access($course->id, $userid);
            }
        }

        // Handle NOT logic
        if ($not) {
            $result = !$result;
        }

        return $result;
    }

    /**
     * Obtains a string describing this restriction.
     *
     * @param bool $full Set true if this is the 'full information' view
     * @param bool $not Set true if we are inverting the condition
     * @param info $info Item we're checking
     * @return string Information string about this restriction
     */
    public function get_description($full, $not, info $info) {
        return get_string('description', 'availability_groupmanager');
    }

    /**
     * Obtains a representation of the options of this condition as a string.
     *
     * @return string Text representation of parameters
     */
    protected function get_debug_string() {
        return '';
    }
}
