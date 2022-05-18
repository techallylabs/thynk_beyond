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
class Hr_Problems extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_hr_problems';
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
		return esc_html__( 'HR Problems', 'eazyrecruitz' );
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
			'hr_problems',
			[
				'label' => esc_html__( 'HR Problems', 'eazyrecruitz' ),
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
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Understand Your Needs', 'eazyrecruitz')],
                			['title1' => esc_html__('Find the Perfect Candidate', 'eazyrecruitz')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon_image',
                    			'label' => esc_html__('Icon image', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
                		],
            	    'title_field' => '{{title1}}',
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
				  'options' => get_service_categories()
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
			'post_type'      => 'eazyrecruitz_service',
			'posts_per_page' => eazyrecruitz_set( $settings, 'query_number' ),
			'orderby'        => eazyrecruitz_set( $settings, 'query_orderby' ),
			'order'          => eazyrecruitz_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( eazyrecruitz_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = eazyrecruitz_set( $settings, 'query_exclude' );
		}
		if( eazyrecruitz_set( $settings, 'query_category' ) ) $args['service_cat'] = eazyrecruitz_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		
		{ ?>
		
        <!-- solutions-problems -->
        <section class="solutions-problems">
            <div class="auto-container">
                <div class="upper-box">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                            <div class="title-inner">
                                <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                                <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <?php foreach($settings['features'] as $key => $item):?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 column">
                                        <div class="single-item">
                                            <figure class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                            <h3><?php echo wp_kses($item['title1'], $allowed_tags) ;?></h3>
                                            <p><?php echo wp_kses($item['text1'], $allowed_tags) ;?></p>
                                            <a href="<?php echo esc_url($item['btn_link']['url']) ;?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($item['btn_title'], $allowed_tags) ;?></a>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
				<?php if ( $query->have_posts() ):?>
                <div class="carousel-box">
                    <div class="two-column-carousel owl-carousel owl-theme owl-dot-style-two owl-nav-none">
                        <?php 
							$i = 1;
							while ( $query->have_posts() ) : $query->the_post(); 
							$service_icon_img = get_post_meta( get_the_id(), 'service_icon_image', true );
						?>
                        <div class="single-item">
                            <div class="inner-box">
                                <figure class="image-box"><?php the_post_thumbnail('eazyrecruitz_470x300'); ?></figure>
                                <div class="lower-content">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="side-content">
                                    <div class="content-box">
                                        <span><?php  $i = sprintf('%02d', $i); echo $i; ?>.</span>
                                        <figure class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($service_icon_img['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                    </div>
                                    <div class="overlay-box">
                                        <span><?php  $i = sprintf('%02d', $i); echo $i; ?>.</span>
                                        <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><i class="flaticon-right-arrow-angle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- solutions-problems end -->
        
        <?php endif; }
		wp_reset_postdata();
	}

}
