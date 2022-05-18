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
class Touch_With_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_touch_with_us';
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
		return esc_html__( 'Touch With Us', 'eazyrecruitz' );
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
			'touch_with_us',
			[
				'label' => esc_html__( 'Touch With Us', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'contact_image',
				[
				  'label' => __( 'Background Contact Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'pattern_image',
				[
				  'label' => __( 'Background Pattern Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
            'subtitle',
            [
                'label'       => __('Sub Title', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Sub Title', 'eazyrecruitz'),
            ]
        );
		$this->add_control(
            'title',
            [
                'label'       => __('Title', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Title', 'eazyrecruitz'),
            ]
        );
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Location', 'eazyrecruitz')],
                			['title1' => esc_html__('Call or Email', 'eazyrecruitz')],
							['title1' => esc_html__('Office Hrs', 'eazyrecruitz')],
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
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
                		],
            	    'title_field' => '{{title1}}',
                 ]
        );
		$this->add_control(
            'google_map_code',
            [
                'label'       => __('Google Map Iframe Code', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter Google Map Iframe Code', 'eazyrecruitz'),
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
        
        <!-- contactinfo-section -->
        <section class="contactinfo-section bg-color-2">
            <div class="image-column" style="background-image: url(<?php echo wp_get_attachment_url($settings['contact_image']['id']);?>);"></div>
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['pattern_image']['id']);?>);"></div>
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-xl-4 col-lg-12 col-sm-12 content-column">
                        <div id="content_block_6">
                            <div class="content-box">
                                <div class="sec-title">
                                    <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                                    <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                                </div>
                                <ul class="info-list clearfix">
                                    <?php foreach($settings['features'] as $key => $item):?>
                                    <li>
                                        <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        <div class="inner">
                                            <h4><?php echo wp_kses($item['title1'], $allowed_tags) ;?></h4>
                                            <p><?php echo wp_kses($item['text'], $allowed_tags) ;?></p>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 col-sm-12 map-column">
                        <div class="map-inner">
                            <div class="google-map" id="contact-google-map">
								<?php echo do_shortcode($settings['google_map_code']) ;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contactinfo-section end -->
               
		<?php 
	}

}
