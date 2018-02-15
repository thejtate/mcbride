<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 */
define('NEWS_DOWNLOAD_NID', 38);
define('JOBS_APPLICATION_NID', 46);
define('JOBS_LISTING_NID', 167);
define('MAKE_AN_APPOINTMENT_NID', 92);
define('CLINIC_SURVEY_WEBFORM_NID', 94);
define('PAYMENT_WEBFORM_NID', 96);
define('MAKE_APPOINTMENT_WEBFORM_NID', 92);
define('PAYMENT_HOSPITAL_WEBFORM_NID', 162);
define('HEADER_NODE_FOR_VIEW_NEWS_NID', 163);
define('HEADER_NODE_FOR_VIEW_LOCATION_NID', 164);
define('HEADER_NODE_FOR_VIEW_ARTICLES_NID', 165);

define('ESTEP_NID', '87');
define('ABOUT_US_SECTION_MLID', 465);
define('EDUCATION_SECTION_MLID', 565);
define('PHYSICIANS_SECTION_MLID', 556);
define('FRONT_PAGE_BLOCKS_QID', 1);
define('PAGE_PATIENT_NID', 40);
define('PAGE_PRIVACY_NID', 41);
define('PAGE_MRI_NID', 130);
define('PAGE_ULTRASOUND_NID', 131);
define('PAGE_SCAN_NID', 132);
define('PAGE_SPORT_NID', 133);
define('PAGE_SPINE_NID', 134);
define('PAGE_TOTAL_JOINT_NID', 136);
define('PAGE_OCCUPATIONAL_NID', 135);
define('PAGE_TESTIMONIALS_NID', 129);
define('PAGE_PATIENT_FORM_NID', 99);
define('WEBFORM_APPOINTMENT_NID', 92);
define('PAGE_ABOUT_MISSION_NID', 1);


/**
 * Return array of content types with reference to the parent menu mlid
 * uses for setting parent menu item to nodes in views, that dont have menu link
 * @return array
 *   array(content_type_name => parent_menu_mlid)
 */
function _mcbride_get_content_type_menu_parent() {
    return array(
        'news' => 470, //news view
        'articles' => 524, //articles view
        'homepage_slider' => 524, //Home slider pages view
        'physician' => 557, //find physicians page
        'physician_assistant' => 575, //find physicians page
        'locations' => 584
    );
}

