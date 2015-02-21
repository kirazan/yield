<?php

/**
 * @file
 * Plugin to handle the inbo footer toolbar.
 */

$plugin = array(
  'title' => t('Yield front article toolbar'),
  'single' => TRUE,
  'description' => t('Yield front article toolbar.'),
  'category' => t('YIELD'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo footer toolbar.
 */
function yield_common_yield_front_article_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();

  $block->content = theme('yield_front_article', array(
    'front_article' => NULL,
  ));

  return $block;
}
