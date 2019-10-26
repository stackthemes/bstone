<?php
/**
 * Template for 404
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2019, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

?>
<div class="bst-404-layout-1">
    
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bstone' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <div class="page-sub-title">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bstone' ); ?></p>
        </div>

        <div class="bst-404-search">
        <?php
            get_search_form();
        ?>
        </div>

    </div><!-- .page-content -->
</div>