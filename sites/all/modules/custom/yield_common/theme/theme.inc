<?php
/**
 * @file
 * An array of preprocessors to fill variables for templates and helper
 * functions to make theming easier.
 */

function template_preprocess_adportal_user_login(&$vars) {
	$form = drupal_get_form('user_login'); 
  $vars['login_form'] = drupal_render($form);
}

function template_preprocess_adportal_user_pass(&$vars) {
	$form = drupal_get_form('user_pass'); 
  $vars['pass_form'] = drupal_render($form);
}

function template_preprocess_adportal_user_register(&$vars) {
	$form = drupal_get_form('user_register_form'); 
  $vars['register_form'] = drupal_render($form);
}