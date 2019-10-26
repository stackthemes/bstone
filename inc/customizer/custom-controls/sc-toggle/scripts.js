jQuery( document ).ready( function( $ ) {
	
	$( document ).on( 'click', '.sc-toggle', function(e) {
		var $input = $(this).find('.sc-toggle-value');
		var $bullet = $(this).find('.sc-toggle-bullet');
		if ( $input.val() === 'true' ) {
			$(this).removeClass('sc-toggle-active');
			$input.val('false');
		} else {
			$(this).addClass('sc-toggle-active');
			$input.val('true');
		}
		$input.trigger('change');  // Magic to remind Custmizer this has changed, So don't forget to save it!
	});

	// Load and Display the values on the fields
	$('.sc-toggle').on('sc_load_value', function() {
		var $input = $(this).find('.sc-toggle-value');
		var $bullet = $(this).find('.sc-toggle-bullet');
		if ( $input.val() === 'true' ) {
			$(this).addClass('sc-toggle-active');
		} else {
			$(this).removeClass('sc-toggle-active');
		}
	});

	$('.sc-toggle').trigger('sc_load_value');

});