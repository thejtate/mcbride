<?php
/**
 * @file
 * Customize the e-mails sent by Webform after successful submission.
 *
 * This file may be renamed "webform-mail-[nid].tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-mail.tpl.php" to affect all webform e-mails on your site.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $submission: The webform submission.
 * - $email: The entire e-mail configuration settings.
 * - $user: The current user submitting the form.
 * - $ip_address: The IP address of the user submitting the form.
 *
 * The $email['email'] variable can be used to send different e-mails to different users
 * when using the "default" e-mail template.
 */


include_once dirname(__FILE__) . "/webform-mail-46-functions.tpl.php";

if (isset($submission->data) && !empty($submission->data)) :

    foreach ($submission->data as $cid => $data) {
        if (empty($submission->data[$cid]['value'][0])) {
            $submission->data[$cid]['value'][0] = '&nbsp;';
        }
    }

    $path = drupal_get_path('theme', 'mcbride');

    $tdstyle = 'border:2px solid black;
    border-collapse: collapse;
    border-style:solid;
    padding: 2px 10px 5px;';

    $style = array(
        'option_title' => 'style="vertical-align:top;' . $tdstyle . '"',
        'option_title_right' => 'style="vertical-align:top;' . $tdstyle . '"',
        'option_title_left' => 'style="font-weight: bold; text-align: right; padding-right: 0.2em;"',
        'option_title_thin_left' => 'style="text-align: right; padding-right: 0.2em;"',
        'group_title' => 'style="background-color: #a0a0a0; border: 1px solid black; font-weight: bold; text-align: center; text-transform: uppercase; "',
        'underlined' => 'style="min-height: 1em; margin: 0.2em; border-bottom: 1px solid black;"',
        'answer_border' => 'style="border: 1px solid black; vertical-align: middle; height: 1.4em; padding: 0 0.2em;"',
        'checkbox' => 'style="text-align: right;"',
        'border' => 'style="text-align: right;"',
        'td_st' => 'border:2px solid black;
    border-collapse: collapse;
    border-style:solid;
    padding: 2px 10px 5px;',
    );


    $template_data = array();

//******************************************************************************
// EQUAL OPPORTUNITY EMPLOYER ...
//******************************************************************************
    $template_data['equal_opp_employer_text'] = (isset($node->body[LANGUAGE_NONE][0]['value'])) ? $node->body[LANGUAGE_NONE][0]['value'] : "";


//******************************************************************************
// FIRST ROW
//******************************************************************************

// Type of Employment Desired:
    $cid = 161;
    //$template_data['type_of_employment_desired']['title'] = getFieldTitle($node, $cid);
    $template_data['type_of_employment_desired']['title'] = t('Employment Desired');
    $template_data['type_of_employment_desired']['desc'] = getCheckBoxFieldData($submission, $node, $cid);

// Position Applying For:
    $cid = 2;
    //$template_data['position_applying_for']['title'] = getFieldTitle($node, $cid);
    $template_data['position_applying_for']['title'] = t('Position / Shift');
    $template_data['position_applying_for']['desc'] = getTextFieldData($submission, $cid);

// Shift:
    $cid = 162;
    $template_data['shift']['title'] = getFieldTitle($node, $cid);
    $template_data['shift']['desc'] = getTextFieldData($submission, $cid);

// Preferred Salary:
    $cid = 19;
    $template_data['preferred_salary']['title'] = getFieldTitle($node, $cid);
    $template_data['preferred_salary']['desc'] = getTextFieldData($submission, $cid);


// Date Available to Work:
    $cid = 263;
    //$template_data['date_available_to_work']['title'] = getFieldTitle($node, $cid);
    $template_data['date_available_to_work']['title'] = t('Date Available');
    $template_data['date_available_to_work']['desc'] = getTextFieldData($submission, $cid);


// Referral Source:
    $cid = 3;
    $cid_opts = array(
        'job_fair' => 266,
        'web_site' => 164,
        'employee_referal' => 166,
        'school' => 165,
        'other' => 4,
    );
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);

    //$template_data['referral_source']['title'] = getFieldTitle($node, $cid);
    $template_data['referral_source']['title'] = t('Referral Source');
    $template_data['referral_source']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    $template_data['referral_source']['desc'] .= (isset($cid_opts[$selected]) && isset($submission->data[$cid_opts[$selected]]['value'][0])) ? "<br/>" . $submission->data[$cid_opts[$selected]]['value'][0] : "";


//******************************************************************************
// Applicant Information
//******************************************************************************

// Section title
    $cid = 168;
    $template_data['applicant_information']['title'] = getFieldTitle($node, $cid);


// Last name
    $cid = 6;
    $template_data['applicant_information']['last_name']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['last_name']['desc'] = getTextFieldData($submission, $cid);

