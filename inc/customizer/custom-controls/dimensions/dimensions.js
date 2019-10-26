wp.customize.controlConstructor['bstone-dimensions'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		control.container.on( 'change keyup paste', '.dimension-desktop_top', function() {
			control.settings['desktop_top'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-desktop_right', function() {
			control.settings['desktop_right'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-desktop_bottom', function() {
			control.settings['desktop_bottom'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-desktop_left', function() {
			control.settings['desktop_left'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-tablet_top', function() {
			control.settings['tablet_top'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-tablet_right', function() {
			control.settings['tablet_right'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-tablet_bottom', function() {
			control.settings['tablet_bottom'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-tablet_left', function() {
			control.settings['tablet_left'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-mobile_top', function() {
			control.settings['mobile_top'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-mobile_right', function() {
			control.settings['mobile_right'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-mobile_bottom', function() {
			control.settings['mobile_bottom'].set( jQuery( this ).val() );
		} );

		control.container.on( 'change keyup paste', '.dimension-mobile_left', function() {
			control.settings['mobile_left'].set( jQuery( this ).val() );
		} );
	}

});

jQuery( document ).ready( function($) {

	// Linked button
	$( '.bstone-linked' ).on( 'click', function() {
		
		// Set up variables
		var $this = $( this );
		
		// Remove linked class
		$this.parent().parent( '.dimension-wrap' ).prevAll().slice(0,4).find( 'input' ).removeClass( 'linked' ).attr( 'data-element', '' );
		
		// Remove class
		$this.parent( '.link-dimensions' ).removeClass( 'unlinked' );

	} );
	
	// Unlinked button
	$( '.bstone-unlinked' ).on( 'click', function() {

		// Set up variables
		var $this 		= $( this ),
			$element 	= $this.data( 'element' );
		
		// Add linked class
		$this.parent().parent( '.dimension-wrap' ).prevAll().slice(0,4).find( 'input' ).addClass( 'linked' ).attr( 'data-element', $element );
		
		// Add class
		$this.parent( '.link-dimensions' ).addClass( 'unlinked' );

	} );
	
	// Values linked inputs
	$( '.dimension-wrap' ).on( 'input', '.linked', function() {

		var $data 	= $( this ).attr( 'data-element' ),
			$val 	= $( this ).val();

		$( '.linked[ data-element="' + $data + '" ]' ).each( function( key, value ) {
			$( this ).val( $val ).change();
		} );

	} );

} );

jQuery(document).ready(function(e){e(".customize-control .responsive-switchers button").on("click",function(s){var t=e(this),o=e(".responsive-switchers"),r=e(s.currentTarget).data("device"),i=e(".customize-control.has-switchers"),a=e(".wp-full-overlay"),c=e(".wp-full-overlay-footer .devices");o.find("button").removeClass("active"),o.find("button.preview-"+r).addClass("active"),i.find(".control-wrap").removeClass("active"),i.find(".control-wrap."+r).addClass("active"),i.removeClass("control-device-desktop control-device-tablet control-device-mobile").addClass("control-device-"+r),a.removeClass("preview-desktop preview-tablet preview-mobile").addClass("preview-"+r),c.find("button").removeClass("active").attr("aria-pressed",!1),c.find("button.preview-"+r).addClass("active").attr("aria-pressed",!0),t.hasClass("preview-desktop")&&i.toggleClass("responsive-switchers-open")}),e(".wp-full-overlay-footer .devices button").on("click",function(s){var t=e(this),o=e(".customize-control.has-switchers .responsive-switchers"),r=e(s.currentTarget).data("device"),i=e(".customize-control.has-switchers");o.find("button").removeClass("active"),o.find("button.preview-"+r).addClass("active"),i.find(".control-wrap").removeClass("active"),i.find(".control-wrap."+r).addClass("active"),i.removeClass("control-device-desktop control-device-tablet control-device-mobile").addClass("control-device-"+r),t.hasClass("preview-desktop")?i.removeClass("responsive-switchers-open"):i.addClass("responsive-switchers-open")})});