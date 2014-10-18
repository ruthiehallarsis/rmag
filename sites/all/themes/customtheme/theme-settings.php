<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function customtheme_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }
  $form['my_name'] = array(
    '#type'          => 'textfield',
    '#title'         => t('My Name'),
    '#default_value' => theme_get_setting('my_name'),
  );

  $form['my_image'] = array(
    '#title' => t('My Image'),
    '#type' => 'managed_file',
    '#description' => t('The uploaded image will be displayed beside the description'),
    '#default_value' => theme_get_setting('my_image'),
    '#upload_location' => 'public://my_image/',
  );

  $form['greeting_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Greeting Text'),
    '#default_value' => theme_get_setting('greeting_text'),
  );

  $form['description_text'] = array(
    '#type'          => 'textarea',
    '#title'         => t('My Description'),
    '#default_value' => theme_get_setting('description_text'),
  );

  $form['contact_header_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Contact Header Text'),
    '#default_value' => theme_get_setting('contact_header_text'),
  );

  $form['mailto_email'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Email to'),
    '#default_value' => theme_get_setting('mailto_email'),
  );

  $form['facebook_link'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Facebook Link'),
    '#default_value' => theme_get_setting('facebook_link'),
  );

  $form['instagram_link'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Instagram Link'),
    '#default_value' => theme_get_setting('instagram_link'),
  );

  $form['twitter_link'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Twitter Link'),
    '#default_value' => theme_get_setting('twitter_link'),
  );

  $form['linkedin_link'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Linkedin Link'),
    '#default_value' => theme_get_setting('linkedin_link'),
  );

  $form['github_link'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Github Link'),
    '#default_value' => theme_get_setting('github_link'),
  );

  $form['copyright_text'] = array(
    '#type'          => 'textarea',
    '#title'         => t('Bottom Text'),
    '#default_value' => theme_get_setting('copyright_text'),
  );

}
