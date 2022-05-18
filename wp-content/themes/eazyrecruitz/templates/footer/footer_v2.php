<?php
/**
 * Footer Template  File
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

$options = eazyrecruitz_WSH()->option();
$footer_logo_img    = $options->get( 'footer_logo_image' );
$footer_logo_img    = eazyrecruitz_set( $footer_logo_img, 'url', EAZYRECRUITZ_URI . 'assets/images/footer-logo.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

	
    <!-- main-footer -->
    <footer class="main-footer style-two bg-color-1">
        <div class="auto-container">
            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
            <div class="footer-top">
                <div class="widget-section">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div>
                </div>
            </div>
            <?php } ?>  
            <div class="footer-bottom clearfix">
                <div class="copyright pull-left">
                    <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo_img);?>" alt="<?php esc_attr_e('Awesome Image', ''); ?>"></a></figure>
                    <p><?php echo wp_kses( $options->get( 'copyright_text_v2', '&copy; 2020 <a href="#">Eazy Recruitz</a>, All Rights Reserved.' ), $allowed_html ); ?></p>
                </div>
                <?php
					$icons = $options->get( 'footer_v2_social_share' );
					if ( ! empty( $icons ) ) :
				?>
                <ul class="social-links pull-right">
				<?php
                    foreach ( $icons as $h_icon ) :
                    $header_social_icons = json_decode( urldecode( eazyrecruitz_set( $h_icon, 'data' ) ) );
                    if ( eazyrecruitz_set( $header_social_icons, 'enable' ) == '' ) {
                        continue;
                    }
                    $icon_class = explode( '-', eazyrecruitz_set( $header_social_icons, 'icon' ) );
                    ?>
                    <li><a href="<?php echo esc_url(eazyrecruitz_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(eazyrecruitz_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(eazyrecruitz_set( $header_social_icons, 'color' )); ?>"><i class="fab <?php echo esc_attr( eazyrecruitz_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                <?php endforeach; ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html"><i class="flaticon-up-arrow-1"></i><?php esc_html_e('Top', 'eazyrecruitz'); ?></button>
</div>