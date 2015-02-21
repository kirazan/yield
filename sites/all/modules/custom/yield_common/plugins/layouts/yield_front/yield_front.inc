<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Yield front'),
  'category' => t('Yield'),
  'icon' => 'yield_front.png',
  'theme' => 'yield_front',
  'css' => 'yield_front.css',
  'regions' => array(
    'main_section' => t('Main'),
    'article_section' => t('Article'),
    'patent_section' => t('Patent'),
  ),
);