/**
 * Override or insert variables into the page templates.
 * Implements hook_preprocess_page
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function mcbride_preprocess_page(&$vars, $hook) {
    $theme_path = drupal_get_path('theme', 'mcbride');
    global $user;
    // render main menu
    $main_menu = menu_tree_all_data('main-menu');

    _add_custom_active_trail($main_menu);
    $main_menu_view = theme('menu_structure', $main_menu);
    $vars['main_menu'] = $main_menu_view[0];


    $vars['theme_path'] = $theme_path;

    if (drupal_is_front_page()) {
        drupal_add_js($theme_path . '/js/js_slide.js');
        drupal_add_js($theme_path . '/js/slides.min.jquery.js');
    }
    //settings for nodes
    if (!empty($vars['node'])) {
        $node = $vars['node'];

        switch ($node->type) {
            case 'common_page':
              switch ($node->nid) {
                case PAGE_PATIENT_NID:
                  $vars['page_class'] = 'page-right about-us';
                  break;
                case PAGE_PRIVACY_NID:
                  $vars['page_class'] = 'page-privacy about-us';
                  break;
                case PAGE_TESTIMONIALS_NID:
                  $vars['page_class'] = 'page-testimonials about-us';
                  break;
                case PAGE_MRI_NID:
                  $vars['page_class'] = 'page-mri';
                  break;
                case PAGE_ULTRASOUND_NID:
                  $vars['page_class'] = 'page-ultrasound';
                  break;
                case PAGE_SCAN_NID:
                  $vars['page_class'] = 'page-scan';
                  break;
                case PAGE_SPORT_NID:
                  $vars['page_class'] = 'page-sports speciality';
                  break;
                case PAGE_SPINE_NID:
                  $vars['page_class'] = 'page-spine speciality';
                  break;
                case PAGE_OCCUPATIONAL_NID:
                  $vars['page_class'] = 'page-occupational speciality';
                  break;
                case PAGE_TOTAL_JOINT_NID:
                  $vars['page_class'] = 'page-joint speciality';
                  break;
                case PAGE_ABOUT_MISSION_NID:
                  $vars['page_class'] = 'page-mission';
                  break;
                default:
                  break;
              }
                break;
            case 'our_mission':
                $vars['page_class'] = 'page-mission about-us';
                break;
            case 'videos':
                $vars['page_class'] = 'page-articles';
                break;
            case 'webform':
                switch ($node->nid) {
                    case CLINIC_SURVEY_WEBFORM_NID:
                        $vars['page_class'] = 'page-survey patients';
                        break;
                    case PAYMENT_WEBFORM_NID:
                        $vars['page_sub_section_name'] = t('Clinic');
                        $vars['page_class'] = 'page-payments patients';
                        break;
                    case PAYMENT_HOSPITAL_WEBFORM_NID:
                        $vars['page_class'] = 'page-payments patients';
                        break;
                    case WEBFORM_APPOINTMENT_NID:
                        $vars['page_class'] = 'page-appointment patients';
                        $vars['page_sub_section_name'] = t('Clinic');
                        break;
                    default:
                    default:
                        $vars['page_class'] = 'page-appointment';
                        break;
                }
                break;
            case 'resources':
                $active_trail = menu_get_active_trail();
                if (isset($active_trail[2]['link_title']) && ($active_trail[2]['link_title'] == 'Physical Therapy')){
                  $vars['page_class'] = 'page-resources-phys patients';
                } else {
                  $vars['page_class'] = 'page-resource';
                }
                break;
            case 'patient_forms':
                $vars['page_class'] = 'page-forms patients';
                break;
            case 'careers':
                $vars['page_class'] = 'page-careers about-us';
                break;
            case 'careers_listing':
                $vars['page_class'] = 'about-us page-careers-listings';
                $vars['page_section_name'] = t('About us');
                break;
            case 'locations_landing_page':
                $active_trail = menu_get_active_trail();
                if (isset($active_trail[2]['link_title']) && ($active_trail[2]['link_title'] == 'Physical Therapy')){
                  $vars['page_class'] = 'page-location-phys patients';
                } else {
                  $vars['page_class'] = 'page-location patients';
                }
                if(in_array('manager', $user->roles)){
                  $links = array();
                  if(user_access('edit any locations_landing_page content')){
                    $links[] = l(t('Edit'),'node/' . $node->nid . '/edit', array('query' => array('destination' => '/node/'. $node->nid)));
                  }
                  if(user_access('add terms in 11')){
                    $links[] = l(t('Add Location'),'node/add/locations', array('query' => array(drupal_get_destination())));
                    $links[] = l(t('Rearrange Locations'),'admin/structure/nodequeue/' . NODEQUE_LOCATIONS . '/view', array('query' => array(drupal_get_destination())));
                  }
                  $vars['tabs']= theme("item_list", array('items' => $links, array('type' => 'ul'),'attributes' => array('class' => array('tabs', 'primary', 'clearfix'))));
                }
                break;
            case 'history':
                $vars['page_class'] = 'page-history about-us';
                break;
            case 'physician_assistants_landing_pag':
                $vars['page_class'] = 'page-pa';
                $vars['page_section_name'] = t('');
                break;
            case 'visitors':
                $vars['page_class'] = 'page-visitors patients';
                break;
            case 'workers_commpensation':
                $vars['page_class'] = 'page-work-comp speciality';
                break;
            case 'news':
                $vars['page_section_name'] = t('About us');
                break;
            case 'physician':
                $vars['page_section_name'] = t('Physicians');
                foreach ($vars['tabs']['#primary'] as $key => $value) {
                  if ($value['#link']['path'] == 'node/%/nodequeue') 
                    $vars['tabs']['#primary'][$key]['#link']['title'] = 'Rearrange';
                }
                $vars['page_class'] = 'page-orth physician';
                break;
            case 'physician_assistant':
                $vars['page_section_name'] = t('Physicians');
                $vars['page_class'] = 'page-orth';
                break;
            case 'faq':
                $vars['page_class'] = 'page-faq';
                drupal_add_js($theme_path . '/js/accordion_custom.js');
                drupal_add_js($theme_path . '/js/lib/jquery-ui.min.js');
                $vars['page_class'] = 'page-appointment patients';
                $vars['page_sub_section_name'] = t('Clinic');
                break;
            case 'physician_owned':
                $active_trail = menu_get_active_trail();
                if (isset($active_trail[2]['link_title']) && ($active_trail[2]['link_title'] == 'Physical Therapy')){
                  $vars['page_class'] = 'page-staff-phys patients';
                } else {
                  $vars['page_class'] = 'page-phys_owned about-us';
                }
                break;
            case 'location':
                $vars['page_class'] = 'page-location patients';
                break;
            case 'locations':
                $vars['page_class'] = 'page-location patients';
                $vars['page_section_name'] = t('Patients');
                $vars['page_sub_section_name'] = t('Clinic');
                break;
            case 'pollys_gifts':
                $vars['page_class'] = 'page-patients2 patients';
                break;
            case 'homepage_slider':
            case 'articles':
                if (!empty($node->field_articles_author[$node->language][0]['nid'])) {
                    $article_autor = views_embed_view('article_autor', 'block', $node->field_articles_author[$node->language][0]['nid']);
                    //adding article_autor to the 'sidebar_first' page region
                    $vars['page']['sidebar_first']['article_autor'] = array(
                        '#type' => 'markup',
                        '#markup' => $article_autor,
                        'weight' => 15
                    );
                }
                $vars['page_section_name'] = t('Education');
                $vars['page_class'] = 'page-article2';
                break;
        }
    }
    //settings for views
    if (in_array('page__news', $vars['theme_hook_suggestions'])) {
      $vars['page_class'] = 'page-news about-us';
      if(user_access('edit any header_config_view_page content')){
        $variables = array('items' => array(0 => array(l(t('Edit'),'node/' . HEADER_NODE_FOR_VIEW_NEWS_NID . '/edit', array('query' => array('destination' => 'news'))))),'type' => 'ul','attributes' => array('class' => array('tabs', 'primary', 'clearfix')));
        $vars['tabs']= theme("item_list", $variables);
      }
      $node = node_load(HEADER_NODE_FOR_VIEW_NEWS_NID);
      if(isset($node->field_header_param[LANGUAGE_NONE][0]['value']) && (!empty($node->field_header_param[LANGUAGE_NONE][0]['value']))){
        $entity_id = $node->field_header_param[LANGUAGE_NONE][0]['value'];
        $header = entity_load_single('field_collection_item', $entity_id);
      }

    }
    if (in_array('page__location', $vars['theme_hook_suggestions'])) {
      $vars['page_class'] = 'page-location';
    }
    // find a physician page
    if (in_array('page__find_a_physicians', $vars['theme_hook_suggestions'])) {
      if(user_access('edit any header_config_view_page content')){
        $variables = array('items' =>
            array(
            0 => array(l(t('Edit'),'node/' . HEADER_NODE_FOR_VIEW_LOCATION_NID . '/edit', array('query' => array('destination' => 'find-a-physicians')))),
            1 => array(l(t('Add Speciality'),'admin/structure/taxonomy/speciality/add', array('query' => array(drupal_get_destination())))),
            2 => array(l(t('Add Location'),'admin/structure/taxonomy/location/add', array('query' => array(drupal_get_destination())))),
            3 => array(l(t('Rearrange Locations'),'admin/structure/taxonomy/location', array('query' => array(drupal_get_destination()))))),'type' => 'ul','attributes' => array('class' => array('tabs', 'primary', 'clearfix')));
       $vars['tabs']= theme("item_list", $variables);
      }
      $node = node_load(HEADER_NODE_FOR_VIEW_LOCATION_NID);
      if(isset($node->field_header_param[LANGUAGE_NONE][0]['value']) && (!empty($node->field_header_param[LANGUAGE_NONE][0]['value']))){
        $entity_id = $node->field_header_param[LANGUAGE_NONE][0]['value'];
        $header = entity_load_single('field_collection_item', $entity_id);
      }
    }
    if (in_array('page__articles', $vars['theme_hook_suggestions'])) {
      //articles view
      if (empty($vars['page_class'])) {
          $vars['page_class'] = 'page-articles';
      }
      if(user_access('edit any header_config_view_page content')){
        $variables = array('items' => array(0 => array(l(t('Edit'),'node/' . HEADER_NODE_FOR_VIEW_ARTICLES_NID . '/edit', array('query' => array('destination' => 'articles'))))),'type' => 'ul','attributes' => array('class' => array('tabs', 'primary', 'clearfix')));
        $vars['tabs']= theme("item_list", $variables);
      }
      $node = node_load(HEADER_NODE_FOR_VIEW_ARTICLES_NID);
      if(isset($node->field_header_param[LANGUAGE_NONE][0]['value']) && (!empty($node->field_header_param[LANGUAGE_NONE][0]['value']))){
        $entity_id = $node->field_header_param[LANGUAGE_NONE][0]['value'];
        $header = entity_load_single('field_collection_item', $entity_id);
      }
    }

    $vars['page']['social_icons'] = _mcbride_social_icons();
    $vars['page']['copyright'] = _mcbride_copyright();

    $active_trail = menu_get_active_trail();
    if (!empty($active_trail[2]) && !empty($active_trail[2]['menu_name'])) {
      if ($active_trail[2]['link_title'] == 'Clinic') {
        $vars['page_sub_section_name'] = $active_trail[2]['link_title'];
        if (empty($vars['page_class'])) {
          $vars['page_class'] = 'page-appointment patients';
        }
      }
      if ($active_trail[2]['link_title'] == 'Hospital') {
        $vars['page_sub_section_name'] = $active_trail[2]['link_title'];
        if (empty($vars['page_class'])) {
          $vars['page_class'] = 'page-patients2 patients';
        }
      }
      if ($active_trail[2]['link_title'] == 'Imaging') {
        $vars['page_sub_section_name'] = $active_trail[2]['link_title'];
      }
      if ($active_trail[2]['link_title'] == 'Physical Therapy') {
        $vars['page_sub_section_name'] = 'Physical Therapy';
      }

    }
    if (!empty($active_trail[1]) && !empty($active_trail[1]['menu_name'])) {
        if ($active_trail[1]['menu_name'] == 'main-menu') {
            //get section name from main menu
            if ($active_trail[1]['link_title'] == "Workers' Comp") {
              $vars['page_section_name'] = t("Workers'");
              $vars['page_sub_section_name'] = t('Comp');
              if (empty($vars['page_class'])) {
                $vars['page_class'] = 'page-work-comp';
              }
            } else {
                if ($active_trail[1]['link_title'] != 'Physicians') {
                  $vars['page_section_name'] = $active_trail[1]['link_title'];
                }
              }
            //add page classes for sections
            if (empty($vars['page_class']) && !empty($active_trail[1]['mlid'])) {
                switch ($active_trail[1]['mlid']) {
                    case ABOUT_US_SECTION_MLID :
                        $vars['page_class'] = 'page-about_us about-us';
                        break;
                }
            }
        }
    }
    if (empty($vars['page_class'])) {
        $vars['page_class'] = 'page-default';
    }
    if(isset($vars['node']->field_header_param[LANGUAGE_NONE][0]['value']) && (!empty($vars['node']->field_header_param[LANGUAGE_NONE][0]['value']))){
      $entity_id = $vars['node']->field_header_param[LANGUAGE_NONE][0]['value'];
      $header = entity_load_single('field_collection_item', $entity_id);
    }

    if(isset($header->field_page_header_image[LANGUAGE_NONE][0]['uri']) && (!empty($header->field_page_header_image[LANGUAGE_NONE][0]['uri']))){
      $path = $header->field_page_header_image[LANGUAGE_NONE][0]['uri'];
      $cropped_image = image_style_url('ordinar_page_header_image', $path);
      drupal_add_css('.middle-top .block-structure{background: url("' . $cropped_image . '") no-repeat scroll 0 0 transparent !important;} ', 'inline');
    }
    if(isset($header->field_page_header_subtitle[LANGUAGE_NONE][0]['value']) && (!empty($header->field_page_header_subtitle[LANGUAGE_NONE][0]['value']))){
      $vars['page_sub_section_name'] = $header->field_page_header_subtitle[LANGUAGE_NONE][0]['value'];

      $styles_sub_title = '
        font-size: 41px !important;
        top: 24px !important;
        left: 34px !important;
        font-weight: normal !important;
        position: relative !important;
        font-family: MerriweatherBold !important;
      ';

      if(isset($header->field_page_header_subtitle_color[LANGUAGE_NONE][0]['value']) && (!empty($header->field_page_header_subtitle_color[LANGUAGE_NONE][0]['value']))){
        switch($header->field_page_header_subtitle_color[LANGUAGE_NONE][0]['value']){
          case'blue':
            $styles_sub_title .= 'color: #506575 !important;
                        text-shadow: 1px 2px 1px white !important;';
            break;
          case'beige':
            $styles_sub_title .= 'color: #EEEBE3 !important;
                        text-shadow: 0 1px 2px #595959 !important;';
            break;
          case'white':
            $styles_sub_title .= 'color: #FFFFFF !important;
                        text-shadow: 0 1px 2px #595959 !important;';
            break;
          default:
            $styles_sub_title .= 'color: #FFFFFF !important;
                        text-shadow: 0 1px 2px #595959 !important;';
            break;
        }
      }else{
        //default
        $styles_sub_title .= 'color: #FFFFFF !important;
                    text-shadow: 0 1px 2px #595959 !important;';
      }
      drupal_add_css('.middle-top .block-structure h2 { ' . $styles_sub_title . '}', 'inline');
    }

    if(isset($header->field_page_header_title[LANGUAGE_NONE][0]['value']) && (!empty($header->field_page_header_title[LANGUAGE_NONE][0]['value']))){
      $vars['page_section_name'] = $header->field_page_header_title[LANGUAGE_NONE][0]['value'];

      $styles_title = '
          font-family: CabinBold !important;
          font-size: 21px !important;
          top: 24px !important;
          left: 34px !important;
          letter-spacing: 2px !important;
          text-transform: uppercase !important;';
      if(isset($header->field_page_header_title_color[LANGUAGE_NONE][0]['value']) && (!empty($header->field_page_header_title_color[LANGUAGE_NONE][0]['value']))){
        switch($header->field_page_header_title_color[LANGUAGE_NONE][0]['value']){
          case'same':
            if (!empty($styles_sub_title)){
              $styles_title = $styles_sub_title;
            }else{
              $styles_title = '
                font-family: MerriweatherBold;
                font-size: 41px !important;
                top: 24px !important;
                left: 34px !important;
                font-weight: normal !important;
                position: relative !important;
                color: #FFFFFF !important;
                text-shadow: 0 1px 2px #595959 !important;
              ';
            }
            break;
          case'white':
              $styles_title .= 'color: #f7f6f2 !important;';
            break;
          case'blue':
              $styles_title .= 'color: #5C83A1 !important;';
            break;
          case'brown':
              $styles_title .= 'color: #BDAC7D !important;';
            break;
          default:
            $styles_title .= 'color: #BDAC7D !important;';
            break;
        }
      }else{
        //default
        $styles_title .= 'color: #BDAC7D !important;';
      }
      drupal_add_css('.middle-top .block-structure h1 { ' . $styles_title . '}', 'inline');
    }
}
/**
 * Override or insert variables into the node templates.
 * Implements hook_preprocess_node
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function mcbride_preprocess_node(&$vars, $hook) {
    $vars['theme_path'] = drupal_get_path('theme', 'mcbride');
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['nid'];
    if (!$vars['page']) {
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
    }
    switch ($vars['type']) {
        case 'careers':
            $vars['jobs_application_form_link'] = l(t('Apply online now'), 'node/' . JOBS_APPLICATION_NID, array('attributes' => array('class' => array('button'))));
            $vars['jobs_listing_link'] = l(t('Career Openings'), 'node/' . JOBS_LISTING_NID, array('attributes' => array('class' => array('button', 'button-listings'))));
            break;
        case 'physician_assistants_landing_pag':
            $vars['make_an_appointnment_link'] = l(t('MAKE AN APPOINTMENT ONLINE NOW'), 'node/' . MAKE_AN_APPOINTMENT_NID, array('attributes' => array('class' => array('button')), 'html' => TRUE));
            break;
        case 'physician':
            if ($vars['node']->nid != ESTEP_NID ) {
                $vars['make_an_appointnment_link'] = l(t('REQUEST AN<br />APPOINTMENT ONLINE'), 'node/' . MAKE_AN_APPOINTMENT_NID, array('attributes' => array('class' => array('button')), 'html' => TRUE));
            }
            else {
                $vars['make_an_appointnment_link'] = '';
            }
            $vars['locations'] =  views_embed_view('locations_physicans', 'block', $vars['node']->nid);
            //ilivanov jwplayer account key:
            //Ml7drxuEnZZdlaCUOs+9ps88F/oOjP7Dt+XH1g==
            //drupal_add_js('http://jwpsrv.com/library/1Xj0bvkgEeKxGSIACusDuQ.js');

            $playlist = array();
            foreach( $vars['node']->field_physician_video[LANGUAGE_NONE] as $key => $val ){
              if($val['file']->filemime == 'video/youtube'){
                $playlist[] = array('file' => file_create_url($val['file']->uri),
                   'description' => $val['file']->filename,
                   'type' => "youtube",
                   'flashplayer' => url( drupal_get_path('theme', 'mcbride') . '/js/lib/mediaplayer-5.9/player.swf', array('absolute' => TRUE,)),
                );
              } elseif($val['file']->filemime == 'video/vimeo'){
                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . str_replace('vimeo://v/','',$val['file']->uri) . ".php"));
                $playlist[] = array(
                  'file' => file_create_url($val['file']->uri),
                  'description' => $val['file']->filename,
                  'type' => url( drupal_get_path('theme', 'mcbride') . '/js/lib/mediaplayer-5.9/vimeo.swf', array('absolute' => TRUE,)),
                  'image' => $hash[0]['thumbnail_small'],
                );
              }
            }
            $path_to_player = url( drupal_get_path('theme', 'mcbride') . '/js/lib/mediaplayer-5.9/player.swf', array('absolute' => TRUE,));
            drupal_add_js(
              array(
                'jwplayer' => TRUE,
                'path_to_player' => $path_to_player,
                'playlist' => $playlist
              ),
              'setting'
            );
            drupal_add_js(drupal_get_path('theme', 'mcbride') . '/js/lib/mediaplayer-5.9/jwplayer.min.js');
            break;
        case 'common_page':
            $active_trail = menu_get_active_trail();
            if (!empty($active_trail[1]) && !empty($active_trail[1]['menu_name'])) {
              if ($active_trail[1]['link_title'] == "Workers' Comp") {
                $vars['make_an_appointnment_link'] = l(t('REQUEST AN<br />APPOINTMENT ONLINE'), 'node/' . MAKE_AN_APPOINTMENT_NID, array('attributes' => array('class' => array('button')), 'html' => TRUE));
                $vars['short_line'] = 'short-line';
              }
            }
            break;
        case 'physician_owned':
            $active_trail = menu_get_active_trail();
            if (isset($active_trail[2]['link_title']) && ($active_trail[2]['link_title'] == 'Physical Therapy')){
              $vars['physician_owned_list'] = '';
            } else {
              $vars['physician_owned_list'] = module_invoke('views', 'block_view', 'physician_owned-block');
            }
            break;
        case 'locations_landing_page':
            $active_trail = menu_get_active_trail();
            if (isset($active_trail[2]['link_title']) && ($active_trail[2]['link_title'] == 'Physical Therapy')){
              $vars['locations_list'] = _mcbride_locations_physical_therapy_list();
              $vars['border_none'] = 'border-none';
            } else {
              $vars['locations_list'] = _mcbride_locations_list();
            }
            break;
        case 'locations':
            $location = (isset($vars['field_location'])) ? $vars['field_location'][0]['tid'] : '';
            $vars['physician_list'] = (!empty($location)) ? views_embed_view('physician', 'block_1', $location) : '';
            //$vars['physician_assistant_list'] = (!empty($location)) ? views_embed_view('physician_assistant', 'block_1', $location) : '';
            $vars['view_all_map'] = l('VIEW LARGER MAP', 'https://maps.google.com/maps?q=' . $vars['field_loc_geolocation'][0]['lat'] . ',' . $vars['field_loc_geolocation'][0]['lng'] , array('attributes' => array('class' => 'view-map', 'target' => '_blank')));
            break;

        case 'our_mission':
            $vars['our_mission_items'] = views_embed_view('our_mission_items');
            break;
        case 'location':
            $vars['view_all_map'] = l('VIEW LARGER MAP', 'https://maps.google.com/maps?q=' . $vars['field_loc_geolocation'][0]['lat'] . ',' . $vars['field_loc_geolocation'][0]['lng'] , array('attributes' => array('class' => 'view-map', 'target' => '_blank')));
          break;
        default:
            break;
    }
    switch ($vars['nid']) {
        case CLINIC_SURVEY_WEBFORM_NID:
            drupal_add_js($vars['theme_path'] . '/js/lib/combobox.js');
            drupal_add_js($vars['theme_path'] . '/js/lib/jquery.checkbox.js');
            drupal_add_js($vars['theme_path'] . '/js/lib/watermark.js');
            drupal_add_js($vars['theme_path'] . '/js/forms.js');
            break;
        case MAKE_APPOINTMENT_WEBFORM_NID:
            drupal_add_js($vars['theme_path'] . '/js/lib/jquery.maskedinput.js');
            drupal_add_js($vars['theme_path'] . '/js/lib/jquery-validation/jquery.validate.js');
            drupal_add_js($vars['theme_path'] . '/js/lib/combobox.js');
            drupal_add_js($vars['theme_path'] . '/js/webforms_theme.js');
            drupal_add_js($vars['theme_path'] . '/js/blocks.js');
            break;
        case PAYMENT_HOSPITAL_WEBFORM_NID:
        case PAYMENT_WEBFORM_NID:
            drupal_add_js($vars['theme_path'] . '/js/lib/jquery.checkbox.js');
            drupal_add_js($vars['theme_path'] . '/js/lib/watermark.js');
            drupal_add_js($vars['theme_path'] . '/js/forms.js');
            break;
        case JOBS_APPLICATION_NID:
            drupal_add_js($vars['theme_path'] . '/js/lib/jquery.maskedinput.js');
            drupal_add_js($vars['theme_path'] . '/js/jobs_application_webform.js');
            drupal_add_js($vars['theme_path'] . '/js/lib/jquery.checkbox.js');
            drupal_add_js($vars['theme_path'] . '/js/forms.js');
            break;
    }
}
/**
 * Implements hook_preprocess_block
 * @param type $vars
 * @param type $hook
 */
