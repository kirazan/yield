<?php

/**
 * @file
 * Form for the inbo_common admin settings.
 */

/**
 * Helpful callback for inbo administration page. 
 */
function yield_common_settings() {
  $form = array();
  $form['inbo_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook url'),
    '#default_value' => variable_get('inbo_facebook', 'https://www.facebook.com/'),
    '#size' => 30,
    '#maxlength' => 128,
    '#description' => t("Facebook url"),
    '#required' => TRUE,
  );
  $form['inbo_google'] = array(
    '#type' => 'textfield',
    '#title' => t('google url'),
    '#default_value' => variable_get('inbo_google', 'https://plus.google.com/'),
    '#size' => 30,
    '#maxlength' => 128,
    '#description' => t("google url"),
    '#required' => TRUE,
  );
  $form['inbo_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('twitter url'),
    '#default_value' => variable_get('inbo_twitter', 'https://twitter.com/'),
    '#size' => 30,
    '#maxlength' => 128,
    '#description' => t("twitter url"),
    '#required' => TRUE,
  );
  $form['backgroundimage'] = array(
		'#type' => 'managed_file',
		'#name' => 'backgroundimage_image',
		'#title' => t('Upload image, huh!'),
		'#default_value' => variable_get('backgroundimage', ''),
		'#description' => t("Here you can upload an image to the background!"),
		'#required' => TRUE,
		'#upload_location' => 'public://backgroundimage/'
  );
	$form['brading_url'] = array(
		'#type' => 'textfield',
		'#title' => t('branding url'),
		'#default_value' => variable_get('brading_url', 'https://'),
		'#size' => 30,
		'#maxlength' => 128,
		'#description' => t("branding url"),
		'#required' => TRUE,
	);
  return system_settings_form($form);
}

