<?php
/**
 * Created by IntelliJ IDEA.
 * User: svip
 * Date: 27.06.13
 * Time: 17:58
 * To change this template use File | Settings | File Templates.
 */



function getFieldTitle($node, $cid){
    return (isset($node->webform['components'][$cid]['name'])) ? $node->webform['components'][$cid]['name'] : "";
}


function getTextFieldData($submission, $cid){
    return isset($submission->data[$cid]['value'][0]) ? $submission->data[$cid]['value'][0] : "";
}


function getCheckBoxFieldData($submission, $node, $cid){
    if (isset($submission->data[$cid]['value'][0]) && isset($node->webform['components'][$cid]['extra']['items'])) {
        $selected = $submission->data[$cid]['value'][0];
        $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    }
    return (isset($options[$selected])) ? $options[$selected] : "";
}


//******************************************************************************
// Most Recent Employer:
//******************************************************************************
function build_mest_resent_employer($node, $submission, $cids_array = array()){
    $template_data = array();

    $cid = $cids_array['name']; // Name
    $template_data['name']['title'] = getFieldTitle($node, $cid);
    $cid = $cids_array['name_desc']; // Name
    $template_data['name']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['contact']; // May we contact
    $template_data['contact']['title'] = getFieldTitle($node, $cid);
    $template_data['contact']['desc'] = getCheckBoxFieldData($submission, $node, $cid);

    $cid = $cids_array['phone'];// Phone
    $template_data['phone']['title'] = getFieldTitle($node, $cid);
    $template_data['phone']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['supervisor']; // Supervisor
    $template_data['supervisor']['title'] = getFieldTitle($node, $cid);
    $template_data['supervisor']['desc'] = getTextFieldData($submission, $cid);



    $cid = $cids_array['address']; // Address
    $template_data['address']['title'] = getFieldTitle($node, $cid);
    $template_data['address']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['city']; // City
    $template_data['city']['title'] = getFieldTitle($node, $cid);
    $template_data['city']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['state'];// State
    $template_data['state']['title'] = getFieldTitle($node, $cid);
    $template_data['state']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['zip']; // Zip
    $template_data['zip']['title'] = getFieldTitle($node, $cid);
    $template_data['zip']['desc'] = getTextFieldData($submission, $cid);



    $cid = $cids_array['dates_of_employment']; // Dates of Employment:
    $template_data['dates_of_employment']['title'] = getFieldTitle($node, $cid);

    $cid = $cids_array['date_started']; // Date started
    $template_data['date_started']['title'] = getFieldTitle($node, $cid);
    $template_data['date_started']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['date_finished']; // Date finished
    $template_data['date_finished']['title'] = getFieldTitle($node, $cid);
    $template_data['date_finished']['desc'] = getTextFieldData($submission, $cid);



    $cid = $cids_array['salary']; // Salary
    $template_data['salary']['title'] = getFieldTitle($node, $cid);

    $cid = $cids_array['salary_begin']; // Beginning salary
    $template_data['salary_begin']['title'] = getFieldTitle($node, $cid);
    $template_data['salary_begin']['desc'] = getTextFieldData($submission, $cid);

    $cid = $cids_array['salary_end']; // Ending salary
    $template_data['salary_end']['title'] = getFieldTitle($node, $cid);
    $template_data['salary_end']['desc'] = getTextFieldData($submission, $cid);



    $cid = $cids_array['reason_for_leaving']; // Reason for leaving
    $template_data['reason_for_leaving']['title'] = getFieldTitle($node, $cid);
    $template_data['reason_for_leaving']['desc'] = getTextFieldData($submission, $cid);

// Jobs
    $template_data['job'] = array();
    foreach($cids_array['job'] as $key => $row) {

        $position = str_replace("&nbsp;", "", getTextFieldData($submission, $row[0]));
        $years = str_replace("&nbsp;", "", getTextFieldData($submission, $row[1]));
        $duties = str_replace("&nbsp;", "", getTextFieldData($submission, $row[2]));

        if (!empty($position) || !empty($years) || !empty($duties)) {
            $template_data['job'][$key]['position']['title'] = getFieldTitle($node, $row[0]);
            $template_data['job'][$key]['position']['desc'] = $position;

            $template_data['job'][$key]['years']['title'] = getFieldTitle($node, $row[1]);
            $template_data['job'][$key]['years']['desc'] = $years;

            $template_data['job'][$key]['duties']['title'] = getFieldTitle($node, $row[2]);
            $template_data['job'][$key]['duties']['desc'] = $duties;
        }
    }

    return $template_data;
}