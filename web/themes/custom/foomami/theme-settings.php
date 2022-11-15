<?php

use \Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter().
 */
function foomami_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

  $form['#attached']['library'][] = 'foomami/color_picker';
  
  $form['colors'] = [
    '#type' => 'details',
    '#title' => t('Colors'),
    '#open' => true,
  ];

  $color_field = [
    '#type' => 'textfield',
    '#maxlength' => 7,
    '#size' => 10,
    '#description' => t('Enter color in full hexadecimal format (#abc123). <br/> Derivatives will be formed from this color.'),
    '#attributes' => [
      'pattern' => '^#[a-fA-F0-9]{6}',
    ],
    '#wrapper_attributes' => [
      'data-drupal-selector' => 'foomami-color-picker'
    ]
  ];

  $form['colors']['primary_color'] = $color_field;
  $form['colors']['primary_color']['#title'] = t('Primary Color');
  $form['colors']['primary_color']['#default_value'] = theme_get_setting('primary_color');

  $form['colors']['secondary_color'] = $color_field;
  $form['colors']['secondary_color']['#title'] = t('Secondary Color');
  $form['colors']['secondary_color']['#default_value'] = theme_get_setting('secondary_color');

  $form['colors']['accent_color'] = $color_field;
  $form['colors']['accent_color']['#title'] = t('Accent Color');
  $form['colors']['accent_color']['#default_value'] = theme_get_setting('accent_color');
}
