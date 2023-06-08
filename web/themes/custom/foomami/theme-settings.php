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
  ];

  $color_field = [
    '#type' => 'textfield',
    '#description' => t('Enter color in hexadecimal format (#abc123)'),
    '#maxlength' => '7',
    '#size' => '10',
    '#pattern' => '^#[a-fA-F0-9]{6}',
    '#wrapper_attributes' => [
      'data-drupal-selector' => 'foomami-color-picker'
    ]
  ];
}
