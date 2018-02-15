<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<ul>
  <?php foreach ($rows as $id => $row): ?>
    <li>
      <?php print $row; ?>
    </li>
  <?php endforeach; ?>
</ul>
