jQuery(document).ready(function(){
	
	jQuery('#edit-field-imp-physical-und-0-value').on('input', function() {
		var val = jQuery("#edit-field-imp-physical-und-0-value").val();
		if(val == '100') {
			jQuery("#edit-field-physical-complete-und-1").attr('checked','checked');
		}
	});

	jQuery('#edit-field-imp-financial-und-0-value').on('input', function() {
		var val = jQuery("#edit-field-imp-financial-und-0-value").val();
		if(val == '100') {
			jQuery("#edit-field-financial-complete-und-1").attr('checked','checked');
		}
	});

});



// Narrow Down Refine by Municipality on OpenLGU Project Node Form */
jQuery(document).ready(function(){
	// Append extra selects to normal municipality filter
	jQuery("#openlgu-project-node-form #edit-field-municipality-by-psgc").prepend("<div class='form-item lgu-tweaks-module-add'><label>Narrow down Municipality</label><div class='select-region'><option value='select'>Select Region</option><option> I</option><option> II</option><option> III</option><option> IV-A</option><option> IV-B</option><option> V</option><option> VI</option><option> VII</option><option> VIII</option><option> IX</option><option> X</option><option> XI</option><option> XII</option><option> XIII</option><option></option></select></div><div class='select-province'><select name='select-province'><option disabled>Select Province</option></select></div><div class='select-municipality'><select name='select-municipality'><option disabled>Select Municipality</option></select></div></div>");
	
	jQuery("select[name=select-region]").change(function(){
	
		// get the selected region value & label
		var selectedRegionValue = jQuery(this).val();
		var selectedRegionLabel = jQuery("select[name=select-region] option[value="+selectedRegionValue+"]").text();
		
		// set the Region filter to the label 
		jQuery("input#edit-field-region-tid").val(selectedRegionLabel);
		
		// get the Regions from the database and build them into the subsequent dropdown.
		jQuery.ajax({
			url: '/ajax/get_provinces?region='+selectedRegionValue,
			success: function(data) {
				jQuery("select[name=select-province]").html("<option>Select Province</option>"+data);
				jQuery(".views-widget-filter-field_municipality_by_psgc_tid select[name=select-province]").trigger("chosen:updated");
			}			
		});
		
	});
	jQuery("select[name=select-province]").change(function(){
	
		// get the selected province value & label
		var selectedProvinceValue = jQuery(this).val();
		var selectedProvinceLabel = jQuery("select[name=select-province] option[value="+selectedProvinceValue+"]").text();
		
		//set the Province filter to the label
		jQuery("input#edit-field-province-tid").val(selectedProvinceLabel);
		
		// get the Municipalities from the database and build them into the subsequent dropdown.
		jQuery.ajax({
			url: '/ajax/get_municipalities?province='+selectedProvinceValue,
			success: function(data) {
				jQuery("select[name=select-municipality]").html("<option>Select Municipality</option>"+data);
				jQuery(".views-widget-filter-field_municipality_by_psgc_tid select[name=select-municipality]").trigger("chosen:updated");
			}			
		});
		
		
	});
	jQuery("select[name=select-municipality]").change(function(){
		
		// Get the selected mnunicipality's code
		var selectedMunicipality = jQuery(this).val();
		var firstChar = selectedMunicipality.charAt(0);
		if(firstChar == "0") {
			selectedMunicipality = selectedMunicipality.substr(1); 
		}
		
		// Select the PSGC Code in the dropdown that matches that Municipality
		jQuery("select#edit-field-municipality-by-psgc-und option").filter(function(){
			return jQuery(this).text() == selectedMunicipality;
		}).prop('selected',true);
		
		var psgcTid = jQuery("select#edit-field-municipality-by-psgc-und").val();
		
		// Get the municipality's lat and long
		jQuery.ajax({
			url: '/ajax/get_municipality_lat_long?psgc='+psgcTid,
			success: function(data) {
				var lat = data.split(",")[0];
				var long = data.split(",")[1];
				jQuery("input#edit-field-geolocation-und-0-lat").val(lat);
				jQuery("input#edit-field-geolocation-und-0-lng").val(long);

			}
			
		});
		
	});
	jQuery("select#edit-field-municipality-by-psgc-und").change(function(){

		var psgcTid = jQuery(this).val();
					
		// Get the municipality's lat and long
		jQuery.ajax({
			url: '/ajax/get_municipality_lat_long?psgc='+psgcTid,
			success: function(data) {
				var lat = data.split(",")[0];
				var long = data.split(",")[1];
				jQuery("input#edit-field-geolocation-und-0-lat").val(lat);
				jQuery("input#edit-field-geolocation-und-0-lng").val(long);

			}
			
		});
				
	});
});

