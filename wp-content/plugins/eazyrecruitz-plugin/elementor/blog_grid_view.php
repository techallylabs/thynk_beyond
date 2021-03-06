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
class Blog_Grid_View extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_blog_grid_view';
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
		return esc_html__( 'Blog Grid View', 'eazyrecruitz' );
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
			'blog_grid_view',
			[
				'label' => esc_html__( 'Blog Grid View', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => eazyrecruitz_get_sidebars(),
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
				  'options' => get_blog_categories()
				]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'eazyrecruitz' ),
				'default'     => __( 'Load More', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'eazyrecruitz' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
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
			'post_type'      => 'post',
			'posts_per_page' => eazyrecruitz_set( $settings, 'query_number' ),
			'orderby'        => eazyrecruitz_set( $settings, 'query_orderby' ),
			'order'          => eazyrecruitz_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( eazyrecruitz_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = eazyrecruitz_set( $settings, 'query_exclude' );
		}
		if( eazyrecruitz_set( $settings, 'query_category' ) ) $args['category_name'] = eazyrecruitz_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-grid-content">
                            <div class="row clearfix">
                                <?php 
									while ( $query->have_posts() ) : $query->the_post(); 
								?>
                                <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('eazyrecruitz_370x490'); ?></a>
                                                <span class="post-date"><?php echo get_the_date('d'); ?><br /><?php echo get_the_date('M'); ?></span>
                                            </figure>
                                            <div class="lower-content">
                                                <div class="inner">
                                                    <div class="category"><i class="flaticon-note"></i><p><?php the_category(' '); ?></p></div>
                                                    <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title();?></a></h3>
                                                    <ul class="post-info clearfix">
                                                        <li><i class="far fa-user"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li>
                                                        <li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses(__('0 Comments', 'eazyrecruitz'), true), wp_kses(__('1 Comment', 'eazyrecruitz'), true), wp_kses(__('% Comments', 'eazyrecruitz'), true)); ?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="more-btn centred"><a href="<?php echo esc_url($settings['btn_link']['url']) ;?>"><?php echo wp_kses($settings['btn_title'], $allowed_tags) ;?></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar">
                            <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
								<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->
        
        <?php }
		wp_reset_postdata();
	}

}
