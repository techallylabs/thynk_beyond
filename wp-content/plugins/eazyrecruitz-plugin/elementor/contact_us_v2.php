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
class Contact_Us_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_contact_us_v2';
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
		return esc_html__( 'Contact Us V2', 'eazyrecruitz' );
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
			'contact_us_v2',
			[
				'label' => esc_html__( 'Contact Us V2', 'eazyrecruitz' ),
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
              'info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Philadelphia', 'eazyrecruitz')],
                			['title' => esc_html__('New Orleans', 'eazyrecruitz')],
							['title' => esc_html__('Minneapolis', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
                    			'type' => Controls_Manager::SELECT,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'info_title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'info_description',
                    			'label' => esc_html__('Email Address', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
							[
                    			'name' => 'icons1',
                    			'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
                    			'type' => Controls_Manager::SELECT,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'info_title1',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'info_description1',
                    			'label' => esc_html__('Phone Number', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
                		],
            	    'title_field' => '{{title}}',
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
        
        <!-- locations-section -->
        <section class="locations-section bg-color-2">
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['pattern_image']['id']);?>);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <?php foreach($settings['info'] as $key => $item):?>
                    <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                        <div class="single-item wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="upper-box">
                                    <h3><?php echo wp_kses($item['title'], $allowed_tags) ;?></h3>
                                    <p><?php echo wp_kses($item['text'], $allowed_tags) ;?></p>
                                </div>
                                <ul class="info-list clearfix">
                                    <li>
                                        <i class="<?php echo esc_attr($item['icons']) ;?>"></i>
                                        <p><?php echo wp_kses($item['info_title'], $allowed_tags) ;?></p>
                                        <a href="mailto:<?php echo esc_url($item['info_description']) ;?>"><?php echo wp_kses($item['info_description'], $allowed_tags) ;?></a>
                                    </li>
                                    <li>
                                        <i class="<?php echo esc_attr($item['icons1']) ;?>"></i>
                                        <p><?php echo wp_kses($item['info_title1'], $allowed_tags) ;?></p>
                                        <a href="tel:<?php echo esc_url($item['info_description1']) ;?>"><?php echo wp_kses($item['info_description1'], $allowed_tags) ;?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- locations-section end -->
            
		<?php 
	}

}
