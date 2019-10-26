jQuery( document ).ready( function($) {

	// Linked button
	$( '.bstone-linked' ).on( 'click', function() {
		
		// Set up variables
		var $this = $( this );
		
		// Remove linked class
		$this.parent().parents( '.dimension-nr-wrap' ).prevAll().slice(0,4).find( 'input' ).removeClass( 'linked' ).attr( 'data-element', '' );
		
		// Remove class
		$this.parents( '.link-dimensions' ).removeClass( 'unlinked' );
		$this.parents( '.link-dimensions' ).addClass( 'linked' );

	} );
	
	// Unlinked button
	$( '.bstone-unlinked' ).on( 'click', function() {

		// Set up variables
		var $this 		= $( this ),
			$element 	= $this.data( 'element' );
		
		// Add linked class
		$this.parent().parents( '.dimension-nr-wrap' ).prevAll().slice(0,4).find( 'input' ).addClass( 'linked' ).attr( 'data-element', $element );
		
		// Add class
		$this.parents( '.link-dimensions' ).addClass( 'unlinked' );
		$this.parents( '.link-dimensions' ).removeClass( 'linked' );

	} );
	
	// Values linked inputs
	$( '.dimension-nr-wrap' ).on( 'input', '.linked', function() {

		var $data 	= $( this ).attr( 'data-element' ),
			$val 	= $( this ).val();

		$( '.linked[ data-element="' + $data + '" ]' ).each( function( key, value ) {
			$( this ).val( $val ).change();
		} );

	} );

} );