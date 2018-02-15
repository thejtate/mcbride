<div class="physicians-find-a-physicians-items">
<?php foreach ($tree as $key => $value): ?>
  <div class="physicians-find-a-physicians-collapsible collapsed">
    <span class="main-hor-select"><?php print $key; ?><span class="close-open-select"></span></span>
    <?php print theme('physicians_find_a_physicians_item', array('items' => $value, 'level' => 1)); ?>
  </div>
<?php endforeach; ?>
</div>