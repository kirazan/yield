<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Yield yield_main_crop'),
  'category' => t('Yield'),
  'icon' => 'yield_main_crop.png',
  'theme' => 'yield_main_crop',
  'css' => 'yield_main_crop.css',
  'regions' => array(
    'main_slider' => t('Main crop'),
  ),
);
