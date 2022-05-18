<?php
/**
 * Footer Main File.
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

<div class="clearfix"></div>

	<?php eazyrecruitz_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>

<?php wp_footer(); ?>
</body>
</html>
