<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Eazyrecruitz
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to <a href="%s">Homepage</a>', 'eazyrecruitz'), esc_html(home_url('/')));
$error_page_img    = $options->get( 'error_page_image' );
$error_page_img    = eazyrecruitz_set( $error_page_img, 'url', EAZYRECRUITZ_URI . 'assets/images/icons/error-img.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \EAZYRECRUITZ\Includes\Classes\Common::instance()->data( '404' )->get();
//do_action( 'eazyrecruitz_banner', $data );
$options = eazyrecruitz_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <!-- error-section -->
    <section class="error-section centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 content-column">
                    <div class="error-content">
                        <figure class="image-box"><img src="<?php echo esc_url($error_page_img);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                        <h2><?php echo wp_kses( $options->get( '404-page_title' ), $allowed_html ) ? wp_kses( $options->get( '404-page_title' ), $allowed_html ) : esc_html_e( 'Sorry this page isn’t available', 'eazyrecruitz' ); ?></h2>
                        <p><?php echo wp_kses( $options->get('404-page-text'), $allowed_html ) ? wp_kses($options->get('404-page-text' ), $allowed_html ) : $text; ?></p>
                        <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                        <a href="<?php echo( home_url( '/' ) ); ?>" class="theme-btn-two"><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back To Home', 'eazyrecruitz' ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error-section end -->
   
<?php
}
get_footer(); ?>
