<?php
/**
 * @file
 * feature_our_mission_items.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function feature_our_mission_items_views_default_views() {
  $export = array();

  $view = new view;
  $view->name = 'our_mission_items';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Our mission items';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['row_options']['links'] = 1;
  $handler->display->display_options['row_options']['comments'] = 0;
  /* Field: Content: Photo */
  $handler->display->display_options['fields']['field_ourmissi_photo']['id'] = 'field_ourmissi_photo';
  $handler->display->display_options['fields']['field_ourmissi_photo']['table'] = 'field_data_field_ourmissi_photo';
  $handler->display->display_options['fields']['field_ourmissi_photo']['field'] = 'field_ourmissi_photo';
  $handler->display->display_options['fields']['field_ourmissi_photo']['label'] = '';
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_ourmissi_photo']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_ourmissi_photo']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_ourmissi_photo']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_ourmissi_photo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_ourmissi_photo']['settings'] = array(
    'image_style' => 'our_mission_item',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_ourmissi_photo']['field_api_classes'] = 0;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['body']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['body']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['body']['alter']['external'] = 0;
  $handler->display->display_options['fields']['body']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['body']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['body']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['body']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['body']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['body']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['body']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['body']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['body']['alter']['html'] = 0;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['body']['hide_empty'] = 0;
  $handler->display->display_options['fields']['body']['empty_zero'] = 0;
  $handler->display->display_options['fields']['body']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['body']['field_api_classes'] = 0;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['title']['link_to_node'] = 0;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'our_mission_item' => 'our_mission_item',
  );
  $export['our_mission_items'] = $view;

  return $export;
}
