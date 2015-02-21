<?php

/**
 * @file
 * Plugin to handle the inbo footer toolbar.
 */

$plugin = array(
  'title' => t('Yield front main toolbar'),
  'single' => TRUE,
  'description' => t('Yield front main toolbar.'),
  'category' => t('YIELD'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo footer toolbar.
 */
function yield_common_yield_front_main_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();

  $block->content = theme('yield_front_main', array(
    'front_main' => NULL,
  ));

  return $block;
}
