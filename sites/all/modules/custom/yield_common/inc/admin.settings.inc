<?php

/**
 * @file
 * Form for the inbo_common admin settings.
 */

/**
 * Helpful callback for inbo administration page.
 */
function yield_common_settings() {
  $form = array();
  $form['inbo_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook url'),
    '#default_value' => variable_get('inbo_facebook', 'https://www.facebook.com/'),
    '#size' => 30,
    '#maxlength' => 128,
    '#description' => t("Facebook url"),
    '#required' => TRUE,
  );
  $form['import_file'] = array(
      '#type' => 'file',
      '#title' => 'Файл для импорта',
    );
  $form['button'] = array(
    '#type' => 'submit',
    '#value' => 'rebuild node',
    '#submit' => array('test_submit'),
  );
  return system_settings_form($form);
}

function test_submit($form, $form_state){
  $dir = 'public://import_files/';
  file_prepare_directory($dir, FILE_CREATE_DIRECTORY);
  $file = $dir . $_FILES['files']['name']['import_file'];
  $values = own_import_from_file_work($file);
  //print_r($values);exit();
  $node = node_load('47');
  foreach ($values as $mainkey => $mainvalue) {
    foreach ($node->field_region_weather['und'] as $key => $value) {
      $entity = entity_load('field_collection_item', array($value['value']));
      $region_tid = $entity[$value['value']]->field_fc_region['und']['0']['tid'];
      $region = $region_tid;
      $data['values'][$region] = array();
      foreach ($entity[$value['value']]->field_fc_weather['und'] as $key => $value2) {
        $entity2 = entity_load('field_collection_item', array($value2['value']));
        $month_tid = $entity2[$value2['value']]->field_fc_month['und']['0']['tid'];
        $month = $month_tid;
        if($mainvalue['region'] == $region){
          $entity2[$value2['value']]->field_temperature['und']['0']['value'] = $mainvalue[$month.'_temp'];
          $entity2[$value2['value']]->field_rainfall['und']['0']['value'] = $mainvalue[$month.'_rain'];
          $entity2[$value2['value']]->save();
        }

      }
    }
  }
}

function own_import_from_file_work($file) {
  drupal_set_message('Тут мы будем работать с файлом.');
  $arr_from_file = own_import_from_file_get_array_from_file($file);
  return $arr_from_file;
}

function own_import_from_file_get_array_from_file($file) {
  $lib_dir = libraries_get_path('phpexcel');

  require_once($lib_dir . '/Classes/PHPExcel/IOFactory.php');
  $objPHPExcel = PHPExcel_IOFactory::load(drupal_realpath($file));
  $objPHPExcel->setActiveSheetIndex(0);
  $aSheet = $objPHPExcel->getActiveSheet();
  // обрабатываем каждую строку
  foreach ($aSheet->getRowIterator() as $rkey => $row) {
    $cellIterator = $row->getCellIterator();
    // в зависмости от номера строки создаем массив заголовков.
    switch ($rkey) {
      case 1:         // Нормально название колонки
        break;
      case 2:         // Название колонки для Drupal
        foreach ($cellIterator as $ckey => $cell) {
          $kkey[$ckey] = $cell->getCalculatedValue();
        }
        break;

      default:
        // обрабатываем каждую ячейку строки
        foreach ($cellIterator as $ckey => $cell) {
          $res[$rkey][$kkey[$ckey]] = trim($cell->getCalculatedValue());
        }
    }
  }
  return $res;
}