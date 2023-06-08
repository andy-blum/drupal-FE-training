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

  $form['colors']['brand_color'] = $color_field;
  $form['colors']['brand_color']['#title'] = t('Brand Color');
  $form['colors']['brand_color']['#default_value'] = theme_get_setting('brand_color');

  $form['colors']['link_color'] = $color_field;
  $form['colors']['link_color']['#title'] = t('Link Color');
  $form['colors']['link_color']['#default_value'] = theme_get_setting('link_color');

  $form['colors']['cta_color'] = $color_field;
  $form['colors']['cta_color']['#title'] = t('CTA Color');
  $form['colors']['cta_color']['#default_value'] = theme_get_setting('cta_color');

  $form['#attached']['library'][] = 'foomami/color_picker';
}
