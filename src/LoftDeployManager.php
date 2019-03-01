<?php

namespace Drupal\loft_deploy;
use Drupal\Core\Site\Settings;

/**
 * A service class for Loft Deploy.
 */
class LoftDeployManager {

  const ROLE_PROD = 'prod';

  const ROLE_STAGING = 'staging';

  const ROLE_DEV = 'dev';

  /**
   * Return the site role.
   *
   * @return string
   *   The site role
   */
  public function getSiteRole() {
    static $drupal_static_fast;
    if (!isset($drupal_static_fast)) {
      $drupal_static_fast['site_role'] = &drupal_static(__CLASS__ . '::' . __FUNCTION__, NULL);
    }
    $site_role = &$drupal_static_fast['site_role'];
    if (!isset($site_role)) {
      $site_role = self::ROLE_PROD;
      if (defined('DRUPAL_ENV_ROLE')) {
        $site_role = DRUPAL_ENV_ROLE;
      }
      \Drupal::moduleHandler()->alter('loft_deploy_site_role', $site_role);
      if (!in_array($site_role, [
        self::ROLE_PROD,
        self::ROLE_STAGING,
        self::ROLE_DEV,
      ])) {
        $site_role = self::ROLE_PROD;
      }
    }

    return $site_role;
  }

  /**
   * Return the current Git branch.
   *
   * @return string
   *   The name of the current branch.
   */
  public function getGitBranch() {
    $git_branch = &drupal_static(__CLASS__ . '::' . __FUNCTION__, NULL);
    if ($git_branch === NULL) {
      $git = Settings::get('loft_deploy.git', 'git');
      $git_branch = exec('cd ' . \Drupal::root() . ' && ' . $git . ' rev-parse --abbrev-ref HEAD', $git);
      \Drupal::moduleHandler()->alter('loft_deploy_git_branch', $git_branch);
    }

    return $git_branch;
  }

  /**
   * Return the border title.
   *
   * @return string
   *   The string to use as the border title.
   */
  public function getBorderTitle() {
    static $drupal_static_fast;
    if (!isset($drupal_static_fast)) {
      $drupal_static_fast['title'] = &drupal_static(__CLASS__ . '::' . __FUNCTION__, NULL);
    }
    $title = &$drupal_static_fast['title'];
    if (empty($title)) {
      $title = \Drupal::config('loft_deploy.settings')
        ->get('border_title');
      \Drupal::moduleHandler()->alter('loft_deploy_title_pre', $title);
      $title = str_replace('!site_role', $this->getSiteRole(), $title);
      $git_branch = strtolower($this->getGitBranch());
      if (!$git_branch) {
        $git_branch = t('n/a');
      }
      $title = str_replace('!git_branch', $git_branch, $title);
      $title = str_ireplace('~ branch: n/a', '', $title);

      // Gitflow support.
      if (strstr($title, '!gitflow')) {
        if (strpos($git_branch, 'master') === 0
          || strpos($git_branch, 'hotfix') === 0
        ) {
          $title = str_replace('!gitflow', 'master', $title);
        }
        if (strpos($git_branch, 'develop') === 0
          || strpos($git_branch, 'feature') === 0
          || strpos($git_branch, 'release') === 0
        ) {
          $title = str_replace('!gitflow', 'develop', $title);
        }
      }
      $title = trim($title, ' ~');
      \Drupal::moduleHandler()->alter('loft_deploy_title_post', $title);
    }

    return $title;
  }

}
