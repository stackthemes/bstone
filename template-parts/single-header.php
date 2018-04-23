<?php
/**
 * The template for displaying the page header.
 *
 * @package Bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_front_page() && ! is_singular( 'page' ) ) {
    if( false == bstone_options( 'enable-title-area-frontpage' ) ) {
        return;
    }
}
?>

<?php do_action( 'bstone_single_header_before' ); ?>

<?php if ( apply_filters( 'bstone_the_title_enabled', true ) ) { ?>

<header class="bst-title-section">

    <?php do_action( 'bstone_single_header_top' ); ?>

    <div <?php echo bstone_title_section_classes(); ?>>

        <?php
			// Get Title Area Elements
			$title_area_elements = bstone_options( 'page-title-structure' );
			
			foreach ( $title_area_elements as $element ) {
				
				if( 'page-title' == $element ) {
					echo '<h1 itemprop="headline">' . wp_kses_post( bstone_single_title() ) . '</h1>';
				}
				
				if( 'page-breadcrumbs' == $element ) {
					echo bstone_get_breadcrumbs();
				}
			}

		?>

    </div>

    <?php do_action( 'bstone_single_header_bottom' ); ?>

</header>

<?php } ?>

<?php do_action( 'bstone_single_header_after' ); ?>