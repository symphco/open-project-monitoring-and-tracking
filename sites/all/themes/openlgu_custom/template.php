<?php
function openlgu_custom_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
  	if ($vars['node']->type == 'openlgu_project') {
	  	$vars['theme_hook_suggestions'][] = 'page__node__project';
	  	
  	}
  }
  if (module_exists('path')) {
	  $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
	  if($alias == "projects-overview" || $alias == "projects" || $alias == "map") {
	  	$vars['theme_hook_suggestions'][] = 'page__projects-overview';
	  }
  }
  
  // Set up variables for dashboard submenu
  $vocabulary = taxonomy_vocabulary_machine_name_load('projects');
  $terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
  // print_r($terms);
  $vars['dashboard_submenu'] = array();
  $key = 0;
  foreach ($terms as $term) :
  	$vars['dashboard_submenu'][$key]['name'] = $term->name;
  	$vars['dashboard_submenu'][$key]['path'] = $term->tid;
  	$key++;
  endforeach;
}


function openlgu_custom_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    // $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

// Editing "Project Type" section of Exposed form on Projects page 
function openlgu_custom_form_views_exposed_form_alter(&$form, &$form_state, $form_id) {
    if (isset($form['field_project_type_uacs_tid']['#options']) && is_array($form['field_project_type_uacs_tid']['#options'])) {
	asort($form['field_project_type_uacs_tid']['#options']);
	foreach($form['field_project_type_uacs_tid']['#options'] as $key => $option) {
		if($key == "5380" || $key == "5387") {
			 unset($form['field_project_type_uacs_tid']['#options'][$key]);
		} else {
			$term_info = taxonomy_get_term_by_name($option,"project_type_by_uacs");
			foreach ($term_info as $term) {
				$form['field_project_type_uacs_tid']['#options'][$key] = $term->field_project_type_label['und'][0]['value'];
			}
		}
	}
    }
}

?>