function mcbride_preprocess_block(&$variables){
  if( isset($variables['elements']['#contextual_links']['menu_block']) && !empty($variables['elements']['#contextual_links']['menu_block']) && (in_array('manager', $variables['user']->roles))){
    unset($variables['title_suffix']['contextual_links']['#contextual_links']['menu_block']);
  }
}
/**
 * Override or insert variables into the views templates.
 * Implements hook_preprocess_views_view
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function mcbride_preprocess_views_view(&$vars, $hook) {
    $vars['theme_path'] = drupal_get_path('theme', 'mcbride');
    $vars['download_block'] = node_view(node_load(NEWS_DOWNLOAD_NID));
    switch ($vars['view']->name) {
      case 'physician':
        switch ($vars['view']->current_display) {
          case 'block_1':
            $vars['count_results'] = count($vars['view']->result);
            break;
        }
      case 'news':
        $block = block_load('webform', 'client-block-186' );
        drupal_add_js($vars['theme_path'] . '/js/forms-news.js');
        $render_array = _block_get_renderable_array(_block_render_blocks(array($block)));
        $vars['mailing_block'] = $render_array['webform_client-block-186']['#markup'];
        break;
    }
}

/**
 * Override or insert variables into the fields templates.
 * Implements hook_preprocess_node
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function mcbride_preprocess_field(&$vars, $hook) {
  if (in_array('field__field_physician_location', $vars['theme_hook_suggestions'])) {
    //Constructiong location link into node insted of link to taxonomy
    if(!empty($vars['items'])){
      foreach ($vars['items'] as $key => $item) {
        if (isset($vars['items'][$key]['#options']['entity']->tid)){
          $tid = $vars['items'][$key]['#options']['entity']->tid;
          $node = views_get_view_result('locations_physicians', 'block', $tid);
          if(isset($node[0]->nid)){
            $nid = $node[0]->nid;
            $vars['items'][$key]['#href'] = 'node/' . $nid;
          }
        }
      }
    }
  }
  $vars['theme_hook_suggestions'][] = 'field__' . $vars['element']['#field_name'] . '__' . $vars['element']['#bundle'];
  if (isset($vars['element']['#field_name']) && $vars['element']['#field_name'] == 'field_awards_award') {
    $items = count($vars['items']);
    foreach ($vars['items'][$items-1]['entity']['field_collection_item'] as $key => $value){
      $vars['items'][$items-1]['entity']['field_collection_item'][$key]['field_awards_award_image']['#flag_border'] = TRUE;
    }
  }
//  kpr($vars['theme_hook_suggestions']);
}

/**
 * Override or insert variables into the webform templates.
 * Implements hook_preprocess_node
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function mcbride_preprocess_webform_form(&$vars, $hook) {
    $vars['paypal_icons'] = _mcbride_paypal_icons();
}

/**
 * Implementation of hook_theme().
 */
