<?php

/**
 * @file
 * Demonstrate API functions for loft_deploy.
 *
 * @ingroup loft_deploy
 * @{
 */

/**
 * Allow modules to alter the title before tokens are replaced.
 *
 * Use this if to change the title BEFORE dynamic text is applied.  This list
 * is the dynamic text:
 *
 * - !site_role
 * - !git_branch
 * - !gitflow
 *
 * @param string $title
 *   The existing title.
 */
function hook_loft_deploy_title_pre_alter(&$title) {

}

/**
 * Allow modules to alter the final title.
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
 * Allow modules to alter the site role.
 */
function hook_loft_deploy_site_role_alter(&$site_role) {

}

/**
 * Allow modules to alter the Git branch.
 */
function hook_loft_deploy_git_branch_alter(&$git_branch) {

}

/**
 * Allow modules to alter the border access.
 *
 * @param bool $access
 *   Set to TRUE to show the border or FALSE to hide.
 * @param string $site_role
 *   The site role string: dev, staging, prod.
 * @param string $cookie
 *   The value of the cookie.  IN GENERAL IF THIS IS NOT EMPTY YOU SHOULD
 *   ALWAYS RETURN FALSE.  IT MEANS THE UI HAS BEEN DISABLED.  That said, we
 *   still allow you to break this rule per a true alter hook.
 */
function hook_loft_deploy_border_access_alter(&$access, $site_role, $cookie) {
  $access = empty($cookie) && some_test();
}
