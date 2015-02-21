<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Yield map'),
  'category' => t('Yield'),
  'icon' => 'yield_map.png',
  'theme' => 'yield_map',
  'css' => 'yield_map.css',
  'regions' => array(
    'map_section' => t('Map'),
  ),
);
