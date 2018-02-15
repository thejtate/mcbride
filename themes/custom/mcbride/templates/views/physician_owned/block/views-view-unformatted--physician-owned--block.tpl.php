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
<ul>
  <?php foreach ($rows as $id => $row): ?>
    <li>
      <?php print $row; ?>
    </li>
    <?php if ($id == $num_of_rows): ?>
     </ul><ul class="last">
    <?php endif; ?>
  <?php endforeach; ?>
</ul>
