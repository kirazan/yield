<?php

/**
 * @file
 * Plugin to handle the inbo footer toolbar.
 */

$plugin = array(
  'title' => t('Yield front patent toolbar'),
  'single' => TRUE,
  'description' => t('Yield front patent toolbar.'),
  'category' => t('YIELD'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo footer toolbar.
 */
function yield_common_yield_front_patent_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();

  $block->content = theme('yield_front_patent', array(
    'front_patent' => NULL,
  ));

  return $block;
}
