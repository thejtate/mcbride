<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>
<div  class="wrapper" id="wrapper">
  <div id="header" class="header">
    <div class="block-structure">
      <div class="section clearfix">
        <div class="logo">
          <?php if ($logo): ?>
            <?php print l(theme('image', array('path' => $logo, 'alt' => t('Home'), 'title' => t('Home'))), $front_page, array('attributes' => array('id' => array('logo')), 'html' => TRUE, 'external' => TRUE)) ?>
          <?php endif; ?>
        </div>
        <div class="top-wrapper">
            <?php print render($page['header_top']); ?>
            <?php print render($page['social_icons']); ?>
        </div>
        <?php if (in_array("careers editor", $user->roles)) : ?>
          <div class="logout">
            <?php print l(theme('image', array('path' => $directory . '/images/logout-button-blue-hi-75.png', 'alt' => t('LogOut'), 'title' => t('LogOut'))), '/user/logout', array('attributes' => array('id' => array('logout')), 'html' => TRUE, 'external' => TRUE)) ?>
          </div>
        <?php endif; ?>
		
        <div class="call-to-action">
         <?php print render($page['calltoaction']);?>
        </div>


        <div id="navigation" class="navigation">
          <?php if (!empty($main_menu)): ?>
            <?php print $main_menu; ?>
          <?php endif; ?>
        </div>

        <?php print render($page['header']); ?>

      </div>
    </div><!-- /.section, /#header -->
  </div>
  <div class="middle <?php print (isset($page_class)) ? $page_class : ''  ?>">
    <div class="middle-top">
      <div class="block-structure">
        <h1><?php print (isset($page_section_name)) ? $page_section_name : $title;  ?></h1>
        <h2><?php print (isset($page_sub_section_name)) ? $page_sub_section_name : '';  ?></h2>
      </div>
    </div>
    <div class="middle-separate-shadow"></div>
    <div class="wrapper-middle-content">
      <div class="block-structure">

        <div class="left-nav-menu">
          <?php print render($page['sidebar_first']); ?>
        </div>

        <?php print render($page['highlighted']); ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>

        <?php if ($tabs = render($tabs)): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print render($page['content_bottom']); ?>
        <?php print $feed_icons; ?>

      </div>
    </div></div><!-- /#main, /#main-wrapper -->

</div><!--  /#page-wrapper -->
<hr />
<div id="footer" class="footer">
  <div class="block-structure">
    <div class="logo-footer-1">
      <?php print $footer_logo; ?>
    </div>
      <div class="logo-footer-2">
        <?php print $footer_logo2; ?>
      </div>
    <div class="copyright">
      <p>
        <?php print render($page['copyright']); ?>
      </p>
    </div>
    <div class="logo-footer">
		  <?php print l(theme('image', array('path' => path_to_theme() . '/images/logo-footer.png', 'alt' => t('Home'), 'title' => t('Home'))), 'http://www.mcboh.com/about-us/physician-owned', array('html' => TRUE, 'external' => TRUE)) ?>
		</div>
    <?php if (!empty($footer_file)): ?>
      <div class="file-footer">
        <?php print $footer_file; ?>
      </div>
    <?php endif; ?>
    <?php print render($page['footer']); ?>
    <?php print render($page['bottom']); ?>
  </div>
</div>
