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
class Pricing_Plans_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_pricing_plans_v2';
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
		return esc_html__( 'Pricing Plans V2', 'eazyrecruitz' );
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
			'pricing_plans_v2',
			[
				'label' => esc_html__( 'Pricing Plans V2', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'eazyrecruitz' ),
				'default'     => __( 'Our Pricing & Plans', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'eazyrecruitz' ),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'standard_table',
			[
				'label' => esc_html__( 'Standard Table', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'standard_btn_title',
			[
				'label'       => __( 'Standard Button Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Standard Button Title', 'eazyrecruitz' ),
				'default'     => __( 'Standard', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'standard', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['plan_title' => esc_html__('Temprory', 'eazyrecruitz')],
                			['plan_title' => esc_html__('Contract', 'eazyrecruitz')],
                			['plan_title' => esc_html__('Direct', 'eazyrecruitz')],
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
                    			'name' => 'plan_title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'plan_text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'feature_str',
                    			'label' => esc_html__('Feature List', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'currency_symbols',
                    			'label' => esc_html__('Currency Symbols', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'price',
                    			'label' => esc_html__('Price', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'duration',
                    			'label' => esc_html__('Duration', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Get Started', 'eazyrecruitz')
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
            	    'title_field' => '{{plan_title}}',
                 ]
        );
		$this->end_controls_section();
		$this->start_controls_section(
			'Premium_table',
			[
				'label' => esc_html__( 'Premium Table', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'premium_btn_title',
			[
				'label'       => __( 'Premium Button Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Premium Button Title', 'eazyrecruitz' ),
				'default'     => __( 'Premium', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'premium', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['plan_title2' => esc_html__('Temprory', 'eazyrecruitz')],
                			['plan_title2' => esc_html__('Contract', 'eazyrecruitz')],
                			['plan_title2' => esc_html__('Direct', 'eazyrecruitz')],
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
                    			'name' => 'plan_title2',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'plan_text2',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'feature_str2',
                    			'label' => esc_html__('Feature List', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'currency_symbols2',
                    			'label' => esc_html__('Currency Symbols', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'price2',
                    			'label' => esc_html__('Price', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'duration2',
                    			'label' => esc_html__('Duration', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'btn_title2',
                    			'label' => esc_html__('Button Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Get Started', 'eazyrecruitz')
                			],
							[
                    			'name' => 'btn_link2',
								'label' => __( 'External Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{plan_title2}}',
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
        
        <!-- pricing-section -->
        <section class="pricing-section">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="top-title"><?php echo wp_kses( $settings['subtitle'], true );?></span>
                    <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-15"><?php echo wp_kses($settings['standard_btn_title'], $allowed_tags); ?></li>
                            <li class="tab-btn" data-tab="#tab-16"><?php echo wp_kses($settings['premium_btn_title'], $allowed_tags); ?></li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-15">
                            <div class="row clearfix">
                                <?php foreach ($settings['standard'] as $key => $item):?>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                                <h3><?php echo wp_kses($item['plan_title'], true); ?></h3>
                                                <span class="text"><?php echo wp_kses($item['plan_text'], true); ?></span>
                                            </div>
                                            <ul class="list clearfix">
                                                <?php $fearures = explode("\n", ($item['feature_str']));?>
												<?php foreach($fearures as $feature):?>
                                                <li><?php echo wp_kses($feature, true); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <h2><span class="symble"><?php echo wp_kses($item['currency_symbols'], true); ?></span><?php echo wp_kses($item['price'], true); ?> <span class="text">/ <?php echo wp_kses($item['duration'], true); ?></span></h2>
                                            <a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], $allowed_tags); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab" id="tab-16">
                            <div class="row clearfix">
                                <?php foreach ($settings['premium'] as $key => $item):?>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image2']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                                <h3><?php echo wp_kses($item['plan_title2'], true); ?></h3>
                                                <span class="text"><?php echo wp_kses($item['plan_text2'], true); ?></span>
                                            </div>
                                            <ul class="list clearfix">
                                                <?php $fearures2 = explode("\n", ($item['feature_str2']));?>
												<?php foreach($fearures2 as $feature2):?>
                                                <li><?php echo wp_kses($feature2, true); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <h2><span class="symble"><?php echo wp_kses($item['currency_symbols2'], true); ?></span><?php echo wp_kses($item['price2'], true); ?> <span class="text">/ <?php echo wp_kses($item['duration2'], true); ?></span></h2>
                                            <a href="<?php echo esc_url($item['btn_link2']['url']); ?>"><?php echo wp_kses($item['btn_title2'], $allowed_tags); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-section end -->
        
		<?php 
	}

}
