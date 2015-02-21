<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Yield master'),
  'category' => t('Yield'),
  'icon' => 'yield_master.png',
  'theme' => 'yield_master',
  'css' => 'yield_master.css',
  'regions' => array(
    'header' => t('Header'),
    'main_content' => t('Main content'),
    'footer' => t('Footer'),
  ),
);
