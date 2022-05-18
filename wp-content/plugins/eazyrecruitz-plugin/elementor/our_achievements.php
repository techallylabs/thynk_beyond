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
class Our_Achievements extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_our_achievements';
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
		return esc_html__( 'Our Achievements', 'eazyrecruitz' );
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
			'our_achievements',
			[
				'label' => esc_html__( 'Our Achievements', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'bg_image',
				[
				  'label' => __( 'Background Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
            'subtitle',
            [
                'label'       => __('Sub Title', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXT,
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
            'text',
            [
                'label'       => __('Description', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Description', 'eazyrecruitz'),
            ]
        );
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['award_title' => esc_html__('Best of Staffing Talent Award', 'eazyrecruitz')],
                			['award_title' => esc_html__('Best Companies to Work in Texas', 'eazyrecruitz')],
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
                    			'name' => 'award_title',
                    			'label' => esc_html__('Award Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'award_year',
                    			'label' => esc_html__('Award Year', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'award_desc',
                    			'label' => esc_html__('Award Description', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                		],
            	    'title_field' => '{{award_title}}',
                 ]
        );
		$this->add_control(
			'image',
				[
				  'label' => __( 'Award Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
              'our_features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['award_title2' => esc_html__('Fast Growing Staffing Firms', 'eazyrecruitz')],
                			['award_title2' => esc_html__('Best of Staffing Client Satisfaction', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon_image2',
                    			'label' => esc_html__('Icon image', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'award_title2',
                    			'label' => esc_html__('Award Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'award_year2',
                    			'label' => esc_html__('Award Year', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'award_desc2',
                    			'label' => esc_html__('Award Description', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                		],
            	    'title_field' => '{{award_title2}}',
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
        
        <!-- awards-section -->
        <section class="awards-section">
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);"></div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                    <p><?php echo wp_kses($settings['text'], $allowed_tags) ;?></p>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 inner-column">
                        <div class="inner-block">
                            <?php foreach($settings['features'] as $key => $item):?>
                            <div class="single-award-block">
                                <div class="inner-box">
                                    <div class="upper-box">
                                        <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        <h3><?php echo wp_kses($item['award_title'], $allowed_tags) ;?></h3>
                                    </div>
                                    <ul class="lower-box">
                                        <li><span><?php esc_html_e('Year', 'eazyrecruitz'); ?></span>:<?php echo wp_kses($item['award_year'], $allowed_tags) ;?></li>
                                        <li><span><?php esc_html_e('Award by', 'eazyrecruitz'); ?></span>:<?php echo wp_kses($item['award_desc'], $allowed_tags) ;?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                        <figure class="image-box js-tilt"><img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 inner-column">
                        <div class="inner-block">
                            <?php foreach($settings['our_features'] as $keys => $items):?>
                            <div class="single-award-block">
                                <div class="inner-box">
                                    <div class="upper-box">
                                        <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($items['icon_image2']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        <h3><?php echo wp_kses($items['award_title2'], $allowed_tags) ;?></h3>
                                    </div>
                                    <ul class="lower-box">
                                        <li><span><?php esc_html_e('Year', 'eazyrecruitz'); ?></span>:<?php echo wp_kses($items['award_year2'], $allowed_tags) ;?></li>
                                        <li><span><?php esc_html_e('Award by', 'eazyrecruitz'); ?></span>:<?php echo wp_kses($items['award_desc2'], $allowed_tags) ;?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- awards-section end -->
            
		<?php 
	}

}
