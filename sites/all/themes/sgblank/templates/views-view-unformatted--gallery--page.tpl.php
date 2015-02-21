<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php if (pop_filter_geoip()): ?>
  <?php print render(node_view(node_load(2802), 'full')); ?>
<?php else: ?>

	<?php
		$block = block_load('block', '60');
		$tmp = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($tmp);
		print $output;
	?>

  <?php foreach ($rows as $id => $row): ?>
    <?php $row = trim($row); ?>
    <?php if (empty($row)) {continue;} ?>
    <div class="<?php print $classes_array[$id]; ?>">
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
