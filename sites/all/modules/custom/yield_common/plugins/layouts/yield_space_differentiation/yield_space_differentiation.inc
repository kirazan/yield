<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Yield space_differentiation'),
  'category' => t('Yield'),
  'icon' => 'yield_space_differentiation.png',
  'theme' => 'yield_space_differentiation',
  'css' => 'yield_space_differentiation.css',
  'regions' => array(
    'main_slider' => t('Main slider'),
  ),
);
