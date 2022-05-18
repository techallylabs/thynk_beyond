<?php
/**
 * Footer Template  File
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

$options = eazyrecruitz_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>

	<!-- main-footer -->
    <footer class="main-footer style-three bg-color-1">
        <div class="auto-container">
            <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
            <div class="footer-top">
                <div class="widget-section">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="footer-bottom clearfix">
                <div class="copyright pull-left"><p><?php echo wp_kses( $options->get( 'copyright_text_v3', '&copy; 2020 <a href="#">Eazy Recruitz</a>, All Rights Reserved.' ), $allowed_html ); ?></p></div>
                <?php if($options->get( 'footer_menu_3' )):?>
                <ul class="footer-nav pull-right clearfix">
                    <?php echo wp_kses( $options->get( 'footer_menu_3'), $allowed_html ); ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->


    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html"><i class="flaticon-up-arrow-1"></i>Top</button>
</div>