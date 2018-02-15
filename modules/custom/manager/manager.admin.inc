<?php

/**
 * @file
 * Describe configuration section for module
 */

/**
 * Create settings form in drupal configuration setings section for module
 */
function manager_admin_settings() {
  $node_types = node_type_get_types();
  $view_types = views_get_all_views();

  foreach ($view_types as $view_type) {
    $options_views[$view_type->name] = $view_type->human_name ? $view_type->human_name : $view_type->name;
  }

  foreach ($node_types as $node_type) {
    $options_nodes[$node_type->type] = $node_type->name;
  }

  $form['manager_links_node_types'] = array(
      '#type' => 'checkboxes',
      '#title' => t('Users can manage this content types'),
      '#options' => $options_nodes,
      '#default_value' => variable_get('manager_links_node_types', array('page')),
      '#desctioption' => t('A options wheel will be available on these content types to make author-specific notes.'),
  );
  $form['manager_links_view_types'] = array(
      '#type' => 'checkboxes',
      '#title' => t('Users can manage this views'),
      '#options' => $options_views,
      '#default_value' => variable_get('manager_links_view_types', array('page')),
      '#desctioption' => t('A options wheel will be available on these content types to make author-specific notes.'),
  );
  return system_settings_form($form, TRUE);
}

function manager_admin_settings_validate($form, $form_state) {
  
}