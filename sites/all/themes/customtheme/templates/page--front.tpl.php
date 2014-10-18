<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
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
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div id="page">
  <div id="header">
    <div class="nav-container">
      <nav role="navigation" id="navbar" class="navbar navbar-default navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <?php
            $menu = menu_navigation_links('menu-bootstrap-custom-menu');
            print theme('links__menu-bootstrap-custom-menu', array(
              'links' => $menu,
              'attributes' => array(
                'id' => 'menu-bootstrap-custom-menu',
                'class' => array('nav', 'navbar-nav'),
              ),
              'heading' => array(
                'text' => "",
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            ));
          ?>
          <?php
            $menu = menu_navigation_links('menu-bootstrap-custom-menu-right');
            print theme('links__menu-bootstrap-custom-menu-right', array(
              'links' => $menu,
              'attributes' => array(
                'id' => 'menu-bootstrap-custom-menu-right',
                'class' => array('nav', 'navbar-nav', 'navbar-right'),
              ),
              'heading' => array(
                'text' => "",
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            ));
          ?>
        </div>
      </nav>
    </div>
    <?php print render($page['header']); ?>
  </div> <!-- /.section, /#header -->
  <div class="name-container">
    <div class="name">
      <h1><?php print theme_get_setting('my_name'); ?></h1>
    </div>
  </div>
  <div class="description-container">
    <div class="description">
      <div class="left">
        <h1><?php print theme_get_setting('greeting_text'); ?></h1>
        <p><?php print theme_get_setting('description_text'); ?></p>
      </div>
      <div class="right">
        <?php //$image_url = file_create_url(file_load(theme_get_setting('my_image'))->uri); ?>
        <?php $path = drupal_get_path('theme', 'customtheme') . '/images/ruthie-image.png'; ?>
        <img src="<?php print $path; ?>">
      </div>
    </div>
  </div>

  
  <?php print $feed_icons; ?>

  <div id="main-wrapper">
    <?php if (!drupal_is_front_page()) { ?>
    <?php print render($page['content']); ?>
    <?php } ?>
    <?php print render($page['myworks']); ?>
  </div> <!-- /#main, /#main-wrapper -->
  
  <div id="footer">
    <h1 class="letstalk"><span><?php print theme_get_setting('contact_header_text'); ?></span></h1>
    <div class="container">
      <div class="left">
        <?php print $messages; ?>
        <?php print render($page['footer']); ?>
      </div>
      <div class="right">
        <a href="mailto:<?php print theme_get_setting('mailto_email'); ?>"><i class="fa fa-envelope-square fa-5x"></i></a>
        <a href="<?php print theme_get_setting('facebook_link'); ?>" target="_blank"><i class="fa fa-facebook-square fa-5x"></i></a>
        <a href="<?php print theme_get_setting('instagram_link'); ?>" target="_blank"><i class="fa fa-instagram fa-5x"></i></a>
        <a href="<?php print theme_get_setting('twitter_link'); ?>" target="_blank"><i class="fa fa-twitter-square fa-5x"></i></a>
        <a href="<?php print theme_get_setting('linkedin_link'); ?>" target="_blank"><i class="fa fa-linkedin-square fa-5x"></i></a>
        <a href="<?php print theme_get_setting('github_link'); ?>" target="_blank"><i class="fa fa-github-square fa-5x"></i></a>
      </div>
    </div>
  </div> <!-- /.section, /#footer -->
  <div class="copyright">
    <?php print theme_get_setting('copyright_text'); ?>
  </div>
</div>
