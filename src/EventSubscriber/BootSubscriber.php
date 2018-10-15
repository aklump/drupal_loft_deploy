<?php /**
 * @file
 * Contains \Drupal\loft_deploy\EventSubscriber\BootSubscriber.
 */

namespace Drupal\loft_deploy\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BootSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [KernelEvents::REQUEST => ['onEvent', 0]];
  }

  public function onEvent(\Symfony\Component\HttpKernel\Event\GetResponseEvent $event) {
    // Simply defined so it gets discovered by Drupal.  Keep here.
  }

}
