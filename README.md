<p align="center">
  <a href="https://lmshostingservices.com">
    <img src="https://raw.githubusercontent.com/lmshostingservices/lms-labs/main/attached_assets/lms-hosting-logo.png" alt="LMS Hosting Services" height="60">
  </a>
</p>

> **LMS Labs** is the Moodle plugin division of [LMS Hosting Services](https://lmshostingservices.com) — Australia's Moodle™ Certified Partner.

---

# Availability: Group Intake Access

This availability condition plugin works with the **Group Manager** (`local_groupmanager`) plugin to enforce time-based access control for course activities.

## Why This Plugin Exists

In Moodle 4.2+, the traditional approach of using `cm_info_dynamic()` hooks to control activity visibility **does not work reliably**. This is because:

1. Moodle evaluates availability conditions **before** the `cm_info_dynamic()` hook runs
2. Course modinfo is cached before visibility hooks execute
3. `set_user_visible(false)` does not affect course index, mobile views, or completion reports

The **only** correct solution is to implement an availability condition plugin that integrates with Moodle's core availability engine.

## How It Works

1. **local_groupmanager** manages:
   - Admin UI for configuring groups
   - Database table for group dates/locks
   - Student access banners
   - Date calculations and status tracking

2. **availability_groupmanager** (this plugin) manages:
   - Activity hiding in course view
   - Course index visibility
   - Mobile app compatibility
   - Proper cache integration
   - Completion report accuracy

## Installation

1. Install `local_groupmanager` first
2. Install this plugin to `availability/condition/groupmanager/`
3. Enable the condition in Site Administration → Plugins → Availability restrictions
4. Apply the condition to activities that should respect group dates

## Requirements

- Moodle 4.0 or higher
- local_groupmanager plugin installed and configured

## Architecture

```
availability_groupmanager::is_available()
        ↓
    calls
        ↓
local_groupmanager_user_has_access($courseid, $userid)
        ↓
    checks
        ↓
Group start date, end date, grace period, manual lock, bypass capability
```

## Version History

### 1.0.0 (2025-12-18)
- Initial release
- Correct Moodle 4.2+ activity hiding implementation
- Integration with local_groupmanager access logic

## Pricing

**$50 USD** — one-time purchase per site · lifetime updates · no subscription.

Download at [lms-labs.com/plugins](https://lms-labs.com/plugins).


## ⭐ Why this plugin is unlike anything else available

**Time-based group access that activates and expires automatically**

- Moodle's group system controls who is in a group but not when that group can access activities. Group Manager adds date windows to group membership: a 'Cohort March 2026' group automatically gains access to activities on 1 March and loses it on 31 March, with no admin action required at either boundary.
- Access changes are applied site-wide at midnight on the configured dates. Administrators set the window once; the system enforces it indefinitely across every activity that uses the condition.
- Works with the availability condition system: any Moodle activity can be restricted to a specific group window without requiring a dedicated course per cohort.

## Support

- **Portal:** [lms-labs.com](https://lms-labs.com)
- **Email:** support@lmshostingservices.com
- **Website:** [lmshostingservices.com](https://lmshostingservices.com)

LMS Labs is the plugin division of LMS Hosting Services, Australia's Moodle™ Certified Partner.
