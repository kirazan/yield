<?php

/**
 * Implements template_preprocess_html().
 *
 */
//function sgblank_preprocess_html(&$variables) {
//  // Add conditional CSS for IE. To use uncomment below and add IE css file
//  drupal_add_css(path_to_theme() . '/css/ie.css', array('weight' => CSS_THEME, 'browsers' => array('!IE' => FALSE), 'preprocess' => FALSE));
//
//  // Need legacy support for IE downgrade to Foundation 2 or use JS file below
//  // drupal_add_js('http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js', 'external');
//}

/**
 * Implements template_preprocess_page
 *
 */
//function sgblank_preprocess_page(&$variables) {
//}

/**
 * Implements template_preprocess_node
 *
 */
//function sgblank_preprocess_node(&$variables) {
//}


function sgblank_preprocess_page(&$variables) {
    // Add page--node_type.tpl.php suggestions
    if (!empty($variables['node'])) {
        $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
    }

    if (!empty($variables['page']['sidebar_first'])){
        $left = $variables['page']['sidebar_first'];
    }

    if (!empty($variables['page']['sidebar_second'])) {
        $right = $variables['page']['sidebar_second'];
    }

    // Dynamic sidebars
    if (!empty($left) && !empty($right)) {
        $variables['main_grid'] = 'large-6 large-push-3';
        $variables['sidebar_first_grid'] = 'large-3 large-pull-6';
        $variables['sidebar_sec_grid'] = 'large-3';
    } elseif (empty($left) && !empty($right)) {
        $variables['main_grid'] = 'large-9 medium-9';
        $variables['sidebar_first_grid'] = '';
        $variables['sidebar_sec_grid'] = 'large-3 medium-3';
    } elseif (!empty($left) && empty($right)) {
        $variables['main_grid'] = 'large-9 large-push-3';
        $variables['sidebar_first_grid'] = 'large-3 large-pull-9';
        $variables['sidebar_sec_grid'] = '';
    } else {
        $variables['main_grid'] = 'large-12';
        $variables['sidebar_first_grid'] = '';
        $variables['sidebar_sec_grid'] = '';
    }
}