// First name
    $cid = 7;
    $template_data['applicant_information']['first_name']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['first_name']['desc'] = getTextFieldData($submission, $cid);

// Middle name
    $cid = 8;
    $template_data['applicant_information']['middle_name']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['middle_name']['desc'] = getTextFieldData($submission, $cid);

// Address
    $cid = 9;
    $template_data['applicant_information']['address']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['address']['desc'] = getTextFieldData($submission, $cid);

// City
    $cid = 11;
    $template_data['applicant_information']['city']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['city']['desc'] = getTextFieldData($submission, $cid);

// State
    $cid = 12;
    $template_data['applicant_information']['state']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['state']['desc'] = getTextFieldData($submission, $cid);

// Zip
    $cid = 13;
    $template_data['applicant_information']['zip']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['zip']['desc'] = getTextFieldData($submission, $cid);


// Home phome
    $cid = 14;
    $template_data['applicant_information']['home_phone']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['home_phone']['desc'] = getTextFieldData($submission, $cid);

// Cell phone
    $cid = 15;
    $template_data['applicant_information']['cell_phone']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['cell_phone']['desc'] = getTextFieldData($submission, $cid);

// E-mail
    $cid = 16;
    $template_data['applicant_information']['email']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['email']['desc'] = getTextFieldData($submission, $cid);


// Driver license
    $cid = 17;
    $template_data['applicant_information']['driver_license']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['driver_license']['desc'] = getTextFieldData($submission, $cid);

// Are you legally eligible to work in the United States?
    $cid = 24;
    //$template_data['applicant_information']['legally']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['legally']['title'] = t('Legally eligible to work in the United States?');
    $template_data['applicant_information']['legally']['desc'] = getCheckBoxFieldData($submission, $node, $cid);

// Are you over 18?
    $cid = 25;
    //$template_data['applicant_information']['over_18']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['over_18']['title'] = t('Over 18?');
    $template_data['applicant_information']['over_18']['desc'] = getCheckBoxFieldData($submission, $node, $cid);


// Any other name by which known:
    $cid = 169;
    //$template_data['applicant_information']['any_other_name']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['any_other_name']['title'] = t('Other names used');
    $template_data['applicant_information']['any_other_name']['desc'] = getTextFieldData($submission, $cid);


// Have you ever been employed by McBride?
    $cid = 20;
    //$template_data['applicant_information']['ever_been_employed']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['ever_been_employed']['title'] = t('Previously employed by McBride?');
    $template_data['applicant_information']['ever_been_employed']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    // If yes, give dates:
    $cid = 232;
    //$template_data['applicant_information']['ever_been_employed']['date_title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['ever_been_employed']['date_title'] = t('If yes, dates');
    $template_data['applicant_information']['ever_been_employed']['date_desc'] = getTextFieldData($submission, $cid);

// List any relatives employed by McBride:
    $cid = 171;
    //$template_data['applicant_information']['relatives_employed']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['relatives_employed']['title'] = t('Relatives employed by McBride');
    $template_data['applicant_information']['relatives_employed']['desc'] = getTextFieldData($submission, $cid);


// Excluding minor traffic violations ...
    $cid = 30;
    $template_data['applicant_information']['minor_traffic']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['minor_traffic']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    // If yes, provide date(s), location(s), and explanation(s):
    $cid = 29;
    $template_data['applicant_information']['minor_traffic_dates']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_information']['minor_traffic_dates']['desc'] = getTextFieldData($submission, $cid);


//******************************************************************************
// Educational History
//******************************************************************************

    $cid = 172;
    $template_data['educational_history']['title'] = getFieldTitle($node, $cid);


// High school
    $cid = 38;
    $template_data['educational_history']['school']['title'] = getFieldTitle($node, $cid);

    $cid = 33; // Name
    $template_data['educational_history']['school_name']['desc'] = getTextFieldData($submission, $cid);
    $cid = 34; // City
    $template_data['educational_history']['school_city']['desc'] = getTextFieldData($submission, $cid);
    $cid = 39; // Did you graduate?
    $template_data['educational_history']['school_graduate']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    $cid = 264; // Graduate level
    $template_data['educational_history']['school_graduate_level']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    $cid = 231; // Date granted
    $template_data['educational_history']['school_date_granted']['desc'] = getTextFieldData($submission, $cid);
    $cid = 267; // Course of study
    $template_data['educational_history']['school_course_of_study']['desc'] = getTextFieldData($submission, $cid);
    $cid = 37; // GPA
    $template_data['educational_history']['school_gpa']['desc'] = getTextFieldData($submission, $cid);