function mcbride_theme() {
    $items = array(
        'menu_structure' => array(
            'variables' => array()
        )
    );

    return $items;
}

/**
 * Provides locations list
 * @return type
 */
function _mcbride_locations_list() {
    $content = '';
    $specialization = views_get_view_result('specialization');

    foreach ($specialization as $term) {
        $locations_list = views_embed_view('locations_new', 'block', $term->tid);
        $content .= '<div class="block-title">';
        $content .= '<h4>' . $term->taxonomy_term_data_name . '</h4>';
        $content .= '</div>';

        $content .= render($locations_list);
    }

    return $content;
}

/**
 * Provides locations list
 * @return type
 */
function _mcbride_locations_physical_therapy_list() {
    $locations_list = views_embed_view('locations_physical_therapy', 'block_locations_physical_therapy');
    return render($locations_list);
}

/**
 * Provides copyright
 * @return string
 */
function _mcbride_copyright() {
    $content = '';
    $copyright = variable_get('copyright');
    if (!empty($copyright)) {
        $links = array(
            'title' => t('Configure copyright'),
            'path' => 'admin/config/system/site-information',
        );
        if (user_access('access manager links')) {
            $content .= theme('manager_links', array('links' => $links));
        }
        $content .= $copyright;
    }

    return $content;
}

