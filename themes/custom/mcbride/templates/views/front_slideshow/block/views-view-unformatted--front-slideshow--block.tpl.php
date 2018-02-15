  <?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php foreach ($rows as $id => $row):?>
  <div class="<?php print $classes_array[$id]; ?>" <?php if($id != 0){ print 'style="display:none;"'; } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
