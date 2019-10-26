<?php
/**
 * Displays the post readmore link
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$read_mor_text = bstone_options( 'blog-read-more-text' );
?>


<div class="blog-entry-readmore clear">
    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $read_mor_text ); ?>">
      <?php echo esc_html( $read_mor_text ); ?>
	  <?php if( '' != bstone_options('blog-read-more-icon') ) { ?><i class="<?php echo esc_attr( bstone_options('blog-read-more-icon') ); ?>"></i><?php } ?>
	</a>
</div><!-- .blog-entry-readmore -->