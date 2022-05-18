<?php
/**
 * Blog Post Main File.
 *
 * @package EAZYRECRUITZ
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \EAZYRECRUITZ\Includes\Classes\Common::instance()->data( 'single-eazyrecruitz_jobs' )->get();
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


<!-- job-details -->
<section class="job-details">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php while ( have_posts() ) : the_post();
				$location = get_post_meta( get_the_id(), 'location', true );
				$salry = get_post_meta( get_the_id(), 'salry', true );
				$exp = get_post_meta( get_the_id(), 'exp', true );
				$job = get_post_meta( get_the_id(), 'job', true );
				$web = get_post_meta( get_the_id(), 'web', true );
				$date = get_post_meta( get_the_id(), 'date', true );
				$bookmark = get_post_meta( get_the_id(), 'bookmark', true );
				$upload = get_post_meta( get_the_id(), 'upload', true );
				$term_list = wp_get_post_terms(get_the_id(), 'jobs_cat', array("fields" => "names"));
				$gmt_timestamp = get_post_time('U', true);
			?>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="job-details-content">
                    <div class="upper-box">
                        <div class="inner-box">
                            <?php if( has_post_thumbnail() ):?>
                            <figure class="company-logo"><?php the_post_thumbnail( 'full' );?></figure>
                            <?php endif;?>
                            <div class="inner">
                                <span><?php echo implode( ', ', (array)$term_list );?></span>
                                <h3><?php the_title();?></h3>
                                <?php if( $location ):?>
                                <p><i class="flaticon-place"></i><?php echo wp_kses( $location, true );?></p>
                                <?php endif;?>
                            </div>
                            <ul class="info clearfix">
                                <?php if( $bookmark ):?>
                                <li>
                                    <span><?php esc_html_e( 'Save this job', 'eazyrecruit' );?></span>
                                    <a href="<?php echo esc_url( $bookmark );?>"><i class="flaticon-bookmark"></i></a>
                                </li>
                                <?php endif;?>
                                <?php if( $upload ):?>
                                <li>
                                    <span><?php esc_html_e( 'Upload File', 'eazyrecruit' );?></span>
                                    <a href="<?php echo esc_url( $upload );?>"><i class="flaticon-cloud-computing"></i></a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                    <div class="text">
                    	<?php the_content();?>
                    </div>
                    
					<?php if(function_exists('bunch_share_us_two')):?>
                        <div class="social-box">
                            <?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                        </div>
                    <?php endif;?>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="job-sidebar">
                    <div class="sidebar-widget job-discription">
                        <ul class="list">
                            <?php if( $job ):?>
                            <li>
                                <span><?php esc_html_e( 'Job Number', 'eazyrecruit' );?></span>
                                <p><?php echo wp_kses( $job, true );?></p>
                            </li>
                            <?php endif;?>
                            <?php if( $location ):?>
                            <li>
                                <span><?php esc_html_e( 'Location', 'eazyrecruit' );?></span>
                                <p><?php echo wp_kses( $location, true );?></p>
                            </li>
                            <?php endif;?>
                            
                            <?php if( $web ):?>
                            <li>
                                <span><?php esc_html_e( 'Website', 'eazyrecruit' );?></span>
                                <p><a href="<?php echo esc_url( $web );?>"><?php echo wp_kses( $web, true );?></a></p>
                            </li>
                            <?php endif;?>
                            
                            <?php if( $salry ):?>
                            <li>
                                <span><?php esc_html_e( 'Salary', 'eazyrecruit' );?></span>
                                <p><?php echo wp_kses( $salry, true );?> </p>
                            </li>
                            <?php endif;?>
                            
                            <?php if( $exp ):?>
                            <li>
                                <span><?php esc_html_e( 'EXPERIENCE NEED', 'eazyrecruit' );?></span>
                                <p><?php echo wp_kses( $exp, true );?></p>
                            </li>
                            <?php endif;?>
                            
                            <?php if( $date ):?>
                            <li>
                                <span><?php esc_html_e( 'Apply on or Before', 'eazyrecruit' );?></span>
                                <p><?php echo wp_kses( $date, true );?></p>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            
			<?php if(get_post_meta( get_the_id(), 'show_related_post', true )):?>
            <div class="col-lg-12 col-md-12 col-sm-12 column">
                <div class="related-job">
                    <h2><?php esc_html_e( 'Related Jobs', 'eazyrecruit' );?></h2>
                    
                    <?php
					
						$terms = get_the_terms( $post->ID , 'jobs_cat', 'string');
						$term_ids = wp_list_pluck($terms,'term_id');
						$second_query = new WP_Query( array(
						  'post_type' => 'eazyrecruitz_jobs',
						  'tax_query' => array(
										array(
											'taxonomy' => 'jobs_cat',
											'field' => 'id',
											'terms' => $term_ids,
											'operator'=> 'IN' //Or 'AND' or 'NOT IN'
										 )),
						  'posts_per_page' => 2,
						  'ignore_sticky_posts' => 1,
						  'orderby' => 'rand',
						  'post__not_in'=>array($post->ID)
					   ) );
						
					?>
                    <?php if($second_query->have_posts()): ?>
						<?php while($second_query->have_posts()): $second_query->the_post();
                            global $post;
                            $location = get_post_meta( get_the_id(), 'location', true );
							$salry = get_post_meta( get_the_id(), 'salry', true );
							$exp = get_post_meta( get_the_id(), 'exp', true );
							$job = get_post_meta( get_the_id(), 'job', true );
							$term_list = wp_get_post_terms(get_the_id(), 'jobs_cat', array("fields" => "names"));
							$gmt_timestamp = get_post_time('U', true);
                        ?>
                        
                        <div class="single-job-post">
                            <div class="job-header clearfix">
                                <ul class="info pull-left">
                                    <li class="cat"><?php echo implode( ', ', (array)$term_list );?></li>
                                    <li><i class="flaticon-clock"></i><?php esc_html_e( 'Posted', 'eazyrecruit' );?> <?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . ' ago'; ?></li>
                                </ul>
                                <?php if( $salry ):?>
                                <div class="number pull-right"><p><?php esc_html_e( 'Job Num:', 'eazyrecruit' );?> <?php echo wp_kses( $job, true );?></p></div>
                                <?php endif;?>
                            </div>
                            <div class="job-inner clearfix">
                                <div class="job-title">
                                    <figure class="company-logo"><?php the_post_thumbnail( 'full' );?></figure>
                                    <h3><?php the_title();?></h3>
                                    <?php if( $location ):?>
                                    <p><i class="flaticon-place"></i><?php echo wp_kses( $location, true );?></p>
                                    <?php endif;?>
                                </div>
                                <?php if( $salry ):?>
                                <div class="salary-box">
                                    <span><?php esc_html_e( 'Salary', 'eazyrecruit' );?></span>
                                    <p><?php echo wp_kses( $salry, true );?></p>
                                </div>
                                <?php endif;?>
                                <?php if( $exp ):?>
                                <div class="experience-box">
                                    <span><?php esc_html_e( 'Experience Need', 'eazyrecruit' );?></span>
                                    <p><?php echo wp_kses( $exp, true );?></p>
                                </div>
                                <?php endif;?>
                                <div class="apply-btn">
                                    <a href="<?php echo esc_url( get_permalink( get_the_id() ) );?>"><?php esc_html_e( 'Apply', 'eazyrecruit' );?></a>
                                </div>
                            </div>
                        </div>
                        
                        <?php endwhile;?>
                	<?php endif; wp_reset_postdata();?>
                    
                    
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
<!-- job-details end -->

<?php
}
get_footer();
