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
?>

<?php do_action( 'bstone_single_header_before' ); ?>

<header>

    <?php do_action( 'bstone_single_header_top' ); ?>

    <div class="st-container clear page-header-inner">

        <h1><?php echo wp_kses_post( bstone_single_title() ); ?></h1>

    </div>

    <?php do_action( 'bstone_single_header_bottom' ); ?>

</header>

<?php do_action( 'bstone_single_header_after' ); ?>