<?php
$options = eazyrecruitz_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );

$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$image_logo3 = $options->get( 'image_normal_logo3' );
$logo_dimension3 = $options->get( 'normal_logo_dimension3' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

	<div class="boxed_wrapper">
        <?php if( $options->get( 'theme_preloader' ) ):?>
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader"><div class="preloader-close"><?php esc_html_e('Preloader Close', 'eazyrecruitz'); ?></div></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>        
            <div class="layer layer-three"><span class="overlay"></span></div>        
        </div>
		<?php endif; ?>
		
        <?php if( $options->get('search_form_icon_v3') ):?>
		<!-- search-popup -->
        <div id="search-popup" class="search-popup">
            <div class="close-search"><i class="flaticon-close"></i></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <?php get_template_part('searchform1')?>
                </div>
            </div>
        </div>
        <!-- search-popup end -->
		<?php endif; ?>

        <!-- main header -->
        <header class="main-header style-three">
            <div class="header-lower">
                <div class="outer-box">
                    <figure class="logo-box"><?php echo eazyrecruitz_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></figure>
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                        'container_class'=>'navbar-collapse collapse navbar-right',
                                        'menu_class'=>'nav navbar-nav',
                                        'fallback_cb'=>false, 
                                        'items_wrap' => '%3$s', 
                                        'container'=>false,
                                        'depth'=>'3',
                                        'walker'=> new Bootstrap_walker()  
                                    ) ); ?>               
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="menu-right-content pull-right clearfix">
                        <?php if( $options->get('search_form_icon_v3') ):?> 
                        <li>
                            <div class="search-btn">
                                <button type="button" class="search-toggler"><i class="flaticon-loupe-1"></i></button>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if( $options->get('appointment_btn_title_v3') ):?>
                        <li>
                            <a href="<?php echo esc_url($options->get('appointment_btn_link_v3'));?>" class="theme-btn-one"><?php echo wp_kses($options->get('appointment_btn_title_v3'), $allowed_html);?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box clearfix">
                    <div class="menu-area pull-left">
                        <figure class="logo-box"><?php echo eazyrecruitz_logo( $logo_type, $image_logo2, $logo_dimension2, $logo_text, $logo_typography ); ?></figure>
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <ul class="menu-right-content pull-right clearfix">
                        <?php if( $options->get('search_form_icon_v3') ):?>
                        <li>
                            <div class="search-btn">
                                <button type="button" class="search-toggler"><i class="flaticon-loupe-1"></i></button>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if( $options->get('appointment_btn_title_v3') ):?>
                        <li>
                            <a href="<?php echo esc_url($options->get('appointment_btn_link_v3'));?>" class="theme-btn-one"><?php echo wp_kses($options->get('appointment_btn_title_v3'), $allowed_html);?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <nav class="menu-box">
                <div class="nav-logo"><?php echo eazyrecruitz_logo( $logo_type, $image_logo3, $logo_dimension3, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <?php if( $options->get('heading_title_v3') ):?><h4><?php echo wp_kses($options->get('heading_title_v3'), $allowed_html);?></h4><?php endif; ?>
                    <ul>
                        <?php if( $options->get('address_v3') ):?><li><?php echo wp_kses($options->get('address_v3'), $allowed_html);?></li><?php endif; ?>
                        <?php if( $options->get('phone_no_v3') ):?><li><a href="tel:<?php echo esc_url($options->get('phone_no_v3'));?>"><?php echo wp_kses($options->get('phone_no_v3'), $allowed_html);?></a></li><?php endif; ?>
                        <?php if( $options->get('email_address_v3') ):?><li><a href="mailto:<?php echo esc_url($options->get('email_address_v3'));?>"><?php echo wp_kses($options->get('email_address_v3'), $allowed_html);?></a></li><?php endif; ?>
                    </ul>
                </div>
                <?php
					$icons = $options->get( 'header_v3_social_share' );
					if ( ! empty( $icons ) ) :
				?>
                <div class="social-links">
                    <ul class="clearfix">
                    <?php
                        foreach ( $icons as $h_icon ) :
                        $header_social_icons = json_decode( urldecode( eazyrecruitz_set( $h_icon, 'data' ) ) );
                        if ( eazyrecruitz_set( $header_social_icons, 'enable' ) == '' ) {
                            continue;
                        }
                        $icon_class = explode( '-', eazyrecruitz_set( $header_social_icons, 'icon' ) );
                        ?>
                        <li><a href="<?php echo esc_url(eazyrecruitz_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(eazyrecruitz_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(eazyrecruitz_set( $header_social_icons, 'color' )); ?>"><span class="fab <?php echo esc_attr( eazyrecruitz_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </nav>
        </div><!-- End Mobile Menu -->