<?php

/**
 * @file
 * template.php
 */

function yield_preprocess_page(&$variables) {
// Проверим, является ли эта страницей - главной страницей
if(drupal_is_front_page()) {
    // Уберём default_message с главной
    unset($variables['page']['content']['system_main']['default_message']);
  }
}