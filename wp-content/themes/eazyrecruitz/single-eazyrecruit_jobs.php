<?php get_header(); exit( 'sss' );
$data    = \EAZYRECRUITZ\Includes\Classes\Common::instance()->data( 'single-eazyrecruitz_jobs' )->get();
do_action( 'eazyrecruitz_banner', $data );
?>

<?php while ( have_posts() ) : the_post();
	$location = get_post_meta( get_the_id(), 'location', true );
	$salry = get_post_meta( get_the_id(), 'salry', true );
	$exp = get_post_meta( get_the_id(), 'exp', true );
	$job = get_post_meta( get_the_id(), 'job', true );
	$term_list = wp_get_post_terms(get_the_id(), 'jobs_cat', array("fields" => "names"));
	$gmt_timestamp = get_post_time('U', true);
?>
<!-- job-details -->
<section class="job-details">
    <div class="auto-container">
        <div class="row clearfix">
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
                                <li>
                                    <span>Save this job</span>
                                    <a href="job-details.html"><i class="flaticon-bookmark"></i></a>
                                </li>
                                <li>
                                    <span>Upload File</span>
                                    <a href="job-details.html"><i class="flaticon-cloud-computing"></i></a>
                                </li>
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
            
        </div>
    </div>
</section>
<!-- job-details end -->
<?php endwhile; ?>

<?php
get_footer();
