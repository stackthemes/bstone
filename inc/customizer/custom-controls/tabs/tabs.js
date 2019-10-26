/**
 * File tabs.js
 *
 * Navigate between sections
 *
 * @package Bstone
 */

	( function( $ ) {

			'use strict';
			
			/* Link to related sections */
			$('body').on( 'click', '.bstone-customizer-tabs li', function( e ) {
				e.preventDefault();
				var focused_section = $(this).attr('data-section');
				if( focused_section && focused_section !== '' ) {
					wp.customize.section( focused_section ).focus();
				}
			});
		
	})( jQuery );