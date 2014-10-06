<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */


global $base_path;
?>
<html xmlns:og="http://opengraphprotocol.org/schema/">
<div class="page-wrapper-wrap top-gradient">
  <div id="page">
    <header class="header" id="header" role="banner">
      <a href="javascript:void(0);" id="menu-button-mobile"><img src="<?php echo $base_path;?>sites/default/files/menu-button-mobile.png"></a>
      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
            $menu_name = variable_get('menu_main_links_source', 'main-menu');
            $tree = menu_tree($menu_name);
            print drupal_render($tree);
          ?>
        </nav>
      <?php endif; ?>

      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div class="header__name-and-slogan" id="name-and-slogan">
          <?php if ($site_name): ?>
            <h1 class="header__site-name" id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($secondary_menu): ?>
        <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
          <?php print theme('links__system_secondary_menu', array(
            'links' => $secondary_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => $secondary_menu_heading,
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['header']); ?>

    </header>
  </div>
</div>

<div class="for-slider-wrapper">
  <?php print render($page['below_header']); ?>
</div>

<div class="page-wrapper-wrap bottom-gradient">
  <div id="page">
    <div id="main">
      <div id="above-content">
         <?php print render($page['above_content']); ?>
      </div>
      <div id="content" class="column" role="main">
        <?php print $breadcrumb; ?>
        <a id="main-content"></a>
        <!--<?php //print render($title_prefix); ?>
        <?php //if ($title): ?>
          <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
        <?php //endif; ?>
        <?php //print render($title_suffix); ?>-->
        <?php print $messages; ?>
        <?php print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div>

      <div id="navigation">
        <?php print render($page['navigation']); ?>
      </div>

      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <?php if ($sidebar_first || $sidebar_second): ?>
        <aside class="sidebars">
          <?php print $sidebar_first; ?>
          <?php print $sidebar_second; ?>
        </aside>
      <?php endif; ?>

    </div>

    <?php print render($page['footer']); ?>

  </div>
</div>
<?php print render($page['bottom']); ?>
</html>