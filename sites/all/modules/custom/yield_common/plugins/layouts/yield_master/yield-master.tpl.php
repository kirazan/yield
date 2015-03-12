<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a very simple "one column" panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['middle']: The only panel in the layout.
 */
?>
<div class="panel-display panel-1col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-panel panel-col">
    <div class="page-wrapper">
      <div class="header"><?php print $content['header']; ?></div>
      <div class="main_content"><?php print $content['main_content']; ?></div>
      <div class="page-buffer"></div>
    </div>
    <div class="footer"><?php print $content['footer']; ?></div>
  </div>
</div>

