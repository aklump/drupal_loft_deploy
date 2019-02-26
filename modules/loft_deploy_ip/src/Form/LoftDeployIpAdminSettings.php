<?php

namespace Drupal\loft_deploy_ip\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;

/**
 * Provide an admin form for the loft_deploy_ip module.
 */
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

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $config = \Drupal::config('loft_deploy_ip.settings');
    $form['filter_mode'] = [
      '#type' => 'radios',
      '#title' => t('Border visibility mode'),
      '#default_value' => $config->get('filter_mode'),
      '#options' => [
        'include' => t('Show border if IP appears in the list. Hide from everyone else.'),
        'exclude' => t('Hide border if IP appears in the list. Show to everyone else.'),
      ],
    ];
    $form['ip_list'] = [
      '#type' => 'textarea',
      '#title' => t('IP List'),
      '#description' => t('The border display will only affect these ips in the manner specified above.  Enter one or more IPs, each on a separate line. Your current ip is: %ip', [
        '%ip' => \Drupal::request()->getClientIp(),
      ]),
      '#default_value' => implode("\n", $config->get('ip_list')),
      '#rows' => 5,
      '#resizable' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form_state->setValue(['ip_list'], array_filter(explode("\n", trim($form_state->getValue(['ip_list'])))));
  }

}
