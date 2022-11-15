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
    'primary_color' => [
      '#type' => 'textfield',
      '#maxlength' => 7,
      '#size' => 10,
      '#title' => t('Primary Color'),
      '#description' => t('Enter color in full hexadecimal format (#abc123). <br/> Derivatives will be formed from this color.'),
      '#default_value' => theme_get_setting('primary_color'),
      '#attributes' => [
        'pattern' => '^#[a-fA-F0-9]{6}',
      ],
      '#wrapper_attributes' => [
        'data-drupal-selector' => 'foomami-color-picker'
      ]
    ]
  ];
}