// Narrow Down Refine by Municipality on Edit Many Subprojects Page */
jQuery(document).ready(function(){
	// Append extra selects to normal municipality filter
	jQuery("#views-exposed-form-edit-subprojects-with-editablefields-page div.form-item-field-municipality-by-psgc-tid").prepend("<div class='form-item lgu-tweaks-module-add'><label>Narrow down Municipality</label><option value='select'>Select Region</option><option> I</option><option> II</option><option> III</option><option> IV-A</option><option> IV-B</option><option> V</option><option> VI</option><option> VII</option><option> VIII</option><option> IX</option><option> X</option><option> XI</option><option> XII</option><option> XIII</option><option></option></select></div><div class='select-province'><select name='select-province'><option disabled>Select Province</option></select></div><div class='select-municipality'><select name='select-municipality'><option disabled>Select Municipality</option></select></div></div>");
	
	jQuery("select[name=select-region]").change(function(){
	
		// get the selected region value & label
		var selectedRegionValue = jQuery(this).val();
		var selectedRegionLabel = jQuery("select[name=select-region] option[value="+selectedRegionValue+"]").text();
		
		// set the Region filter to the label 
		jQuery("input#edit-field-region-tid").val(selectedRegionLabel);
		
		// get the Regions from the database and build them into the subsequent dropdown.
		jQuery.ajax({
			url: '/ajax/get_provinces?region='+selectedRegionValue,
			success: function(data) {
				jQuery("select[name=select-province]").html("<option>Select Province</option>"+data);
				jQuery(".views-widget-filter-field_municipality_by_psgc_tid select[name=select-province]").trigger("chosen:updated");
			}			
		});
		
	});
	jQuery("select[name=select-province]").change(function(){
	
		// get the selected province value & label
		var selectedProvinceValue = jQuery(this).val();
		var selectedProvinceLabel = jQuery("select[name=select-province] option[value="+selectedProvinceValue+"]").text();
		
		//set the Province filter to the label
		jQuery("input#edit-field-province-tid").val(selectedProvinceLabel);
		
		// get the Municipalities from the database and build them into the subsequent dropdown.
		jQuery.ajax({
			url: '/ajax/get_municipalities?province='+selectedProvinceValue,
			success: function(data) {
				jQuery("select[name=select-municipality]").html("<option>Select Municipality</option>"+data);
				jQuery(".views-widget-filter-field_municipality_by_psgc_tid select[name=select-municipality]").trigger("chosen:updated");
			}			
		});
		
		
	});
	
	jQuery("select[name=select-municipality]").change(function(){
			
		// Get the selected mnunicipality's code
		var selectedMunicipality = jQuery(this).val();
		var firstChar = selectedMunicipality.charAt(0);
		if(firstChar == "0") {
			selectedMunicipality = selectedMunicipality.substr(1); 
		}
				
		jQuery("input#edit-field-municipality-by-psgc-tid").val(selectedMunicipality);
		
		
	});
	
});

/* Open Close Behavior on Edit Many Subproject Page*/

jQuery(document).ready(function(){
	jQuery(".view-edit-subprojects-with-editablefields .views-row").children("div").hide();
	jQuery(".view-edit-subprojects-with-editablefields .views-row div.views-field-title").show();
	jQuery(".view-edit-subprojects-with-editablefields .views-row div.views-field-title").click(function(){
		if(jQuery(this).hasClass("open")) {
			jQuery(this).parent().children("div").fadeToggle();
			jQuery(this).removeClass("open");
			jQuery(this).fadeIn("fast");
		} else {
			jQuery(this).hide();
			jQuery(this).parent().children("div").fadeToggle();
			jQuery(this).addClass("open");
		}
	});
});

