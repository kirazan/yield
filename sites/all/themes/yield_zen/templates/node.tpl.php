<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

</article>
<?php $year = $node->field_year_weather['und']['0']['taxonomy_term']->name; ?>
<?php //print_r($year); ?>
<?php print ($node->title); ?>
<?php //print_r($node); ?>
<?php
  $data = array();
  $data['year'] = $year;
  $data['values'] = array();
  foreach ($node->field_region_weather['und'] as $key => $value) {
    //print_r($value);
    $entity = entity_load('field_collection_item', array($value['value']));
    $region = ($entity[$value['value']]->field_fc_region['und']['0']['taxonomy_term']->name);
    //print_r($region);
    $data['values'][$region] = array();
    foreach ($entity[$value['value']]->field_fc_weather['und'] as $key => $value2) {
      $entity2 = entity_load('field_collection_item', array($value2['value']));
      //print_r($entity2[$value2['value']]);

      $month = $entity2[$value2['value']]->field_fc_month['und']['0']['taxonomy_term']->name;
      $temp = $entity2[$value2['value']]->field_temperature['und']['0']['value'];
      $rain = $entity2[$value2['value']]->field_rainfall['und']['0']['value'];
      $data['values'][$region][$month] = array();
      $data['values'][$region][$month]['temp'] = $temp;
      $data['values'][$region][$month]['rain'] = $rain;
      //print_r($rain);
      //print_r($temp);
      //print_r($month);
      # code...
    }
    # code...
  }
  $values = array();
  $values['temp'] = array();
  $values['temp']['April'] = array();
  $values['temp']['May'] = array();
  $values['temp']['June'] = array();
  $values['temp']['September'] = array();
  $values['temp']['October'] = array();

  $values['rain'] = array();
  $values['rain']['April'] = array();
  $values['rain']['May'] = array();
  $values['rain']['June'] = array();
  $values['rain']['September'] = array();
  $values['rain']['October'] = array();
  foreach ($data['values'] as $key => $value) {
    foreach ($value as $key2 => $value2) {
      $values['temp'][$key2][$key] = $value2['temp'];
      $values['rain'][$key2][$key] = $value2['rain'];
    }
  }

?>
<ul class="tabs">
    <li>
        <input type="radio" name="tabs" id="tab1" checked />
        <label for="tab1">Квітень</label>
        <div id="tab-content1" class="tab-content">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="left_temp">
            <?php
            $temp_data = yield_get_colored_array($values['temp']['April'], 'temp');
            $map = create_small_svg_ukraine_map($temp_data);
            print $map;
          ?>
          </div>
          <div class="right-rain">
            <?php
            $rain_data = yield_get_colored_array($values['rain']['April'], 'rain');
            $map = create_small_svg_ukraine_map($rain_data);
            print $map;
          ?>
          </div>
        </div>

    </li>

    <li>
        <input type="radio" name="tabs" id="tab2" />
        <label for="tab2">Травень</label>
        <div id="tab-content2" class="tab-content">
          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla?</p>
          <div class="left_temp">
            <?php
            $temp_data = yield_get_colored_array($values['temp']['May'], 'temp');
            $map = create_small_svg_ukraine_map($temp_data);
            print $map;
          ?>
          </div>
          <div class="right-rain">
            <?php
            $rain_data = yield_get_colored_array($values['rain']['May'], 'rain');
            $map = create_small_svg_ukraine_map($rain_data);
            print $map;
          ?>
          </div>
        </div>
    </li>
    <li>
        <input type="radio" name="tabs" id="tab3" />
        <label for="tab3">Червень</label>
        <div id="tab-content3" class="tab-content">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="left_temp">
            <?php
            $temp_data = yield_get_colored_array($values['temp']['June'], 'temp');
            $map = create_small_svg_ukraine_map($temp_data);
            print $map;
          ?>
          </div>
          <div class="right-rain">
            <?php
            $rain_data = yield_get_colored_array($values['rain']['June'], 'rain');
            $map = create_small_svg_ukraine_map($rain_data);
            print $map;
          ?>
          </div>
        </div>
    </li>
    <li>
        <input type="radio" name="tabs" id="tab4" />
        <label for="tab4">Вересень</label>
        <div id="tab-content4" class="tab-content">
          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla?</p>
          <div class="left_temp">
            <?php
            $temp_data = yield_get_colored_array($values['temp']['September'], 'temp');
            $map = create_small_svg_ukraine_map($temp_data);
            print $map;
          ?>
          </div>
          <div class="right-rain">
            <?php
            $rain_data = yield_get_colored_array($values['rain']['September'], 'rain');
            $map = create_small_svg_ukraine_map($rain_data);
            print $map;
          ?>
          </div>
        </div>
    </li>
    <li>
        <input type="radio" name="tabs" id="tab5" />
        <label for="tab5">Жовтень</label>
        <div id="tab-content5" class="tab-content">
           <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="left_temp">
            <?php
            $temp_data = yield_get_colored_array($values['temp']['October'], 'temp');
            $map = create_small_svg_ukraine_map($temp_data);
            print $map;
          ?>
          </div>
          <div class="right-rain">
            <?php
            $rain_data = yield_get_colored_array($values['rain']['October'], 'rain');
            $map = create_small_svg_ukraine_map($rain_data);
            print $map;
          ?>
          </div>
        </div>
    </li>
</ul>
