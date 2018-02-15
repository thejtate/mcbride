<?php

/**
 * @file
 * Evolve blocks
 */


/**
 * Implements hook_block_info().
 */
function mcbride_custom_block_info() {
  $blocks = array();

  $blocks['mcbride_custom_gtranslate'] = array(
    'info' => t('mcbride custom: Select languages (Gtranslate)'),
  );

  return $blocks;
}

/**
 * Implements hook_block_configure().
 */
function mcbride_custom_block_configure($delta = '') {
  $form = array();

  switch ($delta) {
    case 'mcbride_custom_gtranslate':
      $form['mcbride_custom_gtranslate_code'] = array(
        '#type' => 'textarea',
        '#title' => t('Google translate code'),
        '#default_value' => variable_get('mcbride_custom_gtranslate_code', ''),
      );
      break;
  }

  return $form;
}

/**
 * Implements hook_block_save().
 */
function mcbride_custom_block_save($delta = '', $edit = array()) {
  switch ($delta) {
    case 'mcbride_custom_gtranslate':
      variable_set('mcbride_custom_gtranslate_code', $edit['mcbride_custom_gtranslate_code']);
      break;
  }
}

/**
 * Implements hook_block_view().
 */
function mcbride_custom_block_view($delta = '') {
  $block = array();

  switch ($delta) {
    case 'mcbride_custom_gtranslate':
      $block['subject'] = '';
      $block['content'] = _mcbride_custom_gtranslate_block_content();
      break;
  }

  return $block;
}


/**
 * Get social top block content
 * @return string
 */
function _mcbride_custom_gtranslate_block_content() {
  $code = variable_get('mcbride_custom_gtranslate_code', "");

  $output = '<div class="mcbride-custom-gtranslate-block">';
  $output .= $code;
  $output .= '</div>';
  return $output;
}