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
<div class="form-item">
  <label for="edit-title">Account Number:</label>
  <?php print drupal_render($form['submitted']['account_number']); ?>
</div>

<!--date_of_birth-->
<div class="block-date-birth watermark">
  <?php print drupal_render($form['submitted']['date_of_birth']); ?>
  
  <?php print drupal_render($form['submitted']['date_of_birth']['month']); ?>
  <?php print drupal_render($form['submitted']['date_of_birth']['day']); ?>
  <div class="form-item form-year">
  <?php print drupal_render($form['submitted']['date_of_birth']['year']); ?>
    </div>

</div>

<!--patient_name-->
<div class="pation_name watermark">
  <?php print drupal_render($form['submitted']['patient_name']); ?>
  <?php print drupal_render($form['submitted']['patient_name']['patient_name_first']); ?>
  <?php print drupal_render($form['submitted']['patient_name']['patient_name_last']); ?>
</div>

<!--amount-->
<div class="form-item form-amount">
  <?php print drupal_render($form['submitted']['amount']); ?>
</div>

<!--pay now-->
<div class="button-wrapper">
  <?php print drupal_render($form['submitted']['pay_now']); ?>

</div>

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

<?php print $paypal_icons; ?>