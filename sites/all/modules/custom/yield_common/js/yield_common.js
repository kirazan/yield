(function($, Drupal) {
  Drupal.behaviors.inbo_common = {
    attach: function (context, settings) {
		if( $('#edit-field-category-value-3').attr('checked')) {

        	/*jQuery("#edit-field-price-from-value-3month").prop('disabled', true);
        	jQuery("#edit-field-price-from-value-5month").prop('disabled', true);
        	jQuery("#edit-field-price-from-value-7month").prop('disabled', true);

        	jQuery("#edit-field-billing-period-value-1").prop('disabled', true);
        	jQuery("#edit-field-billing-period-value-2").prop('disabled', true);
        	jQuery("#edit-field-billing-period-value-3").prop('disabled', true);
        	jQuery("#edit-field-billing-period-value-4").prop('disabled', true);

			jQuery("#edit-field-domain-hosted-value-1").prop('disabled', true);
			jQuery("#edit-field-domain-hosted-value-2").prop('disabled', true);
			jQuery("#edit-field-domain-hosted-value-3-10").prop('disabled', true);
        	jQuery("#edit-field-domain-hosted-value-more-than-10").prop('disabled', true);

        	jQuery("#edit-field-disk-space-filter-value-1-5").prop('disabled', true);
        	jQuery("#edit-field-disk-space-filter-value-6-10").prop('disabled', true);
        	jQuery("#edit-field-disk-space-filter-value-10-20").prop('disabled', true);
        	jQuery("#edit-field-disk-space-filter-value-20-and-more").prop('disabled', true);

        	jQuery("#edit-field-bandtwith-filter-value-50-100").prop('disabled', true);
        	jQuery("#edit-field-bandtwith-filter-value-100-400").prop('disabled', true);
        	jQuery("#edit-field-bandtwith-filter-value-400-500").prop('disabled', true);
        	jQuery("#edit-field-bandtwith-filter-value-500-and-more").prop('disabled', true);*/

        	$("#edit-field-price-from-value-wrapper").css("display", "none"); 
        	$("#edit-field-billing-period-value-wrapper").css("display", "none"); 
        	$("#edit-field-domain-hosted-value-wrapper").css("display", "none"); 
			$("#edit-field-disk-space-filter-value-wrapper").css("display", "none"); 
			$("#edit-field-bandtwith-filter-value-wrapper").css("display", "none"); 


        } else {
            jQuery("#edit-field-location-value-1").prop('disabled', false);    
        }
    }
  };
})(jQuery, Drupal);
