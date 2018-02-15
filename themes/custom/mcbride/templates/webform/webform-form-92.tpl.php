<?php
/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
$form['submitted']['body_part']['#options'][''] = t('CHOOSE A BODY PART');
?>
<?php
// If editing or viewing submissions, display the navigation at the top.
if (isset($form['submission_info']) || isset($form['navigation'])) {
  print drupal_render($form['navigation']);
  print drupal_render($form['submission_info']);
}
?>
<!--
 Print out the main part of the form.-->
<!-- Feel free to break this up and move the pieces within the array.-->
<?php print drupal_render($form['submitted']['full_name']); ?>
<?php print drupal_render($form['submitted']['date_of_birth']); ?>
<?php print drupal_render($form['submitted']['phone']); ?>
<?php print drupal_render($form['submitted']['alt_phone']); ?>
<?php print drupal_render($form['submitted']['email']); ?>
<?php print drupal_render($form['submitted']['insurance_provider']); ?>
<?php print drupal_render($form['submitted']['insurance_information']); ?>
<?php print drupal_render($form['submitted']['your_appointment']); ?>
<?php print drupal_render($form['submitted']['prefered_time']); ?>
<?php print drupal_render($form['submitted']['physician']); ?>
<?php print drupal_render($form['submitted']['body_part']); ?>
<?php print drupal_render($form['submitted']['please_describe_symptoms']); ?>
<?php print drupal_render($form['submitted']['symptoms']); ?>

<?php
// Always print out the entire $form. This renders the remaining pieces of the
// form that haven't yet been rendered above.
print drupal_render_children($form);
?>

<?php
// Print out the navigation again at the bottom.
if (isset($form['submission_info']) || isset($form['navigation'])) {
  unset($form['navigation']['#printed']);
  print drupal_render($form['navigation']);
}
?>