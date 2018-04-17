/**
 * File responsive.js
 *
 * Handles the responsive
 *
 * @package Bstone
 */

	wp.customize.controlConstructor['bst-responsive'] = wp.customize.Control.extend({

		// When we're finished loading continue processing.
		ready: function() {

			'use strict';

			var control = this,
		    value;

			control.astResponsiveInit();
			
			/**
			 * Save on change / keyup / paste
			 */
			this.container.on( 'change keyup paste', 'input.bst-responsive-input, select.bst-responsive-select', function() {

				value = jQuery( this ).val();

				// Update value on change.
				control.updateValue();
			});

			/**
			 * Refresh preview frame on blur
			 */
			this.container.on( 'blur', 'input', function() {

				value = jQuery( this ).val() || '';

				if ( value == '' ) {
					wp.customize.previewer.refresh();
				}

			});

		},

		/**
		 * Updates the sorting list
		 */
		updateValue: function() {

			'use strict';

			var control = this,
		    newValue = {};

		    // Set the spacing container.
			control.responsiveContainer = control.container.find( '.bst-responsive-wrapper' ).first();

			control.responsiveContainer.find( 'input.bst-responsive-input' ).each( function() {
				var responsive_input = jQuery( this ),
				item = responsive_input.data( 'id' ),
				item_value = responsive_input.val();

				newValue[item] = item_value;

			});

			control.responsiveContainer.find( 'select.bst-responsive-select' ).each( function() {
				var responsive_input = jQuery( this ),
				item = responsive_input.data( 'id' ),
				item_value = responsive_input.val();

				newValue[item] = item_value;
			});

			control.setting.set( newValue );
		},

		astResponsiveInit : function() {
			
			'use strict';
			this.container.find( '.bst-responsive-btns button' ).on( 'click', function( event ) {

				var device = jQuery(this).attr('data-device');
				if( 'desktop' == device ) {
					device = 'tablet';
				} else if( 'tablet' == device ) {
					device = 'mobile';
				} else {
					device = 'desktop';
				}

				jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
			});
		},
	});
	
	jQuery(' .wp-full-overlay-footer .devices button ').on('click', function() {

		var device = jQuery(this).attr('data-device');

		jQuery( '.customize-control-bst-responsive .input-wrapper input, .customize-control .bst-responsive-btns > li' ).removeClass( 'active' );
		jQuery( '.customize-control-bst-responsive .input-wrapper input.' + device + ', .customize-control .bst-responsive-btns > li.' + device ).addClass( 'active' );
	});
