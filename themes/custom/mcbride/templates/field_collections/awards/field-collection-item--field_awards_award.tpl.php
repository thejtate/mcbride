<?php

/**
 * @file
 * Default theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
$class_border = isset ($content['field_awards_award_image']['#flag_border']) ? 'border-none' : '';
?>
<div class="block-content-item <?php print $class_border; ?>">
  <?php //if(empty($content['field_awards_award_image']['#printed'])):?>
    <div class="block-image-top">
      <?php print render($content['field_awards_award_image'])?>
    </div>
  <?php //endif;?>
  <h2 class="award_title"><?php print render($content['field_visitors_content_title']); ?></h2>
    <?php
      print render($content);
    ?>
</div>