// College
    $cid = 43;
    $template_data['educational_history']['college']['title'] = getFieldTitle($node, $cid);

    $cid = 44; // Name
    $template_data['educational_history']['college_name']['desc'] = getTextFieldData($submission, $cid);
    $cid = 45; // City
    $template_data['educational_history']['college_city']['desc'] = getTextFieldData($submission, $cid);
    $cid = 48; // Did you graduate?
    $template_data['educational_history']['college_graduate']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    $cid = 54; // Degree
    $template_data['educational_history']['college_degree']['desc'] = getTextFieldData($submission, $cid);
    $cid = 51; // Finish date
    $template_data['educational_history']['college_finish_date']['desc'] = getTextFieldData($submission, $cid);
    $cid = 53; // Course of study
    $template_data['educational_history']['college_course_of_study']['desc'] = getTextFieldData($submission, $cid);
    $cid = 47; // GPA
    $template_data['educational_history']['college_gpa']['desc'] = getTextFieldData($submission, $cid);


// Advanced Degree
    $cid = 55;
    $template_data['educational_history']['advanced_degree']['title'] = getFieldTitle($node, $cid);

    $cid = 56; // Name
    $template_data['educational_history']['advanced_degree_name']['desc'] = getTextFieldData($submission, $cid);
    $cid = 57; // City
    $template_data['educational_history']['advanced_degree_city']['desc'] = getTextFieldData($submission, $cid);
    $cid = 60; // Did you graduate?
    $template_data['educational_history']['advanced_degree_graduate']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    $cid = 65; // Degree
    $template_data['educational_history']['advanced_degree_degree']['desc'] = getTextFieldData($submission, $cid);
    $cid = 63; // Finish date
    $template_data['educational_history']['advanced_degree_finish_date']['desc'] = getTextFieldData($submission, $cid);
    $cid = 64; // Course of study
    $template_data['educational_history']['advanced_degree_course_of_study']['desc'] = getTextFieldData($submission, $cid);
    $cid = 59; // GPA
    $template_data['educational_history']['advanced_degree_gpa']['desc'] = getTextFieldData($submission, $cid);


// Other Training
    $cid = 66;
    $template_data['educational_history']['other_training']['title'] = getFieldTitle($node, $cid);

    $cid = 67; // Name
    $template_data['educational_history']['other_training_name']['desc'] = getTextFieldData($submission, $cid);
    $cid = 68; // City
    $template_data['educational_history']['other_training_city']['desc'] = getTextFieldData($submission, $cid);
    $cid = 71; // Did you graduate?
    $template_data['educational_history']['other_training_graduate']['desc'] = getCheckBoxFieldData($submission, $node, $cid);
    $cid = 76; // Degree
    $template_data['educational_history']['other_training_degree']['desc'] = getTextFieldData($submission, $cid);
    $cid = 74; // Finish date
    $template_data['educational_history']['other_training_finish_date']['desc'] = getTextFieldData($submission, $cid);
    $cid = 75; // Course of study
    $template_data['educational_history']['other_training_course_of_study']['desc'] = getTextFieldData($submission, $cid);
    $cid = 70; // GPA
    $template_data['educational_history']['other_training_gpa']['desc'] = getTextFieldData($submission, $cid);


// Additional Education, Training, Professional Activities ...
    $cid = 79;
    $template_data['educational_history']['additional_education']['title'] = getFieldTitle($node, $cid);
    $template_data['educational_history']['additional_education']['desc'] = getTextFieldData($submission, $cid);


//******************************************************************************
// Employment History
//******************************************************************************

    $cid = 80;
    $template_data['employment_history']['title'] = getFieldTitle($node, $cid);


//******************************************************************************
// FIRST Most Recent Employer:
//******************************************************************************
    $job = array();
    $job[] = array(
        272, // Position
        275, // Years:
        273, // Duties
    );
    $job[] = array(274, 279, 276);
    $job[] = array(281, 282, 283);
    $job[] = array(330, 331, 332);
    $job[] = array(334, 335, 336);
    $job[] = array(338, 339, 340);
    $job[] = array(354, 355, 356);
    $job[] = array(342, 343, 344);
    $job[] = array(350, 351, 352);
    $job[] = array(346, 347, 348);


    $cids_array = array(
        'name' => 138,
        'name_desc' => 139,
        'contact' => 155,
        'phone' => 147,
        'supervisor' => 145,
        'address' => 142,
        'city' => 256,
        'state' => 234,
        'zip' => 243,
        'dates_of_employment' => 148,
        'date_started' => 149,
        'date_finished' => 150,
        'salary' => 151,
        'salary_begin' => 152,
        'salary_end' => 153,
        'reason_for_leaving' => 235,
        'job' => $job
    );

    $template_data['employment_history']['most_recent_employers'][] = build_mest_resent_employer($node, $submission, $cids_array);


