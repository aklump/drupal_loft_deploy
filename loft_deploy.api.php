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
 *
 * Use this if to change the title BEFORE dynamic text is applied.  This list
 * is the dynamic text:
 *
 * - !site_role
 * - !git_branch
 * - !gitflow
 */
function hook_loft_deploy_title_pre_alter(&$title) {
  // @todo alter the title string  
}

/**
 * Implements hook_loft_deploy_title_post_alter().
 *
 * Use this if you just want the change the title and don't care about tokens,
 * or if you want to alter it after the tokens have been replaced.
 */
function hook_loft_deploy_title_post_alter(&$title) {
  if ($_SERVER['SERVER_NAME'] === 'beta.intheloftstudios.com') {
    $title = t('InTheLoftStudios.com "BETA". Use by permission only.');
  }  
}

/**
 * Implements hook_loft_deploy_border_access().
 *
 * @param  bool $access Set to TRUE to show the border or FALSE to hide.
 * @param  string $site_role
 */
function hook_loft_deploy_border_access_alter(&$access, $site_role) {
  // @todo alter the access based on something.
  $ac