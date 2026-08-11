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
 * Front-end class for availability_groupmanager.
 *
 * @package   availability_groupmanager
 * @copyright 2025 Essay Grader AI
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace availability_groupmanager;

defined('MOODLE_INTERNAL') || die();

class frontend extends \core_availability\frontend {
    /**
     * Gets additional parameters for the plugin's JavaScript.
     *
     * @param \stdClass $course Course object
     * @param \cm_info|null $cm Course-module currently being edited (null if none)
     * @param \section_info|null $section Section currently being edited (null if none)
     * @return array Array of parameters for the JavaScript function
     */
    protected function get_javascript_init_params($course, \cm_info $cm = null, \section_info $section = null) {
        return [];
    }

    /**
     * Determines whether this condition can be added.
     *
     * @param \stdClass $course Course object
     * @param \cm_info|null $cm Course-module being edited (null if section)
     * @param \section_info|null $section Section being edited (null if course-module)
     * @return bool True if condition can be added
     */
    protected function allow_add($course, \cm_info $cm = null, \section_info $section = null) {
        global $DB;
        
        // Only allow adding if course has managed groups
        return $DB->record_exists('local_groupmanager_groups', [
            'courseid' => $course->id,
            'archived' => 0
        ]);
    }

    /**
     * Gets a string identifier for this condition.
     *
     * @return string String identifier
     */
    protected function get_javascript_strings() {
        return ['title', 'description'];
    }
}
