<?php

/**
 * @file
 * Plugin to handle the inbo footer toolbar.
 */

$plugin = array(
  'title' => t('Yield all_crop toolbar'),
  'single' => TRUE,
  'description' => t('Yield all_crop toolbar.'),
  'category' => t('YIELD'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo footer toolbar.
 */
function yield_common_yield_all_crop_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $form = drupal_get_form('yield_common_set_region_for_crop_capacity_form');
  $select_form = drupal_render($form);

  $block->content = theme('yield_all_crop', array(
    'all_crop' => NULL,
    'select' => $select_form,
  ));

  return $block;
}
