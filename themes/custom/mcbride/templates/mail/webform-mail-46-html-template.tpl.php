
<!-- HEADER -->
<table width="100%" border="0" cellpadding="0" style="border: 2px solid black; border-collapse: collapse; padding: 1em; color: black;">
    <tr>
        <td colspan="9" style="text-align:center;border:none;padding-top: 10px;">
            <p><?php print theme('image', array('path' => $path . '/images/mcbride_email_header_s_350.jpg')); ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="9" style="text-align:center;border:none;">
            <p>9600 Broadway Extension<br/> Oklahoma City, OK 73114</p>
        </td>
    </tr>
    <tr>
        <td colspan="9" style="border: none;"><?php print $template_data['equal_opp_employer_text']; ?></td>
    </tr>

    <tr>
        <td colspan="9" style="height: 1em; border: none;"></td>
    </tr>
</table>

<!-- Type of Employment Desired section -->
<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="22%" <?php print $style['option_title']; ?>>
            <b><?php print $template_data['type_of_employment_desired']['title'];?></b><br>
            <?php print $template_data['type_of_employment_desired']['desc'];?><br>
            &nbsp;
        </td>
        <td width="40%" <?php print $style['option_title']; ?>>
            <b><?php print $template_data['position_applying_for']['title']; ?></b><br>
            <?php print $template_data['position_applying_for']['desc']; ?>
            <?php print (!empty($template_data['shift']['desc'])) ? " / " . $template_data['shift']['desc'] : ""; ?>
            <br>
        </td>
        <td width="16%" <?php print $style['option_title']; ?>>
            <b><?php print $template_data['preferred_salary']['title']; ?></b><br>
            <?php print $template_data['preferred_salary']['desc']; ?><br>
        </td>
        <td width="22%" <?php print $style['option_title']; ?>>
            <b><?php print $template_data['date_available_to_work']['title']; ?></b><br>
            <?php print $template_data['date_available_to_work']['desc']; ?><br>
        </td>
    </tr>

    <tr>
        <td colspan="4" <?php print $style['option_title']; ?>>
            <b><?php print $template_data['referral_source']['title']; ?></b>
            <?php print $template_data['referral_source']['desc']; ?> <br><br>
        </td>
    </tr>
</table>

<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td colspan="3" <?php print $style['group_title']; ?>>
            <?php print $template_data['applicant_information']['title']; ?>
        </td>
    </tr>

    <tr>
        <td width="33%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['last_name']['title'];?></b><br>
            <?php print $template_data['applicant_information']['last_name']['desc'];?>
        </td>

        <td width="33%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['first_name']['title'];?></b><br>
            <?php print $template_data['applicant_information']['first_name']['desc'];?>
        </td>

        <td width="34%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['middle_name']['title'];?></b><br>
            <?php print $template_data['applicant_information']['middle_name']['desc'];?>
            &nbsp;</td>
    </tr>
</table>


<table width="100%" style="border-collapse: collapse;">
    <tr>

        <td width="43%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['address']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['address']['desc']; ?>
        </td>

        <td width="27%"<?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['city']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['city']['desc']; ?>
        </td>

        <td width="10%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['state']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['state']['desc']; ?>
        </td>

        <td width="20%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['zip']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['zip']['desc']; ?>
        </td>

    </tr>
</table>
<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="24%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['home_phone']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['home_phone']['desc']; ?>
        </td>

        <td width="24%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['cell_phone']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['cell_phone']['desc']; ?>
        </td>

        <td width="52%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['email']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['email']['desc']; ?>
            &nbsp;
        </td>

    </tr>
</table>
<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="30%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['driver_license']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['driver_license']['desc']; ?>
        </td>

        <td width="40%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['legally']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['legally']['desc']; ?>
        </td>

        <td width="30%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['over_18']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['over_18']['desc']; ?>
        </td>

    </tr>
</table>


