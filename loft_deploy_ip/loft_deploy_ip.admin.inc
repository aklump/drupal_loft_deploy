<?php
/**
 * @file
 * Admin functions
 *
 * @ingroup loft_deploy_ip
 * @{
 */

/**
 * Form builder for the loft_deploy_ip_admin_settings form.
 *
 * Configuration settings form.
 *
 * @param array $form
 * @param array &$form_state
 *
 * @see loft_deploy_ip_admin_settings_validate()
 * @see loft_deploy_ip_admin_settings_submit()
 * @ingroup forms
 */
function loft_deploy_ip_admin_settings($form, &$form_state) {
  $form['loft_deploy_ip_filter'] = array(
    '#type' => 'radios',
    '#title' => t('Include/exclude by IP'),
    '#default_value' => variable_get('loft_deploy_ip_filter', LOFT_DEPLOY_IP_FILTER),
    '#options' => array(
      'include' => t('Include by IP'),
      'exclude' => t('Exclude by IP'),
    ),
  );

  $form['loft_deploy_ips'] = array(
    '#type' => 'textarea',
    '#title' => t('IP List'),
    '#description' => t('The border display will only affect these ips in the manner specified above.  Enter one or more s, each on a separate line.'),
    '#default_value' => variable_get('loft_deploy_ips', ''),
    '#rows' => 5,
    '#resizable' => TRUE,
  );

  return system_settings_form($form);
}
