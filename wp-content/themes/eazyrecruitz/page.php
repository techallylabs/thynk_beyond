<?php
/**
 * Default Template Main File.
 *
 * @package EAZYRECRUITZ
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data  = \EAZYRECRUITZ\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
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
                        
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'eazyrecruitz' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                    </div>
            	</div>
            </div>
            <?php
            if ( $layout == 'right' ) {
                $data->set('sidebar', 'default-sidebar');
                do_action( 'eazyrecruitz_sidebar', $data );
            }
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
