<div id="admin-menu" class="admin-menu">
  <div id="admin-menu-wrapper">
    <ul>
      <?php foreach ($links as $key => $value):?>
        <li class="admin-menu-toolbar-category">
          <?php print l($value['title'], $value['path'], isset($value['options']) ? $value['options'] : array()) ?>
        </li>      
      <?php endforeach;?>
      
  </ul>
  </div>
</div>