/**
 * Provides social icons
 * @return string
 */
function _mcbride_social_icons() {
    $content = '';
    $links = array(
        'title' => t('Configure social'),
        'path' => 'admin/config/system/site-information',
    );
    $facebook = variable_get('social_icons_facebook');
    $twitter = variable_get('social_icons_twitter');
    $content .= '<div class="social">';
    if (user_access('access manager links')) {
      $content .= theme('manager_links', array('links' => $links));
    }
    if (!empty($facebook) || !empty($twitter)) {

        $items = array();
        if(!empty($facebook)) {
          $items[] = l('', $facebook, array('attributes' => array('class' => array('facebook'), 'target' => '_blank'), 'html' => TRUE));
        }
        if(!empty($twitter)) {
          $items[] =  l('', $twitter, array('attributes' => array('class' => array('twitter'), 'target' => '_blank'), 'html' => TRUE));
        }
        $content .= theme_item_list(array('type' => 'ul', 'items' => $items, 'title' => '', 'attributes' =>array()));

    }
    $content .= '</div>';
    return $content;
}

/**
 * Provides social icons
 * @return string
 */
function _mcbride_paypal_icons() {
    $path = drupal_get_path('theme', 'mcbride');

    $pay_pal = theme('image', array('path' => $path . '/images/pay_pal.png'));

    $mastercard = theme('image', array('path' => $path . '/images/mastercard.png'));
    $visa = theme('image', array('path' => $path . '/images/visa.png'));
    $AmEx = theme('image', array('path' => $path . '/images/AmEx.png'));
    $discover = theme('image', array('path' => $path . '/images/discover.png'));

    $content = '';
    if (!empty($pay_pal) || !empty($mastercard) || !empty($visa) || !empty($AmEx) || !empty($discover)) {

        $content .= '<div class="block-social-net">';
        $items = array(
            l($pay_pal, 'https://www.paypal.com/', array('html' => TRUE, 'attributes' => array('target' => '_blank'))),
            l($mastercard, 'http://www.mastercard.com', array('html' => TRUE, 'attributes' => array('target' => '_blank'))),
            l($visa, 'http://www.visa.com', array('html' => TRUE, 'attributes' => array('target' => '_blank'))),
            l($AmEx, 'https://www.americanexpress.com/', array('html' => TRUE, 'attributes' => array('target' => '_blank'))),
            l($discover, 'https://www.discover.com/', array('html' => TRUE, 'attributes' => array('target' => '_blank')))
        );
        $content .= theme_item_list(array('type' => 'ul', 'items' => $items, 'title' => '', 'attributes' => array()));
        $content .= '</div>';
    }

    return $content;
}

