<?php

/**
 * @file
 * Plugin to handle the inbo sidebar'.
 */

$plugin = array(
  'title' => t('Inbo left sidebar'),
  'single' => TRUE,
  'description' => t('Inbo left sidebar.'),
  'category' => t('Inbo'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo left sidebar'.
 */
function yield_common_sidebar_left_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $tx = taxonomy_vocabulary_machine_name_load('Categories');
  $categories = taxonomy_get_tree($tx->vid);
  $parent_categories = array();
  foreach ($categories as $category) {
    if($category->parents['0'] == 0){
      $arr = array();
      $arr['tid'] = $category->tid;
      $arr['name'] = $category->name;
      $parent_categories[] = $arr;
    }
  }
  $links = array();
  foreach ($parent_categories as $value) {
    $output = '';
    $links = l($value['name'], 'taxonomy/term/'. $value['tid'], array('attributes' => array('id' => array('menu-term-'.$value['tid']))));
    $output .= $links;
    $second_level_categories = taxonomy_get_children_all($value['tid']);
    $second_level = array();
    foreach ($second_level_categories as $values) {
      $terms = taxonomy_get_parents($values->tid);
      $arr = array();
      $arr['tid'] = $values->tid;
      $arr['name'] = $values->name;
      foreach ($terms as $key) {
        if($key->tid == $value['tid']){
          $arr['class'] = 'with-arr';
        }else{
          $arr['class'] = '';
        }
      }
      $second_level[] = $arr;
    }
    $second_level_links = array();
    foreach ($second_level as $valuess) {
      $second_level_links[] = l($valuess['name'], 'taxonomy/term/'. $valuess['tid'], array('attributes' => array('class' => array($valuess['class']))));
    }
    $type = 'ul';
    $attributes = array(
    'class' => '',
    );
    $second_level_menu = theme('item_list', array(
      'items' => $second_level_links,
      'attributes' => array('class' => array('second-menu-columns')),
      'wrapper_attributes' => array('id' => 'pagination-wrapper', 'class' => array('list_second_level')),
    ));
    $output .= $second_level_menu;
    $item[] = $output;
  }
  $type = 'ul';
  $attributes = array(
  'class' => 'list_first_level',
  );
  $first_level_menu = theme_item_list(array('items' => $item, 'title' => '', 'type' => $type, 'attributes' => $attributes));
  
  $block->content = theme('inbo_sidebar_left', array(
    'categories_menu' => $first_level_menu,
  ));

  return $block;
}

function taxonomy_get_children_all($tid, $vid = 0, $key = 'tid'){
  $c = taxonomy_get_children($tid, $vid, $key);
  $result = array();
  foreach ($c as $t => $d){
    $result[$t] = $d;
    $below = taxonomy_get_children_all($t, $vid, $key);
    if (!empty($below)) {
      foreach ($below as $nt => $nd){
        $result[$nt] = $nd;
      }
    }
  }
  return $result;
}

