<?php

namespace Drupal\loft_deploy\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Provide endpoints for Loft Deploy.
 */
class LoftDeployController {

  /**
   * Set a cookie to hide the border for a time.
   */
  public function hide() {
    $meta_timeout = \Drupal::config('loft_deploy.settings')
      ->get('meta_timeout');
    $expires = time() + $meta_timeout;
    setcookie('loft_deploy', 'hidden', $expires, '/');

    return new JsonResponse([
      'status' => 'hidden',
      'expires' => $expires,
    ]);
  }

}
