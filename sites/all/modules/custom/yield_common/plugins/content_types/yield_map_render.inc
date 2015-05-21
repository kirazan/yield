<?php

/**
 * @file
 * Plugin to handle the inbo footer toolbar.
 */

$plugin = array(
  'title' => t('Yield map render toolbar'),
  'single' => TRUE,
  'description' => t('Yield map render toolbar.'),
  'category' => t('YIELD'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo footer toolbar.
 */
function yield_common_yield_map_render_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $map_render = '';
  $data = get_region_table_from_db_by_map_land_id('UA-56');
  $block->content = theme('yield_map_render', array(
    'map_render' => $map_render,
    'data' => $data,
  ));

  return $block;
}
