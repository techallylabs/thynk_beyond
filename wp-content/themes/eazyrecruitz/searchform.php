<?php
/**
 * Search Form template
 *
 * @package EAZYRECRUITZ
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
        <div class="form-group">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Keyword...', 'eazyrecruitz' ); ?>" required="">
            <button type="submit"><i class="flaticon-loupe-1"></i></button>
        </div>
    </form>
</div>
