<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="leftcol">
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php 
  if($field->class=="field-project-status") :
  	echo "</div><div class='rightcol'>";
  endif; 
  if($field->class=="nothing") :
  	$budget_allocated = $fields['field_budget']->content; 
  	$budget_dispersed = $fields['field_budget_dispersed']->content;
  	$budget_remaining = $budget_allocated - $budget_dispersed; ?>
    <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
		<div id="pie-chart-container" style="margin: 0 auto"></div>
		<div class="chart-key">
			<span class="key-pending"></span><span class="key-text">Pending Budget</span><span class="key-dispersed"></span><span class="key-text">Dispersed Budget</span>
		</div>
		  <script>
			jQuery(function () {
			    var chart;
			    
			    jQuery(document).ready(function () {
			    	
			    	// Build the chart
			        jQuery('#pie-chart-container').highcharts({
			            credits: {
			            	enabled: false
			            },
			            chart: {
			                plotBackgroundColor: null,
			                plotBorderWidth: null,
			                plotShadow: false
			            },
			            title: {
			                text: 'Browser market shares at a specific website, 2014'
			            },
			            tooltip: {
			        	    pointFormat: '{point.name}: <b>{point.y}</b>',
			        	    headerFormat: ''
			            },
			            plotOptions: {
			                pie: {
			                    allowPointSelect: true,
			                    cursor: 'pointer',
			                    dataLabels: {
			                        enabled: false
			                    },
			                    showInLegend: true
			                }
			            },
			            series: [{
			                type: 'pie',
			                name: 'Browser share',
			                data: [
			                    ['Dispersed Budget',   <?php echo $budget_dispersed; ?>],
			                    ['Pending Budget',      <?php echo $budget_remaining; ?>],
			                ]
			            }]
			        });
			    });
			  });
		    </script>
		<?php print $field->wrapper_suffix; ?>
	    <?php else: ?>
			<?php print $field->wrapper_prefix; ?>
		    <?php print $field->label_html; ?>
		    <?php print $field->content; ?>
			<?php print $field->wrapper_suffix; ?>
	<?php endif; ?>
<?php endforeach; ?>
</div>