<?php

use \Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter().
 */
function foomami_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  $form['colors'] = [
    '#type' => 'details',
    '#title' => t('Colors'),
    '#open' => true,
    'brand_color' => [
      '#type' => 'color',
      '#title' => t('Brand Color'),
      '#default_value' => theme_get_setting('brand_color'),
    ],
  ];
}