<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="27%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['any_other_name']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['any_other_name']['desc']; ?>
        </td>
        <td width="30%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['ever_been_employed']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['ever_been_employed']['desc']; ?><br>

            <?php if (!empty($template_data['applicant_information']['ever_been_employed']['date_desc'])) : ?>
              <b><?php print $template_data['applicant_information']['ever_been_employed']['date_title']; ?></b><br>
              <?php print $template_data['applicant_information']['ever_been_employed']['date_desc']; ?><br>
            <?php endif;?>
        </td>

        <td width="43%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['relatives_employed']['title']; ?></b><br>
            <?php print $template_data['applicant_information']['relatives_employed']['desc']; ?><br>
        </td>
    </tr>
</table>

<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="100%" <?php print $style['option_title_right']; ?>>
            <b><?php print $template_data['applicant_information']['minor_traffic']['title']; ?></b>
            <?php print $template_data['applicant_information']['minor_traffic']['desc']; ?><br>
            <b><?php print $template_data['applicant_information']['minor_traffic_dates']['title']; ?></b>

            <?php if (!empty($template_data['applicant_information']['minor_traffic_dates']['desc'])) : ?>
                <?php print $template_data['applicant_information']['minor_traffic_dates']['desc']; ?><br>
            <?php endif; ?>
        </td>
    </tr>
</table>





<table width="100%" style="border-collapse: collapse;">
<tr>
    <td colspan="6" <?php print $style['group_title']; ?>>
        <?php print $template_data['educational_history']['title']; ?>
    </td>
</tr>


<tr>
    <td width="24%" <?php print $style['option_title_right']; ?>>
        <b><?php print t('Name, City and State');?></b><br/>
    </td>

    <td width="10%" <?php print $style['option_title_right']; ?>>
        <b><?php print t('Graduate?');?></b><br>
    </td>

    <td width="16%" <?php print $style['option_title_right']; ?>>
        <b><?php print t('Degree Earned');?></b>
    </td>

    <td width="14%" <?php print $style['option_title_right']; ?>>
        <b><?php print t('Date Granted');?></b><br>
    </td>

    <td width="24%" <?php print $style['option_title_right']; ?>>
        <b><?php print t('Course of Study / Major');?></b><br/>
    </td>

    <td width="12%" <?php print $style['option_title_right']; ?>>
        <b><?php print t('Grade Point Average');?></b><br/>
    </td>
</tr>

<tr>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <b><?php print $template_data['educational_history']['school']['title']; ?></b><br>
        <?php print $template_data['educational_history']['school_name']['desc']; ?><br/>
        <?php print $template_data['educational_history']['school_city']['desc']; ?>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['school_graduate']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['school_graduate_level']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['school_date_granted']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['school_course_of_study']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['school_gpa']['desc']; ?><br/>
    </td>
</tr>

<tr>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <b><?php print $template_data['educational_history']['college']['title']; ?></b><br>
        <?php print $template_data['educational_history']['college_name']['desc']; ?><br/>
        <?php print $template_data['educational_history']['college_city']['desc']; ?>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['college_graduate']['desc']; ?><br/>
    </td>

    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['college_degree']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['college_finish_date']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['college_course_of_study']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['college_gpa']['desc']; ?><br/>
    </td>
</tr>

<tr>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <b><?php print $template_data['educational_history']['advanced_degree']['title']; ?></b><br>
        <?php print $template_data['educational_history']['advanced_degree_name']['desc']; ?><br/>
        <?php print $template_data['educational_history']['advanced_degree_city']['desc']; ?>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['advanced_degree_graduate']['desc']; ?><br/>
    </td>

    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['advanced_degree_degree']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['advanced_degree_finish_date']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['advanced_degree_course_of_study']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['advanced_degree_gpa']['desc']; ?><br/>
    </td>
</tr>

<tr>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <b><?php print $template_data['educational_history']['other_training']['title']; ?></b><br>
        <?php print $template_data['educational_history']['other_training_name']['desc']; ?><br/>
        <?php print $template_data['educational_history']['other_training_city']['desc']; ?>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['other_training_graduate']['desc']; ?><br/>
    </td>

    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['other_training_degree']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['other_training_finish_date']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['other_training_course_of_study']['desc']; ?><br/>
    </td>
    <td colspan="1" <?php print $style['option_title_right']; ?>>
        <?php print $template_data['educational_history']['other_training_gpa']['desc']; ?><br/>
    </td>
</tr>


<tr>
    <td colspan="6" <?php print $style['option_title_right']; ?>>
        <b><?php print $template_data['educational_history']['additional_education']['title']; ?></b><br/>
        <?php print $template_data['educational_history']['additional_education']['desc']; ?><br/>&nbsp;
    </td>
</tr>
</table>



<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td colspan="4" <?php print $style['group_title']; ?>>
            <?php print $template_data['employment_history']['title']; ?>
        </td>
    </tr>
</table>

<!--
  //////////////////////////////////////////////////////////////////////
  // Most recent employers
  //////////////////////////////////////////////////////////////////////
-->

<?php foreach($template_data['employment_history']['most_recent_employers'] as $key => $row) : ?>
    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td width="40%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['name']['title']; ?></b><br/>
                <?php print $row['name']['desc']; ?>&nbsp;
            </td>
            <td width="12%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['contact']['title']; ?></b><br/>
                <?php print $row['contact']['desc']; ?>&nbsp;
            </td>

            <td width="16%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['phone']['title']; ?></b><br/>
                <?php print $row['phone']['desc']; ?>&nbsp;
            </td>
            <td width="32%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['supervisor']['title']; ?></b><br/>
                <?php print $row['supervisor']['desc']; ?>&nbsp;
            </td>
        </tr>
    </table>


    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td width="45%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['address']['title']; ?></b><br/>
                <?php print $row['address']['desc']; ?>&nbsp;
            </td>
            <td width="30%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['city']['title']; ?></b><br/>
                <?php print $row['city']['desc']; ?>&nbsp;
            </td>

            <td width="10%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['state']['title']; ?></b><br/>
                <?php print $row['state']['desc']; ?>&nbsp;
            </td>
            <td width="15%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['zip']['title']; ?></b><br/>
                <?php print $row['zip']['desc']; ?>&nbsp;
            </td>
        </tr>

    </table>
    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td width="34%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['dates_of_employment']['title']; ?></b><br/>

                <b><?php print $row['date_started']['title']; ?></b>
                <?php print $row['date_started']['desc']; ?><br/>
                <b><?php print $row['date_finished']['title']; ?></b>
                <?php print $row['date_finished']['desc']; ?><br/>
            </td>


            <td width="33%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['salary']['title']; ?></b><br/>

                <b><?php print $row['salary_begin']['title']; ?></b>
                <?php print $row['salary_begin']['desc']; ?><br/>
                <b><?php print $row['salary_end']['title']; ?></b>
                <?php print $row['salary_end']['desc']; ?><br/>
            </td>

            <td width="33%" <?php print $style['option_title_right']; ?>>
                <b><?php print $row['reason_for_leaving']['title']; ?></b><br/>
                <?php print $row['reason_for_leaving']['desc']; ?>
            </td>
        </tr>
    </table>


    <?php foreach($row['job'] as $job): ?>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td width="25%" <?php print $style['option_title_right']; ?>>
                    <b><?php print $job['position']['title']; ?></b><br/>
                    <?php print $job['position']['desc']; ?>
                </td>
                <td width="25%" <?php print $style['option_title_right']; ?>>
                    <b><?php print $job['years']['title']; ?></b><br/>
                    <?php print $job['years']['desc']; ?>
                </td>
                <td width="50%" <?php print $style['option_title_right']; ?>>
                    <b><?php print $job['duties']['title']; ?></b><br/>
                    <?php print $job['duties']['desc']; ?>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>

<?php endforeach; ?>


<!--
  //////////////////////////////////////////////////////////////////////
  // END Most recent employers
  //////////////////////////////////////////////////////////////////////
-->


<table  width="100%" style="border-collapse: collapse;">
    <?php
    // The last text box right above 'Upload Resume'
    if ($template_data['employment_history']['additional_text']['desc'] != '&nbsp;' && !empty($template_data['employment_history']['additional_text']['desc'])) :?>
        <tr>
            <td width="100%" <?php print $style['option_title_right'] ?>>
                <b><?php print $template_data['employment_history']['additional_text']['title']; ?></b><br/><br/>
                <?php print $template_data['employment_history']['additional_text']['desc']; ?>
            </td>
        </tr>
    <?php endif; ?>

    <?php // APPLICANT'S CERTIFICATION AND AGREEMENT ?>
    <tr>
        <td width="100%">
            <?php print $template_data['applicant_cert']['title']; ?>
        </td>
    </tr>
</table>

<p>
</p>

<table width="100%" style="border-collapse: collapse;">
    <tr>
        <td colspan="9" style="height: 1em; border: none;"></td>
    </tr>
    <tr>
        <td colspan="2" <?php print $style['option_title_thin_left'] ?>>
            <?php print $template_data['applicant_cert']['full_name']['title']; ?>
        </td>
        <td colspan="7" <?php print $style['answer_border'] ?>>
            <?php print $template_data['applicant_cert']['full_name']['desc']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="7" <?php print $style['answer_border'] ?>>
           <?php print $template_data['applicant_cert']['date']['desc']; ?>
        </td>
    </tr>
</table>


<!--
  //////////////////////////////////////////////////////////////////////
  // FOOTER
  //////////////////////////////////////////////////////////////////////
-->

<p style="text-align: center;"><strong>**<?php print t('FOR EMPLOYER\'S USE ONLY '); ?>**&nbsp;</strong></p>
<p style="text-align: center;">
    <strong>&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</strong>
</p>

<strong><?php print t('FOR SUPERVISOR TO COMPLETE UPON HIRE'); ?>:</strong>

<table width="100%" style="padding: 4px; border-collapse: collapse; background: #e6e6e6; border: 1px solid">
    <tr>
        <td style="padding: 4px; width: 20%; border: 1px solid"><b><?php print t('Date of Hire'); ?>:</b> <br/><br/><br/>
        </td>
        <td colspan="2" style="padding: 4px; width: 30%; border: 1px solid"><b><?php print t('Job title'); ?>:</b>
            <br/><br/><br/></td>
        <td colspan="2" style="padding: 4px;  width: 50%; border: 1px solid"><b><?php print t('Department'); ?>:</b>
            <br/><br/><br/></td>
    </tr>

    <tr>
        <td style="padding: 4px; width: 20%; border: 1px solid">
            <b><?php print t('Salary'); ?>:</b> <br/><br/>

            _______________ <br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('Hourly'); ?><br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('Salary'); ?>
        </td>
        <td style="padding: 4px; width: 15%; border: 1px solid">
            <b><?php print t('Status'); ?>:</b> <br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('Full-Time'); ?> <br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('Part-Time'); ?> <br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('PRN'); ?>
        </td>
        <td style="padding: 4px; width: 15%; border: 1px solid">
            <b><?php print t('Shift'); ?>:</b> <br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('First Shift'); ?><br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('Second Shift'); ?><br/><br/>
            <b style="font-size: 20px;">&#9633; </b> <?php print t('Third Shift'); ?>
        </td>
        <td colspan="2" style="width: 20%; border: 1px solid;">
            <p><b><?php print t('Other Information'); ?>:</b></p> <br/><br/>
            <?php print t('EXT.'); ?> #: ______<br/>
            (<?php print t('if known'); ?>)
        </td>
    </tr>
</table>

<table width="100%" style="border-collapse: collapse; background: #e6e6e6; border: 1px solid">

    <tr>
        <td style="padding: 4px; width: 60%; border: 1px solid">
            <b><?php print t('Supervisor\'s Signature'); ?>:</b> <br/><br/><br/>
        </td>
        <td style="padding: 4px; width: 25%; border: 1px solid">
            <b><?php print t('Date'); ?>:</b> <br/><br/><br/>
        </td>
        <td style="width: 15%; border: 1px solid"></td>
    </tr>

    <tr>
        <td style="padding: 4px; width: 60%; border: 1px solid">
            <b><?php print t('Administration\'s Signature'); ?>:</b> <br/><br/><br/>
        </td>
        <td style="padding: 4px; width: 25%; border: 1px solid">
            <b><?php print t('Date'); ?>:</b> <br/><br/><br/>
        </td>
        <td style="width: 15%; border: 1px solid"></td>
    </tr>
</table>
<br/><br/>