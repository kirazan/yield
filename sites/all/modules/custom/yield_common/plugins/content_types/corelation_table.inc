<?php

/**
 * @file
 * Plugin to handle the inbo footer toolbar.
 */

$plugin = array(
  'title' => t('Yield corelation_table toolbar'),
  'single' => TRUE,
  'description' => t('Yield corelation_table toolbar.'),
  'category' => t('YIELD'),
  'render last' => TRUE,
);

/**
 * Output function for the inbo footer toolbar.
 */
function yield_common_corelation_table_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $table = get_correlation_table();
  $tbody = '';
  $tbody .='<table class="all-data-table">
        <thead>
          <tr><th>Область</th><th>R4</th><th>R5</th><th>R6</th><th>R9</th><th>R10</th><th>T4</th><th>T5</th><th>T6</th><th>T9</th><th>T10</th></tr>
        </thead>
        <tbody id="yield-table-body">';

  foreach ($table as $key => $value) {
   $tbody .=  '<tr><td>'.$key.'</td>';
   foreach ($value as $key2 => $value2) {
      $color = '';
      if(abs($value2) > 0.4){
        $color = 'red';
      }
      $tbody .=  '<td style="color:'.$color.'">'.$value2.'</td>';
   }
   $tbody .= '</tr>';
  }
  $tbody .= '
  </tbody>
      </table>';

  $block->content = theme('corelation_table', array(
    'correlation' => $tbody,
  ));

  return $block;
}
