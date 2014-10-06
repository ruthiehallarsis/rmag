<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  ruthie_zen_subtheme_preprocess_html($variables, $hook);
  ruthie_zen_subtheme_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // ruthie_zen_subtheme_preprocess_node_page() or ruthie_zen_subtheme_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function ruthie_zen_subtheme_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */



function RUTHIE_ZEN_SUBTHEME_preprocess_page(&$vars) {

    //drupal_set_html_head("<meta name='title' content ='Ruthie BORCESSSSSSSSSSSSSSSS' />");
    //drupal_set_html_head("<meta name='description' content ='descriptionnnn' />");

    if (drupal_is_front_page()) {
        unset($vars['page']['content']['system_main']['default_message']); //will remove message "no front page content is created"
        drupal_set_title(''); //removes welcome message (page title)
    }
    
    global $user;
    global $base_path;

    $jq = "jQuery(document).ready(function(){

                jQuery('ul.menu li a:contains(\"My Works\")').attr( 'href','javascript:void(0);');

                var mainmenu_container = jQuery('#block-menu-block-2 ul.menu');

                var submenu_container = jQuery('#block-menu-block-2 ul.menu li a:contains(\"My Works\")').next('ul.menu');

                mainmenu_container.hide();
                submenu_container.hide();

                jQuery('#menu-button-mobile').click(function(){

                     if(mainmenu_container.is(':visible')){
                      mainmenu_container.slideUp();
                      submenu_container.hide();
                     }else{
                      mainmenu_container.slideDown();
                      submenu_container.hide();
                     }
                });
                  
                jQuery('#block-menu-block-2 ul.menu li a:contains(\"My Works\")').click(function(){

                     if(submenu_container.is(':visible')){
                      submenu_container.slideUp();
                     }else{
                      submenu_container.slideDown();
                     }
                });

              
                jQuery('#main-menu ul.menu li').hover(function () {
                   clearTimeout(jQuery.data(this,'timer'));
                   jQuery('ul',this).stop(true,true).slideDown(200);
                }, function () {
                  jQuery.data(this,'timer', setTimeout(jQuery.proxy(function() {
                    jQuery('ul',this).stop(true,true).slideUp(200);
                  }, this), 100));
                });
          });";
    
    drupal_add_js($jq, array('type' => 'inline', 'scope' => 'header'));
}


/*
 jQuery('#block-menu-block-1 a:contains(\"Home\")').click(function (){
                    jQuery('html, body').animate({
                       scrollTop: $('#block-views-view-slider-block').offset().top
                    }, 2000);*/