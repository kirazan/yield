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
<?php print ($node->title); ?>
<?php
  $maps = get_mounth_maps_by_year($year);
  print $maps;
?>
  