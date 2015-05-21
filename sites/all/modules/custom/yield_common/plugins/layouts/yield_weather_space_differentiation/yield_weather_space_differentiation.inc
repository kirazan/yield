<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Yield weather space differentiation'),
  'category' => t('Yield'),
  'icon' => 'yield_weather_space_differentiation.png',
  'theme' => 'yield_weather_space_differentiation',
  'css' => 'yield_weather_space_differentiation.css',
  'regions' => array(
    'main_content' => t('Main content'),
  ),
);
