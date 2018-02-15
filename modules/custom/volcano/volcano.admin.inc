<?php

/**
 * volcano administration page
 */
function volcano_admin_page_form($form, &$form_state) {
    $volcano_settings = variable_get('volcano_settings', array());
    $node_base_fields = array('author' => 'Authoring information', 'revision_information' => 'Revision information', 'options' => 'Publishing options');

    $user_roles = user_roles();
    ksort($user_roles);
    $types = node_type_get_types();
    

    $query = db_select('field_config_instance', 't');
    $query->fields('t', array('field_name', 'bundle'));
    $query->where('entity_type = :type', array(':type' => 'node'));
    $query->orderBy('bundle');
    $result = $query->execute();
    $fields = $result->fetchAll();
    $fields_tmp = array();
    // restructure fields array
    foreach ($fields as $field) {
        $fields_tmp[$field->bundle][] = $field->field_name;
    }
    $fields = $fields_tmp;

    // CCK
    $form = array();
    foreach ($user_roles as $role_id => $role) {
        $row = array();
        foreach ($types as $type) {
            if (isset($fields[$type->type])) {
                $form[VOLCANO_ROLE_KEY . $role_id][VOLCANO_TYPE_KEY . $type->type] = array(
                    '#type' => 'fieldset',
                    '#title' => $type->name,
                    '#collapsible' => false
                );

                foreach ($fields[$type->type] as $field) {
                    $form[VOLCANO_ROLE_KEY . $role_id][VOLCANO_TYPE_KEY . $type->type][VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $type->type . "__" . VOLCANO_FIELD_KEY . $field] = array(
                        '#type' => 'checkbox',
                        '#title' => $field,
                        '#default_value' => (isset($volcano_settings[$role_id][$type->type][$field])) ? $volcano_settings[$role_id][$type->type][$field] : 0
                    );
                }
            }


            // node base
            foreach ($node_base_fields as $key => $name) {
                $form[VOLCANO_ROLE_KEY . $role_id][VOLCANO_TYPE_KEY . $type->type][VOLCANO_ROLE_KEY . $role_id . '__' . VOLCANO_TYPE_KEY . $type->type . "__" . VOLCANO_NODE_BASE_KEY . $key] = array(
                    '#type' => 'checkbox',
                    '#title' => $name,
                    '#default_value' => (isset($volcano_settings[$role_id][$type->type][$key])) ? $volcano_settings[$role_id][$type->type][$key] : 0                    
                );
            }
        }
    }



    // other modules
    $module_info = system_get_info('module');
    $modules = array();
    foreach (module_implements('form_node_form_alter') as $module) {
        if (module_hook($module, 'form_node_form_alter')) {
            switch ($module) {
                case 'pathauto':
                    $module_form = array('path' => array(),'node'=> null);
                    break;
                case 'nodesinblock':
                    $module_form = array('nodesinblock' => array());
                    break;
                default:
                    $module_form = array();
                    break;
            }
            $form_state = array('method' => null, 'rebuild' => null, 'cache' => null);
            if ($module == 'pathauto') {
              $module_form = array('path' => null); 
            } else {
                @call_user_func_array($module . '_' . 'form_node_form_alter', array(&$module_form, $form_state));
            }
            $module_key = array_keys($module_form);
            $module_key = $module_key[0];
            
            $modules[$module_key] = $module_info[$module]['name'];
        }
    }
    asort($modules);


    foreach ($user_roles as $role_id => $role) {
        foreach ($types as $type) {
            foreach ($modules as $module => $display_name) {
                $form[VOLCANO_ROLE_KEY . $role_id][VOLCANO_TYPE_KEY . $type->type][VOLCANO_ROLE_KEY . $role_id . '__' . VOLCANO_TYPE_KEY . $type->type . "__" . VOLCANO_MODULE_KEY . $module] = array(
                    '#type' => 'checkbox',
                    '#title' => $display_name,
                    '#default_value' => (isset($volcano_settings[$role_id][$type->type][$module])) ? $volcano_settings[$role_id][$type->type][$module] : 0
                );
            }
        }
    }

    $form['submit'] = array('#type' => 'submit', '#value' => t('Save configuration'));
    $form['#submit'][] = 'volcano_admin_page_submit';
    return $form;
}

/**
 * Submit admin form.
 */
function volcano_admin_page_submit($form, &$form_state) {
    $volcano_settings = array();
    foreach ($form as $key => $value) {
        if (strpos($key, VOLCANO_ROLE_KEY) === 0) {
            $role_id = substr($key, strlen(VOLCANO_ROLE_KEY), strlen($key) - strlen(VOLCANO_ROLE_KEY));
            foreach ($value as $k => $v) {
                if (strpos($k, VOLCANO_TYPE_KEY) === 0) {
                    $content_type = substr($k, strlen(VOLCANO_TYPE_KEY), strlen($k) - strlen(VOLCANO_TYPE_KEY));
                    
                    if (is_array($v)) {
                        foreach ($v as $kk => $vv) {
                            if (strpos($kk, VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_FIELD_KEY) === 0) {
                                $content_field = substr($kk, strlen(VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_FIELD_KEY), strlen($kk) - strlen(VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_FIELD_KEY));
                                $volcano_settings[$role_id][$content_type][$content_field] = $vv['#value'];
                            } elseif (strpos($kk, VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_NODE_BASE_KEY) === 0) {
                                $content_field = substr($kk, strlen(VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_NODE_BASE_KEY), strlen($kk) - strlen(VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_NODE_BASE_KEY));
                                $volcano_settings[$role_id][$content_type][$content_field] = $vv['#value'];
                            } elseif (strpos($kk, VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_MODULE_KEY) === 0) {
                                $module_field = substr($kk, strlen(VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_MODULE_KEY), strlen($kk) - strlen(VOLCANO_ROLE_KEY . $role_id . "__" . VOLCANO_TYPE_KEY . $content_type . "__" . VOLCANO_MODULE_KEY));
                                $volcano_settings[$role_id][$content_type][$module_field] = $vv['#value'];
                            }
                        } // endforeach $value
                    }
                }
            }
        }
    }// endfireach $form
    variable_set('volcano_settings', $volcano_settings);
    drupal_set_message(t('Changes have been saved.'));
}

/**
 * Implementation of theme_form
 * @param type $variables
 * @return type 
 */
function theme_volcano_admin_page_form($variables) {
    $form = $variables['form'];
    $user_roles = user_roles();
    ksort($user_roles);
    $header = array();
    $rows = array();

    foreach ($user_roles as $role_id => $role) {
        $header[] = $role;
        $row[] = drupal_render($form[VOLCANO_ROLE_KEY . $role_id]);
    }

    $rows[] = $row;

    $output = theme('table', array('header' => $header, 'rows' => $rows));
    $output .= drupal_render_children($form);
    return $output;
}