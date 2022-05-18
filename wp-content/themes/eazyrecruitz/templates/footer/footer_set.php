<?php
/**
 * Footer Template  File
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

$options = eazyrecruitz_WSH()->option();

$bg_img    = $options->get( 'footer_bg_img' );
$bg_img    = eazyrecruitz_set( $bg_img, 'url', EAZYRECRUITZ_URI . 'assets/images/shape/pattern-11.png' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>

    <!-- main-footer -->
    <footer class="main-footer bg-color-1">
        <div class="pattern-layer" style="background-image: url(<?php echo esc_url($bg_img);?>);"></div>
        <div class="auto-container">
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
            <div class="footer-top">
                <div class="widget-section">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="footer-subscribe">
                <div class="text centred"><h3><?php echo wp_kses( $options->get( 'newsletter_title_v1'), $allowed_html ); ?></h3></div>
                <div class="subscribe-form">
                    <?php echo do_shortcode( $options->get( 'newsletter_form_id_v1'), $allowed_html ); ?>
                </div>
            </div>
            <div class="footer-bottom clearfix">
                <div class="copyright pull-left"><p><?php echo wp_kses( $options->get( 'copyright_text', '&copy; 2020 <a href="#">Eazy Recruitz</a>, All Rights Reserved.' ), $allowed_html ); ?></p></div>
                <?php if($options->get( 'footer_menu' )):?>
                <ul class="footer-nav pull-right clearfix">
                    <?php echo wp_kses( $options->get( 'footer_menu'), $allowed_html ); ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html"><i class="flaticon-up-arrow-1"></i><?php esc_html_e('Top', 'eazyrecruitz'); ?></button>
</div>