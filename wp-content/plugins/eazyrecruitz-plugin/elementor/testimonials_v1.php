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
class Testimonials_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_testimonials_v1';
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
		return esc_html__( 'Testimonials V1', 'eazyrecruitz' );
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
			'testimonials_v1',
			[
				'label' => esc_html__( 'Testimonials V1', 'eazyrecruitz' ),
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
				'default'     => __( 'Testimonials', 'elementor' ),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'eazyrecruitz' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
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
				  'options' => get_testimonials_categories()
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
			'post_type'      => 'eazy_testimonials',
			'posts_per_page' => eazyrecruitz_set( $settings, 'query_number' ),
			'orderby'        => eazyrecruitz_set( $settings, 'query_orderby' ),
			'order'          => eazyrecruitz_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( eazyrecruitz_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = eazyrecruitz_set( $settings, 'query_exclude' );
		}
		if( eazyrecruitz_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = eazyrecruitz_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- testimonial-section -->
        <section class="testimonial-section bg-color-2">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="top-title"><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></span>
                    <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                </div>
                <div class="testimonial-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="border-shap" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/border-1.png);"></div>
                            <figure class="quote-box"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/quote-1.png" alt=""></figure>
                            <div class="author-box">
                                <figure class="author-thumb"><?php the_post_thumbnail('eazyrecruitz_60x60'); ?></figure>
                                <ul class="rating clearfix">
                                    <?php
										$ratting = get_post_meta( get_the_id(), 'testimonial_rating', true ); 
										for ($x = 1; $x <= 5; $x++) {
										if($x <= $ratting) echo '<li><i class="flaticon-star"></i></li>'; else echo '<li><i class="fa fa-star-half-alt"></i></li>'; 
										}
									?>
                                </ul>
                                <h3><?php the_title(); ?> - <span><?php echo (get_post_meta( get_the_id(), 'test_designation', true ));?></span></h3>
                            </div>
                            <div class="text">
                                <p><?php echo eazyrecruitz_trim(get_the_content(), $settings['text_limit']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- testimonial-section end -->
        
        <?php }
		wp_reset_postdata();
	}

}
