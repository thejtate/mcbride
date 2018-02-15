<?php

/**
 * Create settings form in drupal configuration setings section for module
 */
function mcbride_gmap_admin_settings() {

  //Textfield for Gmap key
  $form['mcbride_gmap_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Maps API Key'),
    '#default_value' => variable_get('mcbride_gmap_key', ''),
    '#description' => t('Your personal Googlemaps API key. You must get this for each separate website at <a href="http://code.google.com/apis/maps/signup.html">Google Map API website</a>.'),
  );

  //Gmap iframe width
  $form['mcbride_gmap_width'] = array(
    '#type' => 'textfield',
    '#size' => 4,
    '#maxlength' => 3,
    '#title' => t('Gmap width'),
    '#default_value' => variable_get('mcbride_gmap_width', array('400')),
    '#description' => t('Gmap width'),
  );

  //GMap iframe height
  $form['mcbride_gmap_heigh'] = array(
    '#type' => 'textfield',
    '#size' => 4,
    '#maxlength' => 3,
    '#title' => t('Gmap heigh'),
    '#default_value' => variable_get('mcbride_gmap_heigh', array('350')),
    '#description' => t('Gmap heigh'),
  );
    //Gmap zoom
  $form['mcbride_gmap_zoom'] = array(
    '#type' => 'textfield',
    '#size' => 4,
    '#maxlength' => 3,
    '#title' => t('Gmap zoom'),
    '#default_value' => variable_get('mcbride_gmap_zoom', array('15')),
    '#description' => t('Gmap zoom'),
  );

//Check content types to use Gmap for
  $node_types = node_type_get_types();
  foreach ($node_types as $node_type) {
    $options_nodes[$node_type->type] = $node_type->name;
  }

  $form['mcbride_gmap_node_types'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Use Gmap for this content types'),
    '#options' => $options_nodes,
    '#default_value' => variable_get('mcbride_gmap_node_types', array('page')),
    '#desctioption' => t('A options wheel will be available on these content types to make author-specific notes.'),
  );


  return system_settings_form($form, TRUE);
}


