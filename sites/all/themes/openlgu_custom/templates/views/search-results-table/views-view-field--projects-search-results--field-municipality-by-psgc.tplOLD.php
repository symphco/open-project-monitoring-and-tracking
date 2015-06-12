<?php 
		$tid = $output; 
		print $tid;
		$term_obj = taxonomy_term_load($tid);
		print_r($term_obj);
		$prov_obj = taxonomy_term_load($term_obj->field_province['und'][0]['tid']);
		$region_obj = taxonomy_term_load($term_obj->field_region['und'][0]['tid']);
	?>
<?php print $term_obj->name; ?>, <?php print $prov_obj->name; ?>, <?php print $region_obj->name; ?>

