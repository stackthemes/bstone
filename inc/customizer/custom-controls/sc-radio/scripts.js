jQuery( document ).ready( function( $ ) {

	// Save the values into hidden field on each change
	$( document ).on( 'click', '.sc-element-radio a', function(e) {
		e.preventDefault();
		$(this).siblings().removeClass('sc-selected');
		$(this).addClass('sc-selected');
		var $radio = $(this).closest('.sc-element-radio');
		var $input = $radio.siblings('.sc-radio-value');
		$input.val($radio.find('.sc-selected').attr('data-value'));
		$input.trigger('change'); // Magic to remind Custmizer this has changed, So don't forget to save it!
	});

	// Load and Display the values on the fields
	$('.sc-element-radio a').on('sc_load_value', function () {
		var radio_val = $(this).closest('.sc-element-radio').siblings('.sc-radio-value').val();
		if ($(this).attr('data-value') === radio_val) {
			$(this).addClass('sc-selected');
		}
	});

    $('.sc-element-radio a').trigger('sc_load_value');
    
    setTimeout( function () {
        jQuery('.sc-element-radio-icon .sc-radio-item img').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');
        
            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');
        
                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }
        
                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');
                
                // Check if the viewport is set, else we gonna set it if we can.
                if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }
        
                // Replace image with new SVG
                $img.replaceWith($svg);
        
            }, 'xml');
        
        });
    }, 3000 );
});