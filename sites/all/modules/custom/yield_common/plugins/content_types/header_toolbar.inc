<?php

/**
 * @file
 * Plugin to handle the inbo header toolbar'.
 */

$plugin = array(
  'title' => t('Inbo header toolbar'),
  'single' => TRUE,
  'description' => t('Inbo header toolbar.'),
  'category' => t('Inbo'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo header toolbar'.
 */
function yield_common_header_toolbar_content_type_render($subtype, $conf, $panel_args, $context) {

  $block = new stdClass();
  
  //Main menu
  
  $left_menu = menu_navigation_links('menu-top-header-block-left-nav-l');
  $top_header_block_left_nav_link = theme('links', array('links' => $left_menu));

  $right_menu = menu_navigation_links('menu-top-header-block-right-lang');
  $top_header_block_right_lang_link = theme('links', array('links' => $right_menu));
  
  $categories_menu = menu_navigation_links('menu-main-categories-menu');
  $bottom_header_block_caregories = theme('links', array('links' => $categories_menu));
	
  //Logo
  $logo_path = theme_get_setting('logo');
	$variables = array(
		'path' => $logo_path, 
		'alt' => variable_get('site_name'),
		'title' => variable_get('site_name'),
		'attributes' => array('class' => 'logo'),
	);
	$logo_image = theme('image', $variables);
	$logo = l($logo_image, '<front>', array('html' => TRUE));

  //Social list
  $social_links = inbo_get_social_list();

  //Search form
  $search = drupal_get_form('search_form');
  $search_form = drupal_render($search);

  $block->content = theme('inbo_header', array(
    'top_header_block_left_nav_link' => $top_header_block_left_nav_link,
    'top_header_block_right_lang_link' => $top_header_block_right_lang_link,
    'middle_header_block_logo' => $logo,
    'middle_header_block_region' => NULL,
    'middle_header_block_sign_in' => NULL,
    'middle_header_block_cart' => NULL,
    'bottom_header_block_search' => NULL,
    'bottom_header_block_caregories' => $bottom_header_block_caregories,
  ));

  return $block;
}


function inbo_get_social_list() {
	$type = 'ul';
	$items = array();
	$title = t('My custom listing');
	// The following attributes apply to the list tag (e.g., <ol> or <ul>)
	$items[] = array(
		'data' => l('facebook', variable_get('inbo_facebook')),
		'class' => array('fb')
	);
	$items[] = array(
		'data' => l('google+', variable_get('inbo_google')),
		'class' => array('gp')
	);
	$items[] = array(
		'data' => l('twitter', variable_get('inbo_twitter')),
		'class' => array('tw')
	);
	
	return theme_item_list(array('items' => $items, 'title' => '', 'type' => $type, 'attributes' => array()));
}