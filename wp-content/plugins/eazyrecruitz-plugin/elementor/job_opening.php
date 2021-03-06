<?php

namespace EAZYRECRUITZPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Job_Opening extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_job_opening';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Job Opening', 'eazyrecruitz' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'eazyrecruitz' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'job_opening',
			[
				'label' => esc_html__( 'Job Opening', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'elementor' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'elementor' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'elementor' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'eazyrecruitz' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'eazyrecruitz' ),
					'title'      => esc_html__( 'Title', 'eazyrecruitz' ),
					'menu_order' => esc_html__( 'Menu Order', 'eazyrecruitz' ),
					'rand'       => esc_html__( 'Random', 'eazyrecruitz' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'eazyrecruitz' ),
					'ASC'  => esc_html__( 'ASC', 'eazyrecruitz' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'eazyrecruitz'),
				  'options' => get_jobs_categories()
				]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = eazyrecruitz_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-eazyrecruitz' );
		$args = array(
			'post_type'      => 'eazyrecruitz_jobs',
			'posts_per_page' => eazyrecruitz_set( $settings, 'query_number' ),
			'orderby'        => eazyrecruitz_set( $settings, 'query_orderby' ),
			'order'          => eazyrecruitz_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( eazyrecruitz_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = eazyrecruitz_set( $settings, 'query_exclude' );
		}
		if( eazyrecruitz_set( $settings, 'query_category' ) ) $args['jobs_cat'] = eazyrecruitz_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		        
        <!-- findjob-section -->
        <section class="findjob-section">
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                    <p><?php echo wp_kses($settings['text'], $allowed_tags) ;?></p>
                </div>
                <div class="post-jobs">
                    
                    <?php 
						global $post;
						while ( $query->have_posts() ) : $query->the_post(); 
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
                    
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </section>
        <!-- findjob-section end -->
        
        <?php }
		wp_reset_postdata();
	}

}
