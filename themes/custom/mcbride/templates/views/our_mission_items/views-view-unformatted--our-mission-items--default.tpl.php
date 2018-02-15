<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$last = 'line';
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php if (count($rows) == ($id+1) ) $last = ''; ?>
  <div class="<?php print $classes_array[$id] . ' ' . $last; ?>">
    <?php print $row; ?>
  </div>
<?php endforeach; ?>

