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

<div class="hidden" style="display:none;">
  <div id="employment-success-message">
    <div class="block-title inpopup">
      <h2 class="node-title">Thank You</h2>
    </div>
    <p>Your request has been sent successfully!</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php print l('Return to news', 'news', array('attributes' => array('class' => array('button','button-return')))) ; ?>
  </div>
</div>

<?php
// If editing or viewing submissions, display the navigation at the top.
if (isset($form['submission_info']) || isset($form['navigation'])) {
  print drupal_render($form['navigation']);
  print drupal_render($form['submission_info']);
}

// Print out the main part of the form.
// Feel free to break this up and move the pieces within the array.
hide($form['actions']);
print drupal_render($form['submitted']);

// Always print out the entire $form. This renders the remaining pieces of the
// form that haven't yet been rendered above.
print drupal_render_children($form);
?>
<div class="button-wrapper">
  <?php print render($form['actions']) ?>
</div>
<?php
// Print out the navigation again at the bottom.
if (isset($form['submission_info']) || isset($form['navigation'])) {
  unset($form['navigation']['#printed']);
  print drupal_render($form['navigation']);
}
