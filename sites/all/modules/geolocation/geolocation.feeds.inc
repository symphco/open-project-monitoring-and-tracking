<?php
/**
 * @file
 * Provides integration with Feeds module (http://drupal.org/project/feeds)
 */
/**
 * Implements hook_feeds_node_processor_targets_alter().
 */
function geolocation_feeds_processor_targets_alter(&$targets, $entity_type,
  $bundle_name) {
    foreach (field_info_instances($entity_type, $bundle_name) as
      $name => $instance) {
    $info = field_info_field($name);
    if ($info['type'] == 'geolocation_latlng') {
      $targets[$info['field_name'] . ':lat'] = array(
        'name' => t($instance['label'] . ' Latitude'),
        'callback' => 'geolocation_set_target_simple',
        'real_target' => $info['field_name'],
      );
      $targets[$info['field_name'] . ':lng'] = array(
        'name' => t($instance['label'] . ' Longitude'),
        'callback' => 'geolocation_set_target_simple',
        'real_target' => $info['field_name'],
      );
    }
  }
}

/**
 * Example callback specified in hook_feeds_processor_targets_alter().
 *
 * @param $source
 *   Field mapper source settings.
 * @param $entity
 *   An entity object, for instance a node object.
 * @param $target
 *   A string identifying the target on the node.
 * @param $values
 *   The values to populate the target with.
 *
 */
function geolocation_set_target_simple($source, $entity, $target, $values) {
  list($field_name, $sub_field) = explode(':', $target, 2);

  // Handle non-multiple value fields.
  if (!is_array($values)) {
    $values = array($values);
  }

  // If the field is already set on the given entity, update the existing value
  // array. Otherwise start with a fresh field value array.
  $field = isset($entity->$field_name) ? $entity->$field_name : array();

  // Loop over the field values array...
  foreach ($values as $delta => $value) {
    $field[LANGUAGE_NONE][$delta][$sub_field] = $value;
  }

  $entity->$field_name = $field;
}
