<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>


<?php
  $year = $row->field_field_year[0]['raw']['taxonomy_term']->name;
  $yield = array();
  $yield['field_field_ar_krym'] = $row->field_field_ar_krym[0]['raw']['value'];
  $yield['field_field_cherkas_ka'] = $row->field_field_cherkas_ka[0]['raw']['value'];
  $yield['field_field_chernihivs_ka'] = $row->field_field_chernihivs_ka[0]['raw']['value'];
  $yield['field_field_chernivets_ka'] = $row->field_field_chernivets_ka[0]['raw']['value'];
  $yield['field_field_dnipropetrovs_ka'] = $row->field_field_dnipropetrovs_ka[0]['raw']['value'];
  $yield['field_field_donets_ka'] = $row->field_field_donets_ka[0]['raw']['value'];
  $yield['field_field_ivano_frankivs_ka'] = $row->field_field_ivano_frankivs_ka[0]['raw']['value'];
  $yield['field_field_kharkivs_ka'] = $row->field_field_kharkivs_ka[0]['raw']['value'];
  $yield['field_field_khersons_ka'] = $row->field_field_khersons_ka[0]['raw']['value'];
  $yield['field_field_khmel_nyts_ka'] = $row->field_field_khmel_nyts_ka[0]['raw']['value'];
  $yield['field_field_kirovohrads_ka'] = $row->field_field_kirovohrads_ka[0]['raw']['value'];
  $yield['field_field_kyivs_ka'] = $row->field_field_kyivs_ka[0]['raw']['value'];
  $yield['field_field_l_vivs_ka'] = $row->field_field_l_vivs_ka[0]['raw']['value'];
  $yield['field_field_luhans_ka'] = $row->field_field_luhans_ka[0]['raw']['value'];
  $yield['field_field_mykolaivs_ka'] = $row->field_field_mykolaivs_ka[0]['raw']['value'];
  $yield['field_field_odes_ka'] = $row->field_field_odes_ka[0]['raw']['value'];
  $yield['field_field_poltavs_ka'] = $row->field_field_poltavs_ka[0]['raw']['value'];
  $yield['field_field_rivnens_ka'] = $row->field_field_rivnens_ka[0]['raw']['value'];
  $yield['field_field_sums_ka'] = $row->field_field_sums_ka[0]['raw']['value'];
  $yield['field_field_ternopil_s_ka'] = $row->field_field_ternopil_s_ka[0]['raw']['value'];
  $yield['field_field_vinnyts_ka'] = $row->field_field_vinnyts_ka[0]['raw']['value'];
  $yield['field_field_volyns_ka'] = $row->field_field_volyns_ka[0]['raw']['value'];
  $yield['field_field_zakarpats_ka'] = $row->field_field_zakarpats_ka[0]['raw']['value'];
  $yield['field_field_zaporiz_ka'] = $row->field_field_zaporiz_ka[0]['raw']['value'];
  $yield['field_field_zhytomyrs_ka'] = $row->field_field_zhytomyrs_ka[0]['raw']['value'];
  $min = min($yield);
  $max = max($yield);
  $diff = $max - $min;
  $section = $diff / 5;
  $section = ceil($section);
  $sec1 = $min + $section;
  $range1 = range($min, $sec1);
  $sec2 = $sec1 + $section;
  $range2 = range($sec1, $sec2);
  $sec3 = $sec2 + $section;
  $range3 = range($sec2, $sec3);
  $sec4 = $sec3 + $section;
  $range4 = range($sec3, $sec4);
  $range5 = range($sec4, $max);
 foreach ($yield as $key => $value) {
    if(in_array($value, $range1)){
      $mass[$key]['color'] = '#E5EB0B';
      $mass[$key]['value'] = $value;
    }
    if(in_array($value, $range2)){
      $mass[$key]['color'] = '#B9D40B';
      $mass[$key]['value'] = $value;
    }
    if(in_array($value, $range3)){
      $mass[$key]['color'] = '#70AF1A';
      $mass[$key]['value'] = $value;
    }
    if(in_array($value, $range4)){
      $mass[$key]['color'] = '#097609';
      $mass[$key]['value'] = $value;
    }
    if(in_array($value, $range5)){
      $mass[$key]['color'] = '#075807';
      $mass[$key]['value'] = $value;
    }
  } 
  $map = create_svg_ukraine_map($mass);
?>
<div class="ukraine-map-svg-wrapp">
  <?php print $map; ?>
  <div class="map-year">
    <?php print $year; ?>
  </div>
</div>

<!--
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
-->