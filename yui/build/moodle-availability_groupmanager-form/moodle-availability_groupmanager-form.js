YUI.add('moodle-availability_groupmanager-form', function (Y, NAME) {

/**
 * JavaScript for form editing group intake access conditions.
 *
 * @module moodle-availability_groupmanager-form
 */
M.availability_groupmanager = M.availability_groupmanager || {};

/**
 * @class M.availability_groupmanager.form
 * @extends M.core_availability.plugin
 */
M.availability_groupmanager.form = Y.Object(M.core_availability.plugin);

/**
 * Initialises this plugin.
 *
 * @method initInner
 * @param {Object} param Parameters (not used)
 */
M.availability_groupmanager.form.initInner = function(param) {
    // Nothing to initialize.
};

/**
 * Gets the node for the plugin's UI.
 *
 * @method getNode
 * @param {Object} json Data from server (empty object)
 * @return {Object} YUI node
 */
M.availability_groupmanager.form.getNode = function(json) {
    var strings = M.str.availability_groupmanager;
    var html = '<span class="availability-group">' + strings.description + '</span>';
    var node = Y.Node.create('<span>' + html + '</span>');
    return node;
};

/**
 * Fills in the value from the UI.
 *
 * @method fillValue
 * @param {Object} value Empty object to fill
 * @param {Object} node YUI node (not used)
 */
M.availability_groupmanager.form.fillValue = function(value, node) {
    // No additional values needed.
};

/**
 * Fills in errors from the value.
 *
 * @method fillErrors
 * @param {Array} errors Array of errors
 * @param {Object} node YUI node (not used)
 */
M.availability_groupmanager.form.fillErrors = function(errors, node) {
    // No errors possible for this simple condition.
};

}, '@VERSION@', {"requires": ["base", "node", "event", "moodle-core_availability-form"]});
