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
<div class="block-content-item">
  <div class="block-title">
    <h3><?php print $form['submitted']['appointments']['#title']; ?></h3>
  </div>
<?php print drupal_render_children($form['submitted']['appointments']); ?>
  <?php hide($form['submitted']['appointments']); ?>
</div>
<div class="block-content-item">
  <div class="block-title">
    <h3><?php print $form['submitted']['our_staff']['#title']; ?></h3>
  </div>
<?php print drupal_render_children($form['submitted']['our_staff']); ?>
  <?php hide($form['submitted']['our_staff']); ?>
</div>
<div class="block-content-item">
  <div class="block-title">
    <h3><?php print $form['submitted']['our_communication']['#title']; ?></h3>
  </div>
<?php print drupal_render_children($form['submitted']['our_communication']); ?>
  <?php hide($form['submitted']['our_communication']); ?>
</div>
<div class="block-content-item">
  <div class="block-title">
    <h3><?php print $form['submitted']['our_facility']['#title']; ?></h3>
  </div>
<?php print drupal_render_children($form['submitted']['our_facility']); ?>
  <?php hide($form['submitted']['our_facility']); ?>
</div>
<div class="block-content-item border-none">
  <?php print render($form['submitted']['name_of_physician_seen']); ?>
  <?php print render($form['submitted']['location_visited']); ?>
  <div class="question">
    <?php print render($form['submitted']['would_you_like_us_to_contact_you']); ?>
  </div>

</div>

    <div class="block-content-item border-none">
      <?php
      hide($form['actions']);
      // Print out the main part of the form.
      // Feel free to break this up and move the pieces within the array.
      print drupal_render($form['submitted']);
      ?>

      <?php
      // Always print out the entire $form. This renders the remaining pieces of the
      // form that haven't yet been rendered above.
      print drupal_render_children($form);
      ?>
      <div class="button-wrapper">
        <?php print render($form['actions'])?>
      </div>
      <?php
      // Print out the navigation again at the bottom.
      if (isset($form['submission_info']) || isset($form['navigation'])) {
        unset($form['navigation']['#printed']);
        print drupal_render($form['navigation']);
      }
      ?>
    </div>