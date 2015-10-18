<?php

/**
 * new pages-feature branch B2C1
 *Branch 1 , commit 1, commit 2
 * @file
 * Handles incoming requests to fire off regularly-scheduled tasks (cron jobs).
 * test   
 * Issue 1 fixed commit 3, 4
 * >>>>>meged master to my issue branch (pulled master work into my branch)=======
 * test   commit MC3
 * HOTFIX work HFXC1
 * MC4
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

if (!isset($_GET['cron_key']) || variable_get('cron_key', 'drupal') != $_GET['cron_key']) {
  watchdog('cron', 'Cron could not run because an invalid key was used.', array(), WATCHDOG_NOTICE);
  drupal_access_denied();
}
elseif (variable_get('maintenance_mode', 0)) {
  watchdog('cron', 'Cron could not run because the site is in maintenance mode.', array(), WATCHDOG_NOTICE);
  drupal_access_denied();
}
else {
  drupal_cron_run();
}
