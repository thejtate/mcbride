<?php

/**
 * Override or insert variables into the page templates.
 * Implements hook_preprocess_page
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
define('MAKE_AN_APPOINTMENT_NID', 92);
define('FRONT_PAGE_BLOCKS_QID', 1);
define('ESTEP_NID', '87');
define('PHYSICIAN_NODE', 'find-a-physicians');
$includes_path = drupal_get_path('theme', 'mcbride_mobile') . '/includes/';
require_once $includes_path . 'mm.menu_icons.inc';

function mcbride_mobile_preprocess_page(&$vars, $hook) {
  $vars['extra_title'] = '';
  $theme_path = drupal_get_path('theme', 'mcbride_mobile');

  // render main menu
  $main_menu = menu_tree_all_data('menu-mobile-menu');
  $main_menu_view = theme('menu_structure', $main_menu);

  $vars['main_menu'] = $main_menu_view[0];
  $allmenu = menu_tree_all_data("menu-mobile-menu");
  $active = menu_get_active_title();
  $active_menu = menu_get_active_trail();
  $nav1_title = '';

  foreach ($allmenu as $key => $value) {
    if (isset($value['below']) && $value['link']['title'] != $active) {
      foreach ($value['below'] as $key2 => $value2) {
        if (isset($value2['below']) && $value2['link']['title'] != $active) {
          foreach ($value2['below'] as $key3 => $value3) {
            if ($value3['link']['title'] == $active || (str_replace(' ', '', $value3['link']['title']) == str_replace(' ', '', $active)) || $value3['link']['title'] == 'FAQs') {
              $nav1_title = $value['link']['title'] . ' - ' . $value2['link']['title'];
              $nav2_title = $value3['link']['title'];
              $back_link = $value['link']['link_path'];
            }
          }
        }
        if ($value2['link']['title'] == $active || (str_replace(' ', '', $value2['link']['title']) == str_replace(' ', '', $active))) {
          $nav1_title = $value['link']['title'];
          $nav2_title = $value2['link']['title'];
          $back_link = $value['link']['link_path'];
        }
      }
    }
    else {
      $nav1_title = '';
    }
  }

  $vars['page']['social_icons'] = _mcbride_mobile_social_icons();
  $node = (isset($vars['node'])) ? $vars['node'] : NULL;

  if (isset($node)) {
    $menu_icons = menu_icons_titles();
    $vars['theme_hook_suggestions'][] = 'page__' . $node->type;
    switch ($node->type) {
      case 'mobile_submenu':
        $icon = (isset($menu_icons[str_replace(' ', '_', $node->title)])) ? $menu_icons[str_replace(' ', '_', $node->title)] : $menu_icons["default"];
        $vars['icon'] = $theme_path . '/images/sprites/' . $icon;
        break;
      case 'faq':
        $vars['extra_title'] = 'FAQs';
        break;
      case 'workers_commpensation':
        $back_link = '';
        break;
      case 'physician':
        $vars['extra_title'] = '';
        $vars['phys'] = 'Physicians';
        $nav1_title = '';
        $back_link = url(PHYSICIAN_NODE, array('absolute' => TRUE));
        $vars['icon'] = $theme_path . '/images/sprites/physitions.png';
        break;
      case 'location':
        $vars['extra_title'] = 'Location';
        break;
      case 'locations_landing_page':
        $vars['extra_title'] = 'Location';
        break;
      default:
        $vars['extra_title'] = '';
        break;
    }
  }
  if (in_array('page__find_a_physicians', $vars['theme_hook_suggestions'])) {
    $vars['extra_title'] = '';
    $vars['phys'] = 'Physicians';
    $nav1_title = '';
    $vars['icon'] = $theme_path . '/images/sprites/physitions.png';
  }
  if (!isset($back_link) || empty($back_link)) {
    $back_link = '';
  }
  $vars['nav1_title'] = $nav1_title;
  $vars['back_link'] = $back_link;
  // back and home links
  $vars['home_back_links'] = array(
    'links' => array(
      'item-1' => array(
        'href' => '<front>',
        'title' => '',
        'attributes' => array('class' => array('home')),
      ),
      'item-2' => array(
        'href' => $back_link,
        'title' => '',
        'attributes' => array('class' => array('back')),
      ),
    ),
    'attributes' => array('class' => ''),
  );
  $vars['home_links'] = array(
    'links' => array(
      'item-1' => array(
        'href' => '<front>',
        'title' => '',
        'attributes' => array('class' => array('home')),
      ),
    ),
    'attributes' => array('class' => ''),
  );
}

/**
 * Implementation of hook_theme().
 */
