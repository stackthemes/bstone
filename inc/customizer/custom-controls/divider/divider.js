/**
 * Scripts within the customizer controls window.
 *
 * Bstone Heading Script
 */

wp.customize.bind( 'ready', function() {
  
    jQuery( ".customize-control-bst-divider .customize-control-caption" ).each(function() {

      var items  = jQuery( this ).children( 'button' ).attr( 'data-items' );
      var status = jQuery( this ).children( 'button' ).attr( 'data-status' );
      
      if( items && status !== 'open' ) {

          items = items.split(",");

          jQuery.each( items, function( i, item ) {
            
              jQuery( '#'+item ).css({
                  'height' : '0px',
                  'overflow' : 'hidden',
                  'margin-bottom' : '0px',
              });
          });
      }
    });

    jQuery( document ).on( "click", ".customize-control-bst-divider .customize-control-caption", function() {

      var items  = jQuery( this ).children( 'button' ).attr( 'data-items' );
      var status = jQuery( this ).children( 'button' ).attr( 'data-status' );
      var parent_element = jQuery( this );

      var button_element = jQuery( this ).children( 'button' );

      if( 'open' == status ) {

        button_element.attr( 'data-status', 'close' );
        button_element.children( 'i' ).removeClass( 'dashicons-arrow-up-alt2' );
        button_element.children( 'i' ).addClass( 'dashicons-arrow-down-alt2' );

        parent_element.removeClass( 'divider-open' );
        parent_element.addClass( 'divider-close' );

        if( items ) {

          items = items.split(",");

          jQuery.each( items, function( i, item ) {
            jQuery( '#'+item ).css({
                  'height' : '0px',
                  'overflow' : 'hidden',
                  'margin-bottom' : '0px',
              });
          });
      }

      } else {

        button_element.attr( 'data-status', 'open' );
        button_element.children( 'i' ).removeClass( 'dashicons-arrow-down-alt2' );
        button_element.children( 'i' ).addClass( 'dashicons-arrow-up-alt2' );

        parent_element.removeClass( 'divider-close' );
        parent_element.addClass( 'divider-open' );

        if( items ) {

            items = items.split(",");

            jQuery.each( items, function( i, item ) {
              jQuery( '#'+item ).css({
                    'height' : 'auto',
                    'overflow' : 'visible',
                    'margin-bottom' : '12px',
                });
            });
        }

      }

    });

});