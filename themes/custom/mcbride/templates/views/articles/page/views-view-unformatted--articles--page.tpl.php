<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

  <?php if (!empty($title)): ?>
    <div class="block-title wrapper-block-content-item"><h3><?php print $title; ?></h3></div>
  <?php endif; ?>
  <?php foreach ($rows as $id => $row): ?>
    <div class="block-content-item">
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>