function mcbride_mobile_theme($existing, $type, $theme, $path) {
  $items = array(
    'menu_structure' => array(
      'variables' => array()
    ),
    'sub_menu' => array(
      'element' => 'menu'
    ),
    'select_as_ul' => array(
      'render element' => 'element',
    ),
  );

  return $items;
}

/**
 * Theme: render menu structure
 * @param array $items
 * @return array string
 *   menu HTML
 */
function mcbride_mobile_menu_structure($items) {
  $menu_icons = menu_icons_list();
  $active = FALSE;
  $has_active_link = FALSE;
  $content = '<ul class="menu-buttons">';
  $count = 0;
  foreach ($items as $link) {
    if (is_array($link)) {
      if (isset($link['link']['hidden']) && $link['link']['hidden'] == 1) {
        return;
      }
      $active = (($link['link']['href'] == $_GET['q']) || ($link['link']['href'] == '<front>' && drupal_is_front_page()) || $link['link']['in_active_trail']) ? TRUE : FALSE;

      $li_atributes = array();

      if ($active) {
        $has_active_link = TRUE;
        $link['link']['localized_options']['attributes']['class'] = array('active');
        $li_atributes['class'][] = 'active';
      }
      if (isset($link['link']['localized_options']['attributes']['title']) && empty($link['link']['localized_options']['attributes']['title'])) {
        $link['link']['localized_options']['attributes']['title'] = $link['link']['title'];
      }
      $link['link']['localized_options']['html'] = TRUE;
      if (isset($menu_icons[$link['link']['mlid']])) {
        $icon = $menu_icons[$link['link']['mlid']];
      }
      else {
        $icon = $menu_icons['default'];
      }
      $item = l(theme('image', array(
          'path' => path_to_theme() . '/images/sprites/' . $icon,
          'attributes' => array('')
        )) . $link['link']['link_title'], $link['link']['href'], $link['link']['localized_options']);
      $content .= '<li ' . drupal_attributes($li_atributes) . '>' . $item . "</li>";
      ++$count;
    }
  }

  $content .= '</ul>';
  return array($content, $has_active_link);
}

/**
 * Implementation of hook_preprocess_node();
 */
