<div class="block-content-item with-border">
  <div class="physicians-find-a-physicians-items">

    <div class="block-title">
      <h3><?php print $list_name; ?></h3>
    </div>
    <?php foreach ($tree as $key => $value): ?>
      <div class="physicians-find-a-physicians-collapsible collapsed">
        <span class="external">
          <span class="main-hor-select"><?php print $key; ?><span class="close-open-select"></span></span>      </span>
          <?php print theme('physicians_find_a_physicians_item_mobile', array('items' => $value)); ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
