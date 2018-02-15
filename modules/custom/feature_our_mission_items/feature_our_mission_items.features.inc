<?php
/**
 * @file
 * feature_our_mission_items.features.inc
 */

/**
 * Implements hook_views_api().
 */
function feature_our_mission_items_views_api() {
  return array("version" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function feature_our_mission_items_image_default_styles() {
  $styles = array();

  // Exported image style: our_mission_item.
  $styles['our_mission_item'] = array(
    'name' => 'our_mission_item',
    'effects' => array(
      20 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '246',
          'height' => '360',
        ),
        'weight' => '1',
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function feature_our_mission_items_node_info() {
  $items = array(
    'our_mission_item' => array(
      'name' => t('Our mission item'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
