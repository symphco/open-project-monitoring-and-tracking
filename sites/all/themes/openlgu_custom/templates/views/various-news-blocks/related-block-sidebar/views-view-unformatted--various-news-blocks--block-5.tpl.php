<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($rows as $id => $row): ?>
  <div class="news-meta-box">
    	<?php print $row;?>
  </div>
<?php endforeach; ?>
