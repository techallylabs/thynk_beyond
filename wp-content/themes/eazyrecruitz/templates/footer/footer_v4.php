<?php
/**
 * Footer Template  File
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

$options = eazyrecruitz_WSH()->option();

$bg_img_v4    = $options->get( 'footer_bg_img_v4' );
$bg_img_v4    = eazyrecruitz_set( $bg_img_v4, 'url', EAZYRECRUITZ_URI . 'assets/images/shape/pattern-11.png' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>

	<!-- main-footer -->
    <footer class="main-footer bg-color-1">
        <div class="pattern-layer" style="background-image: url(<?php echo esc_url($bg_img_v4);?>);"></div>
        <div class="auto-container">
            <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
            <div class="footer-top">
                <div class="widget-section">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="footer-subscribe">
                <div class="text centred"><h3><?php echo wp_kses( $options->get( 'newsletter_title_v4'), $allowed_html ); ?></h3></div>
                <div class="subscribe-form">
                    <?php echo do_shortcode( $options->get( 'newsletter_form_id_v4'), $allowed_html ); ?>
                </div>
            </div>
            <div class="footer-bottom clearfix">
                <div class="copyright pull-left"><p><?php echo wp_kses( $options->get( 'copyright_text-v4', '&copy; 2020 <a href="#">Eazy Recruitz</a>, كل الحقوق محفوظة.' ), $allowed_html ); ?></p></div>
                <?php if($options->get( 'footer_menu_v4' )):?>
                <ul class="footer-nav pull-right clearfix">
                    <?php echo wp_kses( $options->get( 'footer_menu_v4'), $allowed_html ); ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->
    
    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html"><i class="flaticon-up-arrow-1"></i>أعلى</button>
</div>