/**
 * Implements hook_menu_block_tree_alter (menu_block module)
 * Adding content types to the sub menu blocks, that don't have links in main-menu
 *
 * @param $tree
 *   An array containing the unrendered menu tree.
 * @param $config
 *   An array containing the configuration of the tree.
 */
function mcbride_menu_block_tree_alter(&$tree, &$config) {
    _add_custom_active_trail($tree);
}

/**
 * Get parents mlids from database
 * @param int $mlid
 *   Menu item id
 * @param string $menu
 *   Menu name
 * @return array
 *   Array of parents mlid
 */
function _get_parents_mlids($mlid, $menu) {

    $result = db_select('menu_links', 'm')
            ->fields('m', array())
            ->condition('menu_name', $menu)
            ->condition('mlid', $mlid)
            ->execute()
            ->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($result[0])) {
        $result = $result[0];

        $output = array();
        for ($i = 1; !empty($result['p' . $i]); $i++) {
            $output[] = $result['p' . $i];
        }
    }
    return $output;
}

/**
 * Add custom active trails to menu
 * @param type $menu
 */
function _add_custom_active_trail(&$menu) {

//array of content types with reference to the parent menu mlid
    $content_type_parents = _mcbride_get_content_type_menu_parent();
    $content_types = array_keys($content_type_parents);

    $menu_item = menu_get_item();

    if (!empty($menu_item['map'][0]) && $menu_item['map'][0] == 'node') {
        if (!empty($menu_item['map'][1]->type) && in_array($menu_item['map'][1]->type, $content_types)) {
            $active_mlids = _get_parents_mlids($content_type_parents[$menu_item['map'][1]->type], 'main-menu');

            _add_custom_active_trail_recursive($menu, $active_mlids);
        }
    }
}