//******************************************************************************
// SECOND Most Recent Employer:
//******************************************************************************
    $job = array();

    $job[] = array(
        285, // Position
        286, // Years:
        287, // Duties
    );
    $job[] = array(293, 294, 295);
    $job[] = array(289, 290, 291);
    $job[] = array(374, 375, 376);
    $job[] = array(378, 379, 380);
    $job[] = array(382, 383, 384);
    $job[] = array(366, 367, 368);
    $job[] = array(358, 359, 360);
    $job[] = array(362, 363, 364);
    $job[] = array(370, 371, 372);

    $cids_array = array(
        'name' => 181,
        'name_desc' => 248,
        'contact' => 194,
        'phone' => 193,
        'supervisor' => 192,
        'address' => 251,
        'city' => 254,
        'state' => 257,
        'zip' => 260,
        'dates_of_employment' => 184,
        'date_started' => 185,
        'date_finished' => 186,
        'salary' => 189,
        'salary_begin' => 190,
        'salary_end' => 191,
        'reason_for_leaving' => 236,
        'job' => $job
    );

    $template_data['employment_history']['most_recent_employers'][] = build_mest_resent_employer($node, $submission, $cids_array);


//******************************************************************************
// Third Most Recent Employer:
//******************************************************************************

    // Jobs
    $job = array();

    $job[] = array(
        297, // Position
        298, // Years:
        299, // Duties
    );
    $job[] = array(301, 302, 303);
    $job[] = array(305, 306, 307);
    $job[] = array(402, 403, 404);
    $job[] = array(406, 407, 408);
    $job[] = array(410, 411, 412);
    $job[] = array(394, 395, 396);
    $job[] = array(386, 387, 388);
    $job[] = array(390, 391, 392);
    $job[] = array(398, 399, 400);

    $cids_array = array(
        'name' => 197,
        'name_desc' => 249,
        'contact' => 210,
        'phone' => 209,
        'supervisor' => 208,
        'address' => 252,
        'city' => 255,
        'state' => 258,
        'zip' => 261,
        'dates_of_employment' => 200,
        'date_started' => 201,
        'date_finished' => 202,
        'salary' => 205,
        'salary_begin' => 206,
        'salary_end' => 207,
        'reason_for_leaving' => 237,
        'job' => $job
    );

    $template_data['employment_history']['most_recent_employers'][] = build_mest_resent_employer($node, $submission, $cids_array);


//******************************************************************************
// Fourth Most Recent Employer:
//******************************************************************************

    // Jobs
    $job = array();

    $job[] = array(
        309, // Position
        310, // Years:
        311, // Duties
    );
    $job[] = array(313, 314, 315);
    $job[] = array(317, 318, 319);
    $job[] = array(418, 419, 420);
    $job[] = array(434, 435, 436);
    $job[] = array(430, 431, 432);
    $job[] = array(438, 439, 440);
    $job[] = array(422, 423, 424);
    $job[] = array(426, 427, 428);
    $job[] = array(414, 415, 416);

    $cids_array = array(
        'name' => 213,
        'name_desc' => 250,
        'contact' => 226,
        'phone' => 225,
        'supervisor' => 224,
        'address' => 253,
        'city' => 233,
        'state' => 259,
        'zip' => 262,
        'dates_of_employment' => 216,
        'date_started' => 217,
        'date_finished' => 218,
        'salary' => 221,
        'salary_begin' => 222,
        'salary_end' => 223,
        'reason_for_leaving' => 238,
        'job' => $job
    );

    $template_data['employment_history']['most_recent_employers'][] = build_mest_resent_employer($node, $submission, $cids_array);


//******************************************************************************
// The last text box right above 'Upload Resume'
//******************************************************************************

    $cid = 158;
    $template_data['employment_history']['additional_text']['title'] = getFieldTitle($node, $cid);
    $template_data['employment_history']['additional_text']['desc'] = getTextFieldData($submission, $cid);


//******************************************************************************
// APPLICANT'S CERTIFICATION AND AGREEMENT
//******************************************************************************

    // Type full name
    $cid = 269;
    $template_data['applicant_cert']['full_name']['title'] = getFieldTitle($node, $cid);
    $template_data['applicant_cert']['full_name']['desc'] = getTextFieldData($submission, $cid);
    $template_data['applicant_cert']['date']['desc'] = date('m/d/Y', $submission->submitted);

    // somebody just add new field to the webform & remake this !
    // PLEASE READ CAREFULLY
    $cid = 229;
    $template_data['applicant_cert']['title'] = str_replace('signed by online', 'signed by ' . $template_data['applicant_cert']['full_name']['desc'] . ' through online', $node->webform['components'][$cid]['value']);




    include dirname(__FILE__) . "/webform-mail-46-html-template.tpl.php";
    ?>


<?php endif; ?>