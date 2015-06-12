<?php 
	$output = str_replace("<ul>","<ul id='popup-slider'>",$output);
	$output = str_replace("</ul>","</ul><div class='arrows'><a href='javascript:void(0)' class='prev fresh'><span>prev</span></a><a href='javascript:void(0)' class='next fresh'><span>next</span></a></div><ul id='popup-slider'>",$output);
	
	$location = strpos($output,"<span class='project-type'>");
	$location = $location+27;
	$status_code = substr($output,$location,2);

	$status_code_text = openlgu_tweaks_get_status_text($status_code);
	
	$replace = "<span class='project-type'>" . $status_code . "</span>";
	$replace_with = "<span class='project-type project-type-$status_code'>" . $status_code_text . "</span>";
	
	$output = str_replace($replace,$replace_with,$output);
	
	print $output; 
?>

