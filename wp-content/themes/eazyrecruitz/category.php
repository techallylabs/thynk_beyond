<?php
/**
 * Archive Main File.
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \EAZYRECRUITZ\Includes\Classes\Common::instance()->data( 'category' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <?php if ( class_exists( '\Elementor\Plugin' )):?>
		<?php do_action( 'eazyrecruitz_banner', $data );?>
    <?php else:?>
    <!--Page Title-->
    <section class="page-title" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="pattern-layer" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-35.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box centred">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                    <p><?php echo wp_kses( $data->get( 'text' ), true ); ?></p>
                </div>
                <ul class="bread-crumb clearfix">
                    <?php echo eazyrecruitz_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <?php endif;?>
    
    <!--Start blog area-->
    <section class="sidebar-page-container blog-list">
        <div class="auto-container">
            <div class="row clearfix">
                <?php
					if ( $data->get( 'layout' ) == 'left' ) {
						do_action( 'eazyrecruitz_sidebar', $data );
					}
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="blog-list-content">
                        <div class="thm-unit-test">
                        
							<?php
                                while ( have_posts() ) :
                                    the_post();
                                    eazyrecruitz_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        
                        </div>
                    
                        <!--Pagination-->
                        <div class="pagination-wrapper text-center">
                            <?php eazyrecruitz_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                	</div>    
                </div>
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'eazyrecruitz_sidebar', $data );
                    }
                ?>
            </div>
        </div>
    </section> 
    <!--End blog area--> 
	<?php
}
get_footer();