function mcbride_mobile_preprocess_node(&$vars, $hook) {
  $allmenu = menu_tree_all_data("menu-mobile-menu");
  $active = menu_get_active_title();
  $active_menu = menu_get_active_trail();
  if (count($active_menu) != 1) {
    foreach ($active_menu as $key => $value) {
      if ($key != 0) {
        foreach ($allmenu as $key2 => $value2) {
          $arrkeyname = explode(' ', $key2);
          if (in_array($value['mlid'], $arrkeyname)) {
            $nextmenu = $allmenu[$key2]['below'];

            break;
          }
        }
        if (!empty($nextmenu)) {
          ($allmenu = $nextmenu);
        }
      }
    }
  }
  $id = 0;
  $lower_menu = array();
  foreach ($allmenu as $key => $value) {
    $id++;
    $lower_menu['item-' . $id] = array(
      'href' => $value['link']['link_path'],
      'title' => $value['link']['link_title'],
      'below' => $value['below']
    );
  }
  $vars['lower_menu'] = $lower_menu;
  switch ($vars['type']) {
    case 'mobile_news' :
      $vars['news'] = views_embed_view('news', 'page');
      break;
    case 'locations_landing_page':
      $vars['locations_list'] = _mcbride_locations_list();
      break;
    case 'physician':
      if ($vars['node']->nid != ESTEP_NID) {
        $vars['make_an_appointnment_link'] = l(t('REQUEST AN<br />APPOINTMENT ONLINE'), 'node/' . MAKE_AN_APPOINTMENT_NID, array(
          'attributes' => array('class' => array('button')),
          'html' => TRUE
        ));
      }
      else {
        $vars['make_an_appointnment_link'] = '';
      }
      break;
    case 'physician_owned':
      $vars['footer_logo_link'] = variable_get('footer-logo-link', '#');
      break;
    case 'locations':
//      drupal_add_js('Drupal.behaviors.map_appear', 'inline');
      $location = (isset($vars['field_location'])) ? $vars['field_location'][0]['tid'] : '';
      $vars['physician_list'] = (!empty($location)) ? views_embed_view('physician', 'block_1', $location) : '';
      $vars['physician_assistant_list'] = (!empty($location)) ? views_embed_view('physician_assistant', 'block_1', $location) : '';
      $latitude = (!empty($vars['field_loc_geolocation'])) ? $vars['field_loc_geolocation'][0]['lat'] : '';
      $longitude = (!empty($vars['field_loc_geolocation'])) ? $vars['field_loc_geolocation'][0]['lng'] : '';
      $query = $vars['field_loc_address'][0]['value'];
      // Add spaces to avoid words gluing
      $query = str_replace('<', ' <', $query);
      $query = str_replace('>', '> ', $query);
      // delete tags
      $query = strip_tags($query);
      // remove double spaces
      $query = str_replace('  ', ' ', $query);

      // make new url
      $vars['new_url'] = url('http://maps.apple.com/maps', array(
          'query' => array(
            'll' => implode(',', array(
                $latitude,
                $longitude,
              )
            ),
            'q' => $query,
          ),
        )
      );
  }
}

/**
 * Provides locations list
 * @return type
 */
function _mcbride_locations_list() {
  $content = '';
  $specialization = views_get_view_result('specialization');

  foreach ($specialization as $term) {
    $locations_list = views_embed_view('locations_new_mobile', 'block_1', $term->tid);
    $content .= '<div class="block-title">';
    $content .= '<h4>' . $term->taxonomy_term_data_name . '</h4>';
    $content .= '</div>';

    $content .= render($locations_list);
  }

  return $content;
}

/**
 *  custom function theme_sub_menu()
 */
function mcbride_mobile_sub_menu($menu) {
  $output = '';
  $id = 0;
  $last_class = '';
  foreach ($menu as $key => $value) {
    if ($key == "theme_hook_original"){
      continue;
    }

    if (!isset($menu[$key]['below']) || empty($menu[$key]['below'])) {
      $output .= '<li class="';
      $id++;
      $output .= "leaf item-" . $id;
      if ($id == 1) {
        $output .= ' first';
      }
      if ($id == count($menu)) {
        $output .= ' last';
      }
      $output .= '">';
      $output .= l($value['title'], $value['href']);
    }
    else {
      $id2 = 0;
      $output .= '<div class="block-menu-items block-about-menu ' . $last_class . '">
					<div class="block-title"><h3>' . $value['title'] . '</h3></div><ul>';

      foreach ($menu[$key]['below'] as $key2 => $value2) {
        $id2++;
        if ($id2 == 1) {
          $item_cl = ' first';
        }
        if ($id2 == count($menu[$key]['below'])) {
          $item_cl = ' last';
          $last_class = ' last';
        }
        $output .= '<li class="' . $item_cl . '">';
        $output .= l($value2['link']['title'], $value2['link']['href']);
        $output .= "</li>";
        $item_cl = ' ';
      }
      $output .= '</ul></div>';
    }
  }
  if (empty($last_class)) {
    return '<div class="block-about-menu"><ul>' . $output . '</ul></div>';
  }
  else {
    return $output;
  }
}

