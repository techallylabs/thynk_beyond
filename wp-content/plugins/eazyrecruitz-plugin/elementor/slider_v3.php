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
class Slider_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_slider_v3';
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
		return esc_html__( 'Slider V3', 'eazyrecruitz' );
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
			'slider_v3',
			[
				'label' => esc_html__( 'Slider V3', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'slider_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Slide One', 'eazyrecruitz')],
                			['title' => esc_html__('Slide Two', 'eazyrecruitz')],
                			['title' => esc_html__('Slide Three', 'eazyrecruitz')]
            			],
            		'fields' => 
						[
							[
                    			'name' => 'slide_image',
                    			'label' => esc_html__('Slide image', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => ''
                			],
                			[
                    			'name' => 'btn_link',
								'label' => __( 'Button Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
                			
            			],
            	    'title_field' => '{{title}}',
                 ]
        );
		$this->add_control(
              'social_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['social_title' => esc_html__('Fb', 'eazyrecruitz')],
                			['social_title' => esc_html__('Tw', 'eazyrecruitz')],
                			['social_title' => esc_html__('ln', 'eazyrecruitz')]
            			],
            		'fields' => 
						[
							
							[
                    			'name' => 'social_title',
                    			'label' => esc_html__('Social Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
                			
            			],
            	    'title_field' => '{{social_title}}',
                 ]
        );
		$this->add_control(
            'email_address',
            [
                'label'       => __('Email Address', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Email Address', 'eazyrecruitz'),
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
		?>
        
        <!-- banner-section -->
        <section class="banner-section style-three">
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                <?php foreach($settings['slider_info'] as $item):?>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(<?php echo wp_get_attachment_url($item['slide_image']['id']);?>)"></div>
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-26.png);"></div>
                        <div class="pattern-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-27.png);"></div>
                        <div class="pattern-3" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-28.png);"></div>
                        <div class="pattern-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-29.png);"></div>
                        <div class="pattern-5" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-30.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-2 content-column">
                                <div class="content-box">
                                    <h1><?php echo wp_kses($item['title'], $allowed_tags) ;?></h1>
                                    <h2><?php echo wp_kses($item['subtitle'], $allowed_tags) ;?></h2>
                                    <p><?php echo wp_kses($item['text'], $allowed_tags) ;?></p>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($item['btn_link']['url']) ;?>" class="btn-one"><?php echo wp_kses($item['btn_title'], $allowed_tags) ;?></a>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="social-box">
                <ul class="social-links">
                    <li><?php esc_html_e('Follow :', 'Eazyrecruitz'); ?></li>
                    <?php foreach($settings['social_info'] as $item):?>
                    <li><a href="<?php echo esc_url($item['social_link']['url']) ;?>"><?php echo wp_kses($item['social_title'], $allowed_tags) ;?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="mail-box"><a href="mailto:<?php echo esc_url($settings['email_address']) ;?>"><?php echo wp_kses($settings['email_address'], $allowed_tags) ;?></a></div>
        </section>
        <!-- banner-section end -->
        
		<?php 
	}

}
