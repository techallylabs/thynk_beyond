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
class Industries_Hiring extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_industries_hiring';
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
		return esc_html__( 'Industries Hiring', 'eazyrecruitz' );
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
			'industries_hiring',
			[
				'label' => esc_html__( 'Industries Hiring', 'eazyrecruitz' ),
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
                			['icon_title' => esc_html__('Logistics & Services', 'eazyrecruitz')],
                			['icon_title' => esc_html__('Hospitality', 'eazyrecruitz')],
							['icon_title' => esc_html__('Manufacturing', 'eazyrecruitz')],
							['icon_title' => esc_html__('Education & Government', 'eazyrecruitz')],
							['icon_title' => esc_html__('Software/IT', 'eazyrecruitz')],
							['icon_title' => esc_html__('Front Line Support', 'eazyrecruitz')],
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
                    			'name' => 'icon_title',
                    			'label' => esc_html__('Icon Description', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'image',
                    			'label' => esc_html__('Feature image', 'eazyrecruitz'),
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
                    			'name' => 'ext_link',
								'label' => __( 'External Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
                		],
            	    'title_field' => '{{icon_title}}',
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
        
        <!-- industries-section -->
        <section class="industries-section bg-color-1">
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);"></div>
            <div class="auto-container">
                <div class="tabs-box">
                    <div class="row clearfix">
                        <div class="col-xl-4 col-lg-12 col-sm-12 btn-column">
                            <div class="sec-title light">
                                <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                                <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                            </div>
                            <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons clearfix">
                                    <?php $count = 3; foreach($settings['features'] as $key => $item):?>
                                    <li class="tab-btn <?php if($count == 3) echo 'active-btn';?>" data-tab="#tab-<?php echo esc_attr($count); ?>">
                                        <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        <h3><?php echo wp_kses($item['icon_title'], $allowed_tags) ;?></h3>
                                    </li>
                                    <?php $count++; endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-sm-12 content-column">
                            <div class="tabs-content">
                                <?php $counts = 3; foreach($settings['features'] as $key => $item):?>
                                <div class="tab <?php if($counts == 3) echo 'active-tab';?>" id="tab-<?php echo esc_attr($counts); ?>">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="<?php echo wp_get_attachment_url($item['image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        <div class="content-box">
                                            <div class="text">
                                                <h2><?php echo wp_kses($item['title1'], $allowed_tags) ;?></h2>
                                                <span><?php echo wp_kses($item['text1'], $allowed_tags) ;?></span>
                                            </div>
                                            <div class="line"></div>
                                            <div class="link"><a href="<?php echo esc_url($item['ext_link']['url']) ;?>"><i class="flaticon-right-arrow-angle"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php $counts++; endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- industries-section end -->
             
		<?php 
	}

}