/**
 * Add custom active trails to menu (recursive)
 * @param type $menu
 * @param type $active_mlids
 *   Array of mlids
 */
function _add_custom_active_trail_recursive(&$menu, $active_mlids) {

    foreach ($menu as $key => $item) {

        if (in_array($menu[$key]['link']['mlid'], $active_mlids)) {
            $menu[$key]['link']['in_active_trail'] = TRUE;
        }

        if (!empty($menu[$key]['below'])) {
            _add_custom_active_trail_recursive($menu[$key]['below'], $active_mlids);
        }
    }
}

/**
 * Theme: render menu structure
 * @param array $items
 * @return array string
 *   menu HTML
 */
function mcbride_menu_structure($items) {
    $active = FALSE;
    $has_active_link = FALSE;
    $content = '<ul>';
    $count = 0;
    foreach ($items as $link) {
        if (!$link['link']['hidden']) {
            $sub_menu = '';
            $ot = array(0, 0);
            if (isset($link['below']) && !empty($link['below'])) {
                $ot = mcbride_menu_structure($link['below']);
                $sub_menu = $ot[0];
            }

            $active = (($link['link']['href'] == $_GET['q']) || $ot[1] || ($link['link']['href'] == '<front>' && drupal_is_front_page()) || $link['link']['in_active_trail']) ? TRUE : FALSE;

            $li_atributes = array();

            if ($count == _mcbride_count_not_hidden_menu_items($items) - 1) {
                $li_atributes['class'][] = 'last';
            }
            if ($count == 0) {
                $li_atributes['class'][] = 'first';
            }

            if ($active) {
                $has_active_link = TRUE;
                $link['link']['localized_options']['attributes']['class'] = array('active');
                $li_atributes['class'][] = 'active';
            }
            if (isset($link['link']['localized_options']['attributes']['title']) && empty($link['link']['localized_options']['attributes']['title'])) {
                $link['link']['localized_options']['attributes']['title'] = $link['link']['title'];
            }
            $item = l($link['link']['title'], $link['link']['href'], $link['link']['localized_options']);
            $content .= '<li ' . drupal_attributes($li_atributes) . '>' . $item . $sub_menu . "</li>";
            ++$count;
        }
    }

    $content .= '</ul>';
    return array($content, $has_active_link);
}

