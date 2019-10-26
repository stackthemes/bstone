<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bstone
 */

?>

<section class="no-results not-found">
	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
			<?php
				printf(
					wp_kses(
						/* translators: 1: link to new post */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bstone' ), array(
							'a' => array(
								'href' => array(),
							),
						)
					), esc_url( admin_url( 'post-new.php' ) )
				);
			?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php echo esc_html( bstone_default_strings( 'string-search-nothing-found-message', false ) ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php echo esc_html( bstone_default_strings( 'string-content-nothing-found-message', false ) ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
