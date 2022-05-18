<?php
/**
 * Blog Post Main File.
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \EAZYRECRUITZ\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = eazyrecruitz_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>
<?php while ( have_posts() ) : the_post(); ?>
<!--Page Title-->
<section class="page-title" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
    <div class="pattern-layer" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-35.png);"></div>
    <div class="auto-container">
        <div class="post-box">
            <div class="news-block-one">
                <div class="inner-box">
                    <div class="lower-content">
                        <div class="inner">
                            <?php if( $options->get( 'single_post_date' ) ):?>
                            <span class="post-date"><?php echo get_the_date('d'); ?><br><?php echo get_the_date('M'); ?></span>
                            <?php endif; ?>
							<?php if( has_category() ):?><div class="category"><i class="flaticon-note"></i><p><?php the_category(' '); ?></p></div><?php endif;?>
                            
                            <h2><?php the_title(); ?></h2>
                            
                            <ul class="post-info clearfix">
                                <?php if( $options->get( 'single_post_author' ) ):?>
                                <li>
									<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
										<?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a>
                                </li>
                                <?php endif; ?>
                                
                                <?php if( $options->get( 'single_post_comments' ) ):?>
                                <li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'eazyrecruitz'), true), wp_kses(__('1 Comment' , 'eazyrecruitz'), true), wp_kses(__('% Comments' , 'eazyrecruitz'), true)); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'eazyrecruitz_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
                <div class="blog-details-content">
                	
                    <div class="thm-unit-test">    
                        
                        <div class="inner-box">
                            
							<?php if( has_post_thumbnail() ):?>
                            <figure class="image-box"><?php the_post_thumbnail('eazyrecruitz_1170x600'); ?></figure>
                            <?php endif;?>
                            
                            <div class="text m-b0">
								<?php the_content(); ?>
                                <div class="clearfix"></div>
                                <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'eazyrecruitz'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            </div>
                        </div>
                        
						<?php if( has_tag() || function_exists('bunch_share_us_two')):?>
                        <div class="post-share-option">
                            <?php if( has_tag() ):?>
                            <div class="icon-box"><i class="flaticon-hashtag"></i></div>
                            <ul class="tag-list centred">
                                <?php the_tags( '<li>', '</li><li> ', '</li>' ); ?>
                            </ul>
                            <?php endif;?>
                            
                            <?php if(function_exists('bunch_share_us_two')):?>
                            <div class="social-box">
                                <?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                            </div>
                            <?php endif;?>
                        </div>
                        <?php endif;?>
                        
                        <?php if( $options->get( 'single_post_author_box' ) ):?>
                        <div class="author-box centred">
                            <div class="inner">
                                <div class="icon-layer" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-70.png);"></div>
                                <figure class="signature"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/signature-2.png" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                <figure class="image-box">
                                	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
										<?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                                    <?php endif; ?>
                                </figure>
                                <h3><?php the_author(); ?></h3>
                                <span><?php esc_html_e('View all post:', 'eazyrecruitz'); ?> <a href="<?php the_author_meta( 'url', get_the_author_meta('ID') ); ?>"> <?php the_author_meta( 'url', get_the_author_meta('ID') ); ?></a></span>
                                <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                                
								<?php if( $options->get( 'single_post_author_links' ) ):?>
								<?php $icons = $options->get( 'single_post_author_social_share' );
                                if ( ! empty( $icons ) ) :
                                ?>
                                <ul class="social-links">
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
                                <?php endif; endif;?>
                            </div>
                        </div>
                        <?php endif;?>
                        
                        <?php if((get_previous_post()) || (get_next_post())): ?>
                        <div class="nav-btn-box">
                            <div class="row clearfix">
                                <?php global $post; $prev_post = get_previous_post();
									if (!empty($prev_post)):
								?>
                                <div class="col-lg-6 col-md-6 col-sm-12 btn-column">
                                    <div class="left-btn">
                                        <figure class="image-box"><?php echo get_the_post_thumbnail($prev_post->ID, 'eazyrecruitz_70x70'); ?></figure>
                                        <div class="inner">
                                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="flaticon-left-1"></i><?php esc_html_e('Prev Post', 'eazyrecruitz'); ?></a>
                                            <h5><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo wp_kses(eazyrecruitz_trim( get_the_title($prev_post->ID), 8 ), true); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
            
								<?php global $post; $next_post = get_next_post();
                                    if (!empty($next_post)): 
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-12 btn-column">
                                    <div class="right-btn">
                                        <figure class="image-box"><?php echo get_the_post_thumbnail($next_post->ID, 'eazyrecruitz_70x70'); ?></figure>
                                        <div class="inner">
                                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php esc_html_e('Next Post', 'eazyrecruitz'); ?><i class="flaticon-right-1"></i></a>
                                            <h5><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo wp_kses(eazyrecruitz_trim( get_the_title($next_post->ID), 8 ), true); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif;?>
                        
                        <!--End Single blog Post-->
                        <?php comments_template(); ?>
                    
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
<?php endwhile; ?>
<?php
}
get_footer();
