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
<?php foreach ($rows as $id => $row): ?>
    <?php if ($id != count($rows) - 1) $row = preg_replace ('/<\/a>/', ',&nbsp;</a>',$row); 
    print $row;?>
<?php endforeach; ?>
