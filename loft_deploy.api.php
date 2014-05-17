<?php
/**
 * @file
 * API catalog
 *
 * @ingroup loft_deploy
 * @{
 */

/**
 * Implements hook_loft_deploy_title_pre_alter().
 */
function hook_loft_deploy_title_pre_alter(&$title) {
  // @todo alter the title string  
}

/**
 * Implements hook_loft_deploy_title_post_alter().
 */
function hook_loft_deploy_title_post_alter(&$title) {
  // @todo alter the title string  
}

/**
 * Implements hook_loft_deploy_border_access().
 *
 * @param  bool $access Set to TRUE to show the border or FALSE to hide.
 * @param  string $site_role
 */
function hook_loft_deploy_border_access_alter(&$access, $site_role) {
  // @todo alter the access based on something.
  $access = FALSE;
}