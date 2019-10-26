( function( $ ) {

	$( function() {
		$( '.bst_icon_picker' ).iconpicker().on( 'iconpickerUpdated', function() {
			$( this ).trigger( 'change' );
		} );
	} );

} )( jQuery );