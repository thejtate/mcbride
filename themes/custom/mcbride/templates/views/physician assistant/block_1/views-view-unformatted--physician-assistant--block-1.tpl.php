<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php $num_of_rows = round((count($rows)/2)-1); ?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="block-physician-assistants-second">
  <?php foreach ($rows as $id => $row): ?>
    <div class="<?php print $classes_array[$id]; ?>">
      <?php print $row; ?>
    </div>
    <?php if ($id == $num_of_rows): ?>
</div><div class="block-physician-assistants-second">
    <?php endif; ?>
  <?php endforeach; ?>
</div>  