/**
 * Provides social icons
 * @return string
 */
function _mcbride_mobile_social_icons() {
  $content = '';
  $facebook = variable_get('social_icons_facebook', '');
  $twitter = variable_get('social_icons_twitter', '');
  if (!empty($facebook) || !empty($twitter)) {
    $items = array();
    if (!empty($facebook)) {
      $items[] = l('', $facebook, array(
        'attributes' => array('class' => array('facebook')),
        'html' => TRUE
      ));
    }
    if (!empty($twitter)) {
      $items[] = l('', $twitter, array(
        'attributes' => array('class' => array('twitter')),
        'html' => TRUE
      ));
    }
    $content .= theme_item_list(array(
      'type' => 'ul',
      'items' => $items,
      'title' => '',
      'attributes' => array('class' => array('social'))
    ));
  }
  return $content;
}


/**
 *
 * Implementation of hook_form_alter().
 */
function mcbride_mobile_form_alter(&$form, &$form_state, $form_id) {
  global $user;
  switch ($form_id) {
    case 'webform_client_form_92':
      //#theme
      $form['submitted']['prefered_time']['#theme'] = 'select_as_ul';
      $form['submitted']['prefered_time']['#title_h4'] = $form['submitted']['prefered_time']['#title'];
      $form['submitted']['prefered_time']['#title'] = '';
      $form['submitted']['physician']['#theme'] = 'select_as_ul';
      $form['submitted']['physician']['#title_h4'] = $form['submitted']['physician']['#title'];
      $form['submitted']['physician']['#title'] = '';
      unset($form['submitted']['body_part']['#empty_value']);
      $form['submitted']['body_part']['#default_value'] = 'first_available';
      $form['submitted']['body_part']['#webform_component']['value'] = 'first_available';
      $form['submitted']['body_part']['#options'] = array_merge(array('first_available' => t('CHOOSE A BODY PART')), $form['submitted']['body_part']['#options']);
      $form['submitted']['body_part']['#theme'] = 'select_as_ul';
      $form['submitted']['body_part']['#title_h4'] = $form['submitted']['body_part']['#title'];
      $form['submitted']['body_part']['#title'] = '';

      $form['submitted']['how_did_you_hear_about_mcbride']['#theme'] = 'select_as_ul';
      $form['submitted']['how_did_you_hear_about_mcbride']['#title_h4'] = $form['submitted']['how_did_you_hear_about_mcbride']['#title'];
      $form['submitted']['how_did_you_hear_about_mcbride']['#title'] = '';

      break;
  }
}

/*
 * Custom theme fubction for mobile select
 *
 */
function mcbride_mobile_select_as_ul($vars) {
  $default_value = $vars['element']['#value'];
  $li = '';
  $li_class = '';
  $count = 1;
  $select = '<select class="form-select" name="' . $vars['element']['#name'] . '" id="' . $vars['element']['#id'] . '">';
  foreach ($vars['element']['#options'] as $key => $value) {
    if (count($vars['element']['#options']) == $count) {
      $li_class = ' class="last"';
    }
    $li .= '<li' . $li_class . '><a href="javascript:void(0)">' . $value . '</a></li>';
    if ($default_value == $key) {
      $select .= '<option selected="selected" value="' . $key . '">' . $value . '</option>';
    }
    else {
      $select .= '<option value="' . $key . '">' . $value . '</option>';
    }
    $count++;
  }
  $select .= '</select>';
  $output = '<div class="form-item-select-list">';
  $output .= '<h4>' . $vars['element']['#title_h4'] . '</h4>';
  $output .= '<h5 class="title-list">' . $vars['element']['#options'][$default_value] . '</h5>';
  $output .= '<ul>' . $li . '</ul>';
  $output .= '<div class="hidden">' . $select . '</div>';
  $output .= '</div>';
  return $output;

}