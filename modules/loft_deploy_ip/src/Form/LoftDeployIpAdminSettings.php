<?php

/**
 * @file
 * Contains \Drupal\loft_deploy_ip\Form\LoftDeployIpAdminSettings.
 */

namespace Drupal\loft_deploy_ip\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;

class LoftDeployIpAdminSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'loft_deploy_ip_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('loft_deploy_ip.settings');

    foreach (Element::children($form) as $variable) {
      $config->set($variable, $form_state->getValue($form[$variable]['#parents']));
    }
    $config->save();

    if (method_exists($this, '_submitForm')) {
      $this->_submitForm($form, $form_state);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['loft_deploy_ip.settings'];
  }

  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    // @FIXME
// Could not extract the default value because it is either indeterminate, or
// not scalar. You'll need to provide a default value in
// config/install/loft_deploy_ip.settings.yml and config/schema/loft_deploy_ip.schema.yml.
    $form['loft_deploy_ip_filter'] = [
      '#type' => 'radios',
      '#title' => t('Border visibility mode'),
      '#default_value' => \Drupal::config('loft_deploy_ip.settings')->get('loft_deploy_ip_filter'),
      '#options' => [
        'include' => t('Show border if IP appears in the list. Hide from everyone else.'),
        'exclude' => t('Hide border if IP appears in the list. Show to everyone else.'),
      ],
    ];

    // @FIXME
    // Could not extract the default value because it is either indeterminate, or
    // not scalar. You'll need to provide a default value in
    // config/install/loft_deploy_ip.settings.yml and config/schema/loft_deploy_ip.schema.yml.
    $form['loft_deploy_ip_ips'] = [
      '#type' => 'textarea',
      '#title' => t('IP List'),
      '#description' => t('The border display will only affect these ips in the manner specified above.  Enter one or more IPs, each on a separate line. Your current ip is: %ip', [
        '%ip' => $_SERVER['REMOTE_ADDR']
        ]),
      '#default_value' => implode("\n", \Drupal::config('loft_deploy_ip.settings')->get('loft_deploy_ip_ips')),
      '#rows' => 5,
      '#resizable' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  public function validateForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form_state->setValue(['loft_deploy_ip_ips'], array_filter(explode("\n", trim($form_state->getValue(['loft_deploy_ip_ips'])))));
  }

}
?>
