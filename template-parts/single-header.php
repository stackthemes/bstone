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

if( class_exists( 'WooCommerce' ) ) {

    if ( is_archive() && ! is_shop() && ! is_product_taxonomy() ) {
        if( false == bstone_options( 'enable-title-area-archive' ) ) {
            return;
        }
    }

    if ( is_singular( 'page' ) && ! is_checkout() && ! is_cart() && ! is_account_page() ) {
        if( false == bstone_options( 'enable-title-area-page' ) ) {
            return;
        }
    }

} else {

    if ( is_archive() ) {
        if( false == bstone_options( 'enable-title-area-archive' ) ) {
            return;
        }
    }

    if ( ( is_singular( 'page' ) ) ) {
        if( false == bstone_options( 'enable-title-area-page' ) ) {
            return;
        }
    }

}

if ( ( is_home() ) ) {
    if( false == bstone_options( 'enable-title-area-frontpage' ) ) {
        return;
    }
}

if ( ( is_singular( 'post' ) ) ) {
    if( false == bstone_options( 'enable-title-area-single' ) ) {
        return;
    }
}

if ( ( is_search() ) ) {
    if( false == bstone_options( 'enable-title-area-search' ) ) {
        return;
    }
}

if ( ( is_404() ) ) {
    if( false == bstone_options( 'enable-title-area-notfound' ) ) {
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
					if( class_exists( 'WooCommerce' ) ) {

                        if( is_shop() ) {
                            echo '<h1 itemprop="headline">' . woocommerce_page_title( false ) . '</h1>';
                        } else {
                            echo '<h1 itemprop="headline">' . wp_kses_post( bstone_single_title() ) . '</h1>';
                        }                        

                    } else {
                        echo '<h1 itemprop="headline">' . wp_kses_post( bstone_single_title() ) . '</h1>';
                    }
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