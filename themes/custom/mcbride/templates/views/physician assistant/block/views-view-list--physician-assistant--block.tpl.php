<?php
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<div class="physicians-find-a-physicians-collapsible collapsed">
  <span class="main-hor-select"><?php print t('Select a physician assistant'); ?> <span class="close-open-select"></span> </span>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <ul class="sub-hor-select level-1">
    <?php foreach ($rows as $id => $row): ?>
      <li <?php
    if ($id == 0) {
      print 'class="first"';
    }
    elseif ($id == (count($rows) - 1)) {
      print 'class="last"';
    }
      ?>>
          <?php print $row; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

