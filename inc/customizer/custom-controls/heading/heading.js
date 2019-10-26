/**
 * Scripts within the customizer controls window.
 *
 * Bstone Heading Script
 */
( function( $ ) {

	wp.customize.bind( 'ready', function() {

        $( ".bstone-customizer-heading.heading-close" ).each(function() {
            $( this ).parent( 'li' ).addClass( 'bstone-heading-container' );

            var items  = $( this ).children( 'button' ).attr( 'data-items' );
            var status = $( this ).children( 'button' ).attr( 'data-status' );

            if( items && status != 'open' ) {

                items = items.split(",");

                $.each( items, function( i, item ) {
                    $( '#'+item ).css({
                        'height' : '0px',
                        'overflow' : 'hidden',
                        'margin-bottom' : '0px',
                    });
                });
            }
        });

        $( document ).on( "click", ".bstone-customizer-heading button", function() {
            var items  = $( this ).attr( 'data-items' );
            var status = $( this ).attr( 'data-status' );

            var parent_element = $( this ).parent( ".bstone-customizer-heading" );

            if( 'open' == status ) {

                $( this ).attr( 'data-status', 'close' );
                $( this ).children( 'i' ).removeClass( 'dashicons-arrow-up-alt2' );
                $( this ).children( 'i' ).addClass( 'dashicons-arrow-down-alt2' );

                parent_element.removeClass( 'heading-open' );
                parent_element.addClass( 'heading-close' );

                if( items ) {

                    items = items.split(",");
    
                    $.each( items, function( i, item ) {
                        $( '#'+item ).css({
                            'height' : '0px',
                            'overflow' : 'hidden',
                            'margin-bottom' : '0px',
                        });
                    });
                }

            } else if( 'close' == status ) {

                $( this ).attr( 'data-status', 'open' );
                $( this ).children( 'i' ).removeClass( 'dashicons-arrow-down-alt2' );
                $( this ).children( 'i' ).addClass( 'dashicons-arrow-up-alt2' );

                parent_element.removeClass( 'heading-close' );
                parent_element.addClass( 'heading-open' );

                if( items ) {

                    items = items.split(",");
    
                    $.each( items, function( i, item ) {
                        $( '#'+item ).css({
                            'height' : 'auto',
                            'overflow' : 'visible',
                            'margin-bottom' : '12px',
                        });
                    });
                }

            }

        });

    } );

} )( jQuery );