/**
 * Function for counting not hidden menu items in menu array
 * @param type $items
 *  menu array
 * @return int
 */
function _mcbride_count_not_hidden_menu_items($items) {
    $result = 0;
    foreach ($items as $key => $value) {
        if (!$value['link']['hidden']) {
            ++$result;
        }
    }
    return $result;
}

/**
 * Theme find_a_physicians (@todo: NOT FINISHED YET. WAITING NEW SLICE)
 * @param array $data
 * @return string
 */
function mcbride_physicians_find_a_physicians_item($data) {
    $content = (isset($data['level']) && $data['level'] <= 1) ? '<ul class="sub-hor-select level-' . $data['level'] . '">' : '<ul class="sub-hor-select-span">';
    $c = 1;
    $count = count($data['items']);
    foreach ($data['items'] as $key => $value) {
        $attributes = array();
        if ($c == 1) {
            $attributes['class'][] = 'first';
        }
        if ($c == $count) {
            $attributes['class'][] = 'last';
        }

        if (isset($value['nid'])) {
            $item = l($value['name'], 'node/' . $value['nid']);
        } else {
            $arrow = '<span class="close-open-select"></span>';
            $arrow = '';
            $border_line = '<hr class="top-border-line"/>';
            $item = $border_line . '<span>' . $key . $arrow . '</span>' . theme('physicians_find_a_physicians_item', array('items' => $value, 'level' => $data['level'] + 1));
            $attributes['class'][] = 'collapsed';
        }
        $content .= '<li ' . drupal_attributes($attributes) . '>' . $item . '</li>';
        $c++;
    }
    $content .= '</ul>';
    return $content;
}


/**
 * Replacement for theme_form_element().
 */
function mcbride_webform_element($variables) {
  // Ensure defaults.
  $variables['element'] += array(
    '#title_display' => 'before',
  );

  $element = $variables['element'];

  // All elements using this for display only are given the "display" type.
  if (isset($element['#format']) && $element['#format'] == 'html') {
    $type = 'display';
  }
  else {
    $type = (isset($element['#type']) && !in_array($element['#type'], array('markup', 'textfield'))) ? $element['#type'] : $element['#webform_component']['type'];
  }

  // Convert the parents array into a string, excluding the "submitted" wrapper.
  $nested_level = $element['#parents'][0] == 'submitted' ? 1 : 0;
  $parents = str_replace('_', '-', implode('--', array_slice($element['#parents'], $nested_level)));
  $wrapper_classes = array(
   'form-item',
   'webform-component',
   'webform-component-' . $type,
  );
  //kpr($variables); die('END!');
  //kpr($variables['element']['#attributes']['class']);
  //;

  if(isset($variables['element']['#webform_component']['wrapper_class']) && !empty($variables['element']['#webform_component']['wrapper_class'])){
    $wrapper_classes[] = str_replace(' ','',$variables['element']['#webform_component']['wrapper_class']) .'--wrapper';
  }
  if (isset($element['#title_display']) && strcmp($element['#title_display'], 'inline') === 0) {
    $wrapper_classes[] = 'webform-container-inline';
  }
  $output = '<div class="' . implode(' ', $wrapper_classes) . '" id="webform-component-' . $parents . '">' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . _webform_filter_xss($element['#field_prefix']) . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . _webform_filter_xss($element['#field_suffix']) . '</span>' : '';

  switch ($element['#title_display']) {
    case 'inline':
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
}
function mcbride_webform_mail_headers($variables) {
  if ($variables['node']->nid == 46) {
    $headers = array(
      'Content-Type' => 'multipart/alternative; charset=UTF-8; format=flowed; delsp=yes',
      'X-Mailer' => 'Drupal Webform (PHP/'. phpversion() .')'
    );
    return $headers;
  }
}
/**
 * Returns checkboxes.
 */
function checkbox($enabled = FALSE) {
  $ch = array(
    'on' => '<input type="checkbox" disabled checked/>',
    'off' => '<input type="checkbox" disabled />',
  );
  return ((bool) $enabled) ? $ch['on'] : $ch['off'];
}