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


$empty_row = '<tr><td colspan="9" style="height: 1em; border: none;"></td></tr>';
?>
<table width="100%" border="0" cellpadding="0" style="border: 2px solid black; border-collapse: collapse; padding: 1em; color: black;">
  <tr>
    <td colspan="9" style="text-align:center;border:none;padding-top: 45px;">
      <p><?php print theme('image', array('path' => $path . '/images/mcbride_email_header_s.jpg')); ?></p>
    </td>
  </tr>
  <tr>
    <td colspan="9" style="text-align:center;border:none;">
      <p>9600 Broadway Extension<br/>
        Oklahoma City, OK 73114</p>
    </td>
  </tr>
  <tr>
    <td colspan="9" style="border: none;">
      <?php
// EQUAL OPPORTUNITY EMPLOYER ...
      print $node->body[LANGUAGE_NONE][0]['value'];
      ?>
    </td>
  </tr>

  <?php print $empty_row; ?>
</table>
<table width="100%" style="border-collapse: collapse;">
  <?php

  // Type of Employment Desired:
  $cid = 161;
  $selected = $submission->data[$cid]['value'][0];
  $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);

  $gr_title = $node->webform['components'][$cid]['name'];
  ?>
  <?php
  // Position Applying For:
  $cid_1 = 2;
  $data_1 = $submission->data[$cid_1]['value'][0];
  $gr_title_1 = $node->webform['components'][$cid_1]['name'];
  ?>

  <?php
  // Shift
  $cid_3 = 162;
  $data_4 = $submission->data[$cid_3]['value'][0];
  $gr_title_4 = $node->webform['components'][$cid_3]['name'];
  ?>

  <?php
  // Preferred Salary::
  $cid_1 = 19;
  $data_2 = $submission->data[$cid_1]['value'][0];
  $gr_title_2 = $node->webform['components'][$cid_1]['name'];

  // Date Available to Work:
  $cid_2 = 263;
  $data_3 = $submission->data[$cid_2]['value'][0];
  $gr_title_3 = $node->webform['components'][$cid_2]['name'];
  ?>
  <tr>
    <td width="22%"<?php print $style['option_title'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
      &nbsp;
    </td>
    <td width="40%"<?php print $style['option_title'] ?>>
      <b><?php print $gr_title_1; ?></b><br>
      <?php print $data_1; ?>
        <?php print (!empty($data_4)) ? " / " . $data_4 : ""; ?><br>
        <br>
    </td>
    <td width="16%"<?php print $style['option_title'] ?>>
      <b><?php print $gr_title_2; ?></b><br>
      <?php print $data_2; ?><br>
    </td>
    <td width="22%" <?php print $style['option_title'] ?>>
      <b><?php print $gr_title_3; ?></b><br>
      <?php print $data_3; ?><br>
    </td>
  </tr>

  <?php
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
  $gr_title = $node->webform['components'][$cid]['name'];
  ?>

  <tr>
    <td colspan="4" <?php print $style['option_title'] ?>>
      <b><?php print $gr_title ?></b>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
      <?php if (isset($cid_opts[$selected])) : ?>
        <?php print $submission->data[$cid_opts[$selected]]['value'][0]; ?>
      <?php endif ?>
      <br><br>
    </td>
  </tr>
</table>

<table width="100%" style="border-collapse: collapse;">
  <tr>
    <td colspan="3" <?php print $style['group_title'] ?>>
      <?php
// Applicant Information
      print $node->webform['components'][168]['name'];
      ?>
    </td>
  </tr>

  <tr>
    <?php
    $cids = array(
      6 => '33%', // Last name
      7 => '33%', // First name
      8 => '34%', // Middle name
    );

    $data = array();
    $gr_title = array();
    $names = '';
    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $v; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
        <?php $names .= $data[$cid] . ' '; ?>
      </td>

    <?php endforeach; ?>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <?php
    $cids = array(
      9, // Address
      11, // City
      12, // State
      13, // Zip
    );
    $wi = array(
      9 => '43%',
      11 => '27%',
      12 => '10%',
      13 => '20%',
    );
    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td width="<?php print $wi[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>

    <?php endforeach; ?>
  </tr>

</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <?php
    $cids = array(
      14 => '24%', // Home phome
      15 => '24%', // Cell phone
      16 => '52%', // E-mail
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>

    <?php endforeach; ?>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <?php
    $cids = array(
      //268 => '24%', // Social security number
      17 => '54%', // Driver license
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td  colspan="2" width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?> </b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>

    <?php
    // Are you legally eligible to work in the United States?
    $cid = 24;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td colspan="2" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>

    <?php
    // Are you over 18?
    $cid = 25;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td colspan="2" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>

  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <?php
    // Any other name by which known:
    $cid = 169;
    $data = $submission->data[$cid]['value'][0];
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td width="27%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php print $data; ?>
    </td>
    <?php

    // Have you ever been employed by McBride?
    $cid = 20;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <?php
    // If yes, give dates:
    $cid_1 = 232;
    if (array_key_exists($cid_1, $submission->data) && !empty($submission->data[$cid_1])) {
      $data_1 = $submission->data[$cid_1]['value'][0];
      $gr_title_1 = $node->webform['components'][$cid_1]['name'];
    }
    else{
      $data_1 = '';
      $gr_title_1 = '';
    }
    ?>
    <td width="30%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
      <?php if (!empty($gr_title_1)): ?>
        <b><?php print $gr_title_1 ? $gr_title_1 : ''; ?></b><br>
        <?php print $data_1 ? $data_1 : '' ; ?>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      171, // List any relatives employed by McBride:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td width="43%"  <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>

    <?php endforeach; ?>
  </tr>


  <?php
  // Excluding minor traffic violations ...
  $cid = 30;
  $selected = $submission->data[$cid]['value'][0];
  $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
  $gr_title = $node->webform['components'][$cid]['name'];
  ?>

  <tr>
    <td colspan="3" width="100%" <?php print $style['option_title'] ?>>
      <b><?php print $gr_title ?></b>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>   <?php
      $cids = array(
        29, // If yes, provide date(s), location(s), and explanation(s):
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        if (array_key_exists($cid, $submission->data) && !empty($submission->data[$cid])) {
          $data[$cid] = $submission->data[$cid]['value'][0];
        }
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
      <b><?php print $gr_title[$cid]; ?></b>
      <?php if (array_key_exists($cid, $data) && !empty($data[$cid])) { ?>
        <?php print $data[$cid]; ?> <br>
      <?php } ?>
      <?php endforeach; ?>
      <br>
    </td>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td colspan="6" <?php print $style['group_title'] ?>>
      <?php
// Educational History
      print $node->webform['components'][172]['name'];
      ?>
    </td>
  </tr>


  <tr>
    <?php
    $cid = 34; // High school city
    $data = $submission->data[$cid]['value'][0];
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td width="24%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title; ?></b><br>
    </td>
    <?php
    // High school Did you graduate?
    $cid2 = 39;
    $selected = $submission->data[$cid2]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid2]['extra']['items']);
    $gr_title2 = $node->webform['components'][$cid2]['name'];
    ?>
    <td width="10%"<?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title2 ?></b><br>
      <?php foreach ($options as $cid): ?>
        <?php print $cid; ?> &nbsp;&nbsp;&nbsp;&nbsp;
      <?php endforeach; ?>
    </td>

    <?php
// High school Graduate level
    $cid3 = 264;
    $selected3 = $submission->data[$cid3]['value'][0];
    $options2 = _webform_select_options_from_text($node->webform['components'][$cid3]['extra']['items']);
    $gr_title = $node->webform['components'][$cid3]['name'];
    ?>
    <td width="16%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b>
    </td>
    <?php
    $cids2 = array(
      231 => "14%", // High school date granted
      267 => "24%", // Course of study
      37 => "12%", // High school GPA
    );

    $data2 = array();
    $gr_title = array();

    foreach ($cids2 as $cid => $v) {
      $data2[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>
    <?php foreach ($cids2 as $cid => $v): ?>
      <td width="<?php print $v; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
      </td>
    <?php endforeach; ?>
  </tr>

  <tr>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <b><?php print $node->webform['components'][38]['name']; ?></b><br>
      <?php print $data; ?>
    </td>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <?php if (isset($selected3) && !empty($selected3) && $selected3 != '&nbsp;') : ?>
        <?php print $options2[$selected3]; ?><br>
      <?php endif; ?>
    </td>
    <?php foreach ($cids2 as $cid => $v): ?>
      <td colspan="1" <?php print $style['option_title_right'] ?>>
        <?php print $data2[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

  <tr>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <b><?php
      // College
      print $node->webform['components'][43]['name'];
      ?></b><br>
      <?php
      $cids = array(
        44, // College name
        45, // college city
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>

    </td>
    <?php
// College Did you graduate?
    $cid = 48;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      54, // College Degree
      51, // College Finish date
      53, // College Course of study
      47, // College GPA
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td colspan="1" <?php print $style['option_title_right'] ?>>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>

  </tr>
  <tr>
    <td colspan="1" <?php print $style['option_title'] ?>>
      <b><?php
      // College
      print $node->webform['components'][55]['name'];
      ?></b><br>
      <?php
      $cids = array(
        56, // Advanced Degree name
        57, // Advanced Degree city
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>

    </td>
    <?php
// Advanced Degree Did you graduate?
    $cid = 60;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      65, // Advanced Degree Degree
      63, // Advanced Degree Finish date
      64, // Advanced Degree Course of study
      59, // Advanced Degree GPA
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td colspan="1" <?php print $style['option_title_right'] ?>>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>

  </tr>
  <tr>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <b><?php
// Other Training
      print $node->webform['components'][66]['name'];
      ?></b><br>
      <?php
      $cids = array(
        67, // Other Training: name
        68, // Other Training: city
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>

    </td>
    <?php
// Other Training: Did you graduate?
    $cid = 71;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      76, // Other Training: Degree
      74, // Other Training: Finish date
      75, // Other Training: Course of study
      70, // Other Training: GPA
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td colspan="1" <?php print $style['option_title_right'] ?>>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>
  <?php
  $cids = array(
    79, // Additional Education, Training, Professional Activities ...
  );

  $data = array();
  $gr_title = array();

  foreach ($cids as $cid) {
    $data[$cid] = $submission->data[$cid]['value'][0];
    $gr_title[$cid] = $node->webform['components'][$cid]['name'];
  }
  ?>

  <?php foreach ($cids as $cid): ?>
    <tr>
      <td colspan="9" <?php print $style['option_title'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?><br><br>
      </td>
    </tr>
  <?php endforeach; ?>


  <?php
    // Foreign Language (list where applicable)
  $cids = array(
      177, // Read
      178, // Write
      179, // Speak
  );

  $data = array();
  $gr_title = array();

  foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
  }
  ?>
  <tr>
      <td colspan="6" <?php print $style['group_title'] ?>>
          <?php
          // Foreign Language title
          print $node->webform['components'][176]['name'];
          ?>
      </td>
  </tr>
   <tr>
     <?php foreach ($cids as $cid): ?>
        <td width="33%" colspan="2" <?php print $style['option_title'] ?>>
            <b><?php print $gr_title[$cid]; ?></b><br>
            <?php print $data[$cid]; ?><br><br>
        </td>
    <?php endforeach; ?>
   </tr>

</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td colspan="4" <?php print $style['group_title'] ?>>
      <?php
// Employment History
      print $node->webform['components'][80]['name'];
      ?>
    </td>
  </tr>

  <tr>
    <td width="40%" <?php print $style['option_title'] ?>>
      <b><?php
      $cid = 139; // Most Recent Employer: Name
      $data = $submission->data[$cid]['value'][0];
// Most Recent Employer:
      print $node->webform['components'][138]['name'];
      ?></b><br>
      <?php print $data; ?>
    </td>
    <?php
    // Most Recent Employer: May we contact
    $cid = 155;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td width="12%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      147 => "16%", // Most Recent Employer: Phone:
      145 => "32%", // Most Recent Employer: Supervisor:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>

    <?php
    $cids = array(
      142 => '45%', // Most Recent Employer: Address:
      256 => '30%', // Most Recent Employer: City:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
    <?php
    $cids = array(
      234 => '10%', // Most Recent Employer: State:
      243 => '15%', // Most Recent Employer: Zip:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td colspan="1" <?php print $style['option_title_right'] ?>>
      <b><?php
        // Dates of Employment:
        print $node->webform['components'][148]['name'];
        ?></b><br>

      <?php
      $cids = array(
        149, // Most Recent Employer: Date started:
        150, // Most Recent Employer: Date finished::
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?> <br>
      <?php endforeach; ?>
    </td>

    <td width=33%" <?php print $style['option_title_right'] ?>>
      <b><?php
      // Most Recent Employer: Salary
      print $node->webform['components'][151]['name'];
      ?></b><br>
      <?php
      $cids = array(
        152, // Most Recent Employer: Beginning salary:
        153, // Most Recent Employer: Ending salary:
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>
    </td>

    <?php
    $cids = array(
      235, // Most Recent Employer: Reason for leaving:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td width=33%" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br/>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

</table>
<?php
$cids = array(
  272 => '25%', // Most Recent Employer: Position(s) held (list all):
  275 => '25%', // Most Recent Employer: Years:
  273 => '50%', // Most Recent Employer: Duties:
);
$cids1 = array(
  274 => '25%', // position
  279 => '25%', // Most Recent Employer: Years:
  276 => '50%', // Most Recent Employer: Duties:
);
$cids2 = array(
  281 => '25%', // position
  282 => '25%', // Most Recent Employer: Years:
  283 => '50%', // Most Recent Employer: Duties:
);
$cids3 = array(
  330 => '25%', // position
  331 => '25%', // Most Recent Employer: Years:
  332 => '50%', // Most Recent Employer: Duties:
);
$cids4 = array(
  334 => '25%', // position
  335 => '25%', // Most Recent Employer: Years:
  336 => '50%', // Most Recent Employer: Duties:
);
$cids5 = array(
  338 => '25%', // position
  339 => '25%', // Most Recent Employer: Years:
  340 => '50%', // Most Recent Employer: Duties:
);
$cids6 = array(
  354 => '25%', // position
  355 => '25%', // Most Recent Employer: Years:
  356 => '50%', // Most Recent Employer: Duties:
);
$cids7 = array(
  342 => '25%', // position
  343 => '25%', // Most Recent Employer: Years:
  344 => '50%', // Most Recent Employer: Duties:
);
$cids8 = array(
  350 => '25%', // position
  351 => '25%', // Most Recent Employer: Years:
  352 => '50%', // Most Recent Employer: Duties:
);
$cids9 = array(
  346 => '25%', // position
  347 => '25%', // Most Recent Employer: Years:
  348 => '50%', // Most Recent Employer: Duties:
);
$cides = array($cids, $cids1, $cids2, $cids3, $cids4, $cids5, $cids6, $cids7, $cids8, $cids9);
foreach ($cides as $cids) {
?>
  <table  width="100%" style="border-collapse: collapse;">
    <tr>
      <?php
      $data = array();
      $gr_title = array();

      foreach ($cids as $cid => $v) {
        if ($submission->data[$cid]['value'][0] != '&nbsp;') {
          $data[$cid] = $submission->data[$cid]['value'][0];
          $gr_title[$cid] = $node->webform['components'][$cid]['name'];
        }
      }
      ?>
      <?php foreach ($cids as $cid => $v): ?>
        <?php if ($submission->data[$cid]['value'][0] != '&nbsp;') { ?>
          <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
            <b><?php print $gr_title[$cid]; ?></b><br>
            <?php print $data[$cid]; ?>
          </td>
        <?php } ?>
      <?php endforeach; ?>
    </tr>
  </table>
<?php } ?>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td width="40%"  <?php print $style['option_title'] ?>>
      <b><?php
      $cid = 248; // Most Recent Employer: Name
      $data = $submission->data[$cid]['value'][0];
// Most Recent Employer:
      print $node->webform['components'][181]['name'];
      ?></b><br>
      <?php print $data; ?>
    </td>
    <?php
    // 2nd Most Recent Employer: May we contact
    $cid = 194;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td width="12%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      193 => "16%", // 2nd Most Recent Employer: Supervisor:
      192 => "32%", // 2nd Most Recent Employer: Phone:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">

  <tr>

    <?php
    $cids = array(
      251 => '45%', // 2nd Most Recent Employer: Address:
      254 => '30%', // 2nd Most Recent Employer: City:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
    <?php
    $cids = array(
      257 => '10%', // 2nd Most Recent Employer: State:
      260 => '15%', // 2nd Most Recent Employer: Zip:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>

    <td width="33%" <?php print $style['option_title_right'] ?>>
      <b><?php
        // 2nd Most Recent Employer :Dates of Employment:
        print $node->webform['components'][184]['name'];
        ?></b><br>

      <?php
      $cids = array(
        185, // 2nd Most Recent Employer Date started:
        186, // 2nd Most Recent Employer Date finished::
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?> <br>
      <?php endforeach; ?>
    </td>

    <td width="33%"  <?php print $style['option_title_right'] ?>>
      <b><?php
// 2nd Most Recent Employer: Salary
      print $node->webform['components'][189]['name'];
      ?></b><br>
      <?php
      $cids = array(
        190, // 2nd Most Recent Employer: Beginning salary:
        191, // 2nd Most Recent Employer: Ending salary:
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>
    </td>

    <?php
    $cids = array(
      236, // 2nd Most Recent Employer: Reason for leaving:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td width="33%"  <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br/>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>

  </tr>
</table>
<?php
$cids = array(
  285 => '25%', // 2nd Most Recent Employer: Position(s) held (list all):
  286 => '25%', // 2 Most Recent Employer: Years:
  287 => '50%', // 2 Most Recent Employer: Duties:
);
$cids1 = array(
  293 => '25%', // 2nd Most Recent Employer: Position(s)
  294 => '25%', // 2 Most Recent Employer: Years:
  295 => '50%', // 2 Most Recent Employer: Duties:
);
$cids2 = array(
  289 => '25%', // 2nd Most Recent Employer: Position(s)
  290 => '25%', // 2 Most Recent Employer: Years:
  291 => '50%', // 2 Most Recent Employer: Duties:
);
$cids3 = array(
  374 => '25%', // 2nd Most Recent Employer: Position(s)
  375 => '25%', // 2 Most Recent Employer: Years:
  376 => '50%', // 2 Most Recent Employer: Duties:
);
$cids4 = array(
  378 => '25%', // 2nd Most Recent Employer: Position(s)
  379 => '25%', // 2 Most Recent Employer: Years:
  380 => '50%', // 2 Most Recent Employer: Duties:
);
$cids5 = array(
  382 => '25%', // 2nd Most Recent Employer: Position(s)
  383 => '25%', // 2 Most Recent Employer: Years:
  384 => '50%', //2  Most Recent Employer: Duties:
);
$cids6 = array(
  366 => '25%', // 2nd Most Recent Employer: Position(s)
  367 => '25%', // 2 Most Recent Employer: Years:
  368 => '50%', // 2 Most Recent Employer: Duties:
);
$cids7 = array(
  358 => '25%', // 2nd Most Recent Employer: Position(s)
  359 => '25%', // 2 Most Recent Employer: Years:
  360 => '50%', // 2 Most Recent Employer: Duties:
);
$cids8 = array(
  362 => '25%', // 2nd Most Recent Employer: Position(s)
  363 => '25%', // 2 Most Recent Employer: Years:
  364 => '50%', // 2 Most Recent Employer: Duties:
);
$cids9 = array(
  370 => '25%', // 2nd Most Recent Employer: Position(s)
  371 => '25%', // 2 Most Recent Employer: Years:
  372 => '50%', // 2 Most Recent Employer: Duties:
);

$cides = array($cids, $cids1, $cids2, $cids3, $cids4, $cids5, $cids6, $cids7, $cids8, $cids9);
foreach ($cides as $cids) {
  ?>
  <table  width="100%" style="border-collapse: collapse;">
    <tr>
      <?php
      $data = array();
      $gr_title = array();

      foreach ($cids as $cid => $v) {
        if ($submission->data[$cid]['value'][0] != '&nbsp;') {
          $data[$cid] = $submission->data[$cid]['value'][0];
          $gr_title[$cid] = $node->webform['components'][$cid]['name'];
        }
      }
      ?>
      <?php foreach ($cids as $cid => $v): ?>
        <?php if ($submission->data[$cid]['value'][0] != '&nbsp;') { ?>
          <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
            <b><?php print $gr_title[$cid]; ?></b><br>
            <?php print $data[$cid]; ?>
          </td>
        <?php } ?>
      <?php endforeach; ?>
    </tr>
  </table>
<?php } ?>

<table  width="100%" style="border-collapse: collapse;">

  <tr>
    <td width="40%" <?php print $style['option_title'] ?>>
      <b><?php
      $cid = 249; // 3rd Most Recent Employer: Name
      $data = $submission->data[$cid]['value'][0];
// 3rd Most Recent Employer:
      print $node->webform['components'][197]['name'];
      ?></b><br>
      <?php print $data; ?>
    </td>
    <?php
    // 3nd Most Recent Employer: May we contact
    $cid = 210;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td width="12%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      209 => "16%", // 3rd Most Recent Employer: Supervisor:
      208 => "32%", // 3rd Most Recent Employer: Phone:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

</table>

<table  width="100%" style="border-collapse: collapse;">
  <tr>

    <?php
    $cids = array(
      252 => "45%", // 3rd Most Recent Employer: Address:
      255 => "30%", // 3rd Most Recent Employer: City:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
    <?php
    $cids = array(
      258 => "10%", // 3rd Most Recent Employer: State:
      261 => "15%", // 3rd Most Recent Employer: Zip:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      if ($submission->data[$cid]['value'][0] != '&nbsp;') {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <?php    if ($submission->data[$cid]['value'][0] != '&nbsp;') { ?>
      <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
      <?php } ?>
    <?php endforeach; ?>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td width="33%"  <?php print $style['option_title_right'] ?>>
      <b><?php
        // 3rd Most Recent Employer: Dates of Employment:
        print $node->webform['components'][200]['name'];
        ?></b><br>

      <?php
      $cids = array(
        201, // 3nd Most Recent Employer Date started:
        202, // 3nd Most Recent Employer Date finished::
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?> <br>
      <?php endforeach; ?>
    </td>

    <td width="33%" <?php print $style['option_title_right'] ?>>
      <b><?php
// 3rd Most Recent Employer: Salary
      print $node->webform['components'][205]['name'];
      ?></b><br>
      <?php
      $cids = array(
        206, // 3nd Most Recent Employer: Beginning salary:
        207, // 3nd Most Recent Employer: Ending salary:
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>
    </td>

    <?php
    $cids = array(
      237, // 3rd Most Recent Employer: Reason for leaving:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td width="33%"  <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br/>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>

  </tr>
</table>
<?php
$cids = array(
  297 => "25%", // 3rd Most Recent Employer: Position(s) held (list all):
  298 => '25%', // Most Recent Employer: Years:
  299 => "50%", // 3rd Most Recent Employer: Duties:
);
$cids1 = array(
  301 => '25%', // 3rd Most Recent Employer: Position(s)
  302 => '25%', // 3 Most Recent Employer: Years:
  303 => '50%', // 3 Most Recent Employer: Duties:
);
$cids2 = array(
  305 => '25%', // 3rd Most Recent Employer: Position(s)
  306 => '25%', // 3 Most Recent Employer: Years:
  307 => '50%', // 3 Most Recent Employer: Duties:
);
$cids3 = array(
  402 => '25%', // 3rd Most Recent Employer: Position(s)
  403 => '25%', // 3 Most Recent Employer: Years:
  404 => '50%', // 3 Most Recent Employer: Duties:
);
$cids4 = array(
  406 => '25%', // 3rd Most Recent Employer: Position(s)
  407 => '25%', // 3 Most Recent Employer: Years:
  408 => '50%', // 3 Most Recent Employer: Duties:
);
$cids5 = array(
  410 => '25%', // 3rd Most Recent Employer: Position(s)
  411 => '25%', // 3 Most Recent Employer: Years:
  412 => '50%', // 3 Most Recent Employer: Duties:
);
$cids6 = array(
  394 => '25%', // 3rd Most Recent Employer: Position(s)
  395 => '25%', // 3 Most Recent Employer: Years:
  396 => '50%', // 3 Most Recent Employer: Duties:
);
$cids7 = array(
  386 => '25%', // 3rd Most Recent Employer: Position(s)
  387 => '25%', // 3 Most Recent Employer: Years:
  388 => '50%', // 3 Most Recent Employer: Duties:
);
$cids8 = array(
  390 => '25%', // 3rd Most Recent Employer: Position(s)
  391 => '25%', // 3 Most Recent Employer: Years:
  392 => '50%', // 3 Most Recent Employer: Duties:
);
$cids9 = array(
  398 => '25%', // 3rd Most Recent Employer: Position(s)
  399 => '25%', // 3 Most Recent Employer: Years:
  400 => '50%', // 3 Most Recent Employer: Duties:
);

$cides = array($cids, $cids1, $cids2, $cids3, $cids4, $cids5, $cids6, $cids7, $cids8, $cids9);
foreach ($cides as $cids) {
  ?>
  <table  width="100%" style="border-collapse: collapse;">
    <tr>
      <?php
      $data = array();
      $gr_title = array();

      foreach ($cids as $cid => $v) {
        if ($submission->data[$cid]['value'][0] != '&nbsp;') {
          $data[$cid] = $submission->data[$cid]['value'][0];
          $gr_title[$cid] = $node->webform['components'][$cid]['name'];
        }
      }
      ?>

      <?php foreach ($cids as $cid => $v): ?>
          <?php if ($submission->data[$cid]['value'][0] != '&nbsp;') { ?>
          <td width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
            <b><?php print $gr_title[$cid]; ?></b><br>
            <?php print $data[$cid]; ?>
          </td>
        <?php } ?>
  <?php endforeach; ?>


    </tr>
  </table>
<?php } ?>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td width="40%" <?php print $style['option_title'] ?>>
      <b> <?php
      $cid = 250; //4  Most Recent Employer: Name
      $data = $submission->data[$cid]['value'][0];
//4  Most Recent Employer:
      print $node->webform['components'][213]['name'];
      ?></b><br>
      <?php print $data; ?>
    </td>
    <?php
    // 4th Most Recent Employer: May we contact
    $cid = 226;
    $selected = $submission->data[$cid]['value'][0];
    $options = _webform_select_options_from_text($node->webform['components'][$cid]['extra']['items']);
    $gr_title = $node->webform['components'][$cid]['name'];
    ?>
    <td width="12%" <?php print $style['option_title_right'] ?>>
      <b><?php print $gr_title ?></b><br>
      <?php if (isset($selected) && !empty($selected) && $selected != '&nbsp;') : ?>
        <?php print $options[$selected]; ?><br>
      <?php endif; ?>
    </td>
    <?php
    $cids = array(
      224 => "16%", // 4th Most Recent Employer: Supervisor:
      225 => "32%", // 4th Most Recent Employer: Phone:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td  width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <?php
    $cids = array(
      253 => "40%", // 4th Most Recent Employer: Address:
      233 => "30%", // 4th Most Recent Employer: City:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td  width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
    <?php
    $cids = array(
      259 => "10%", // 4th Most Recent Employer: State:
      262 => "15%", // 4th Most Recent Employer: Zip:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid => $v) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid => $v): ?>
      <td  width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b><br>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>
</table>
<table  width="100%" style="border-collapse: collapse;">
  <tr>
    <td  width="33%" <?php print $style['option_title_right'] ?>>
      <b><?php
        // 4th Most Recent Employer: Dates of Employment:
        print $node->webform['components'][216]['name'];
        ?></b><br>

      <?php
      $cids = array(
        217, // 4th Most Recent Employer Date started:
        218, // 4th Most Recent Employer Date finished::
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?> <br>
      <?php endforeach; ?>
    </td>

    <td  width="33%" <?php print $style['option_title_right'] ?>>
      <b><?php
// 4th Most Recent Employer: Salary
      print $node->webform['components'][221]['name'];
      ?></b><br>
      <?php
      $cids = array(
        222, // 4th Most Recent Employer: Beginning salary:
        223, // 4th Most Recent Employer: Ending salary:
      );

      $data = array();
      $gr_title = array();

      foreach ($cids as $cid) {
        $data[$cid] = $submission->data[$cid]['value'][0];
        $gr_title[$cid] = $node->webform['components'][$cid]['name'];
      }
      ?>

      <?php foreach ($cids as $cid): ?>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?><br>
      <?php endforeach; ?>
    </td>

    <?php
    $cids = array(
      238, // 4th Most Recent Employer: Reason for leaving:
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td  width="33%" <?php print $style['option_title_right'] ?>>
        <b><?php print $gr_title[$cid]; ?></b>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>



  </tr>
</table>
<?php
$cids = array(
  309 => "25%", // 4th Most Recent Employer: Position(s) held (list all):
  310 => "25%", // 4th Most Recent Employer: Years:
  311 => "50%", // 4th Most Recent Employer: Duties:
);
$cids1 = array(
  313 => "25%", // 4th Most Recent Employer: Position(s)
  314 => "25%", // 4th Most Recent Employer: Years:
  315 => "50%", // 4th Most Recent Employer: Duties:
);
$cids2 = array(
  317 => "25%", // 4th Most Recent Employer: Position(s)
  318 => "25%", // 4th Most Recent Employer: Years:
  319 => "50%", // 4th Most Recent Employer: Duties:
);
$cids3 = array(
  418 => '25%', // 4th Most Recent Employer: Position(s)
  419 => '25%', // 4 Most Recent Employer: Years:
  420 => '50%', // 4 Most Recent Employer: Duties:
);
$cids4 = array(
  434 => '25%', // 4th Most Recent Employer: Position(s)
  435 => '25%', // 4 Most Recent Employer: Years:
  436 => '50%', // 4 Most Recent Employer: Duties:
);
$cids5 = array(
  430 => '25%', // 4th Most Recent Employer: Position(s)
  431 => '25%', // 4 Most Recent Employer: Years:
  432 => '50%', // 4 Most Recent Employer: Duties:
);
$cids6 = array(
  438 => '25%', // 4th Most Recent Employer: Position(s)
  439 => '25%', // 4 Most Recent Employer: Years:
  440 => '50%', // 4 Most Recent Employer: Duties:
);
$cids7 = array(
  422 => '25%', // 4th Most Recent Employer: Position(s)
  423 => '25%', // 4 Most Recent Employer: Years:
  424 => '50%', // 4 Most Recent Employer: Duties:
);
$cids8 = array(
  426 => '25%', // 4th Most Recent Employer: Position(s)
  427 => '25%', // 4 Most Recent Employer: Years:
  428 => '50%', // 4 Most Recent Employer: Duties:
);
$cids9 = array(
  414 => '25%', // 4th Most Recent Employer: Position(s)
  415 => '25%', // 4 Most Recent Employer: Years:
  416 => '50%', // 4 Most Recent Employer: Duties:
);

$cides = array($cids, $cids1, $cids2, $cids3, $cids4, $cids5, $cids6, $cids7, $cids8, $cids9);
foreach ($cides as $cids) {
  ?>
  <table  width="100%"style="border-collapse: collapse;">
    <tr>
      <?php
      $data = array();
      $gr_title = array();

      foreach ($cids as $cid => $v) {
        if ($submission->data[$cid]['value'][0] != '&nbsp;') {
          $data[$cid] = $submission->data[$cid]['value'][0];
          $gr_title[$cid] = $node->webform['components'][$cid]['name'];
        }
      }
      ?>

      <?php
      foreach ($cids as $cid => $v):
        if ($submission->data[$cid]['value'][0] != '&nbsp;') {
          ?>
          <td  width="<?php print $cids[$cid]; ?>" <?php print $style['option_title_right'] ?>>
            <b><?php print $gr_title[$cid]; ?></b><br>
            <?php print $data[$cid]; ?>
          </td>
        <?php } endforeach; ?>
    </tr>
  </table>
<?php } ?>




<table  width="100%" style="border-collapse: collapse;">
    <?php
    // The last text box right above 'Upload Resume'
    if ($submission->data[158]['value'][0] != '&nbsp;' && $submission->data[158]['value'][0] != "") :?>
      <tr>
        <td width="100%" <?php print $style['option_title_right'] ?>>
          <b><?php print (isset($node->webform['components'][158]['name'])) ? $node->webform['components'][158]['name'] : ""?></b><br/><br/>
          <?php print (isset($submission->data[$cid]['value'][0])) ? $submission->data[158]['value'][0] . "<br/><br/>" : "";?>
        </td>
      </tr>
    <?php endif; ?>

   <?php // APPLICANT'S CERTIFICATION AND AGREEMENT ?>
  <tr>
    <td width="100%">
      <?php
      // somebody just add new field to the webform & remake this !
      $z = str_replace('signed by online', 'signed by ' . $names . ' through online', $node->webform['components'][229]['value']);
// PLEASE READ CAREFULLY
      print $z;
      ?>
    </td>
  </tr>
</table>

     <p>
<?php
// PLEASE READ CAREFULLY
  //    print render($submission->data[270]);
//kpr($submission->data);
//die();
      ?> </p>

<table  width="100%" style="border-collapse: collapse;">
  <?php print $empty_row; ?>
  <tr>
    <?php
    $cids = array(
      269, // Type full name
    );

    $data = array();
    $gr_title = array();

    foreach ($cids as $cid) {
      $data[$cid] = $submission->data[$cid]['value'][0];
      $gr_title[$cid] = $node->webform['components'][$cid]['name'];
    }
    ?>

    <?php foreach ($cids as $cid): ?>
      <td colspan="2" <?php print $style['option_title_thin_left'] ?>>
        <?php print $gr_title[$cid]; ?>
      </td>

      <td colspan="7" <?php print $style['answer_border'] ?>>
        <?php print $data[$cid]; ?>
      </td>
    <?php endforeach; ?>
  </tr>

  <tr>
    <td colspan="2"></td>
    <td colspan="7" <?php print $style['answer_border'] ?>>
      <?php
      print date('m/d/Y', $submission->submitted);
      ?>
    </td>
  </tr>

</table>

<p style="text-align: center;"><strong>**<?php print t('FOR EMPLOYER\'S USE ONLY '); ?>**&nbsp;</strong></p>
<p style="text-align: center;"><strong>&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</strong></p>

<strong><?php print t('FOR SUPERVISOR TO COMPLETE UPON HIRE'); ?>:</strong>

<table width="100%" style="padding: 4px; border-collapse: collapse; background: #e6e6e6; border: 1px solid">
  <tr>
    <td style="padding: 4px; width: 20%; border: 1px solid"><b><?php print t('Date of Hire'); ?>:</b> <br/><br/><br/></td>
    <td colspan="2" style="padding: 4px; width: 30%; border: 1px solid"><b><?php print t('Job title'); ?>:</b> <br /><br/><br/></td>
    <td colspan="2" style="padding: 4px;  width: 50%; border: 1px solid"><b><?php print t('Department'); ?>:</b> <br /><br/><br/></td>
  </tr>

  <tr>
    <td style="padding: 4px; width: 20%; border: 1px solid">
      <b><?php print t('Salary'); ?>:</b> <br/><br/>

      _______________ <br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('Hourly'); ?><br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('Salary'); ?>
    </td>
    <td style="padding: 4px; width: 15%; border: 1px solid">
      <b><?php print t('Status'); ?>:</b> <br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('Full-Time'); ?> <br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('Part-Time'); ?> <br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('PRN'); ?>
    </td>
    <td style="padding: 4px; width: 15%; border: 1px solid">
      <b><?php print t('Shift'); ?>:</b> <br/><br/>
      <b style="font-size: 20px;">&#9633; </b> <?php print t('First Shift'); ?><br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('Second Shift'); ?><br /><br />
      <b style="font-size: 20px;">&#9633; </b> <?php print t('Third Shift'); ?>
    </td>
    <td colspan="2" style="width: 20%; border: 1px solid;">
      <p><b>Other Information:</b></p> <br /><br />
      EXT. #: ______<br />
      (if known)
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

<?php endif; ?>