<?php

?>

<?php print $fields['field_project_id']->content; ?> <?php print $fields['title']->content; ?> <?php print $fields['field_agency']->content; ?> <?php $project_type = $fields['field_project_type_uacs']->content; $project_type_text = openlgu_tweaks_get_status_text_clean($project_type); if($project_type_text) { echo "$project_type_text, "; }?> <?php print $fields['field_budget']->content; ?>