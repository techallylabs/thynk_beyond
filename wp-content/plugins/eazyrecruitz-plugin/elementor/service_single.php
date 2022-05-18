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
class Service_Single extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_service_single';
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
		return esc_html__( 'Service Single', 'eazyrecruitz' );
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
			'service_single',
			[
				'label' => esc_html__( 'Service Single', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'eazyrecruitz' ),
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
				'placeholder' => __( 'Enter your title', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'service_image',
				[
				  'label' => __( 'Service Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Administration Roles', 'eazyrecruitz')],
                			['title1' => esc_html__('Human Resources Roles', 'eazyrecruitz')],
							['title1' => esc_html__('Customer Suport Roles', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons',
								'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'list_title',
                    			'label' => esc_html__('List Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'feature_str',
                    			'label' => esc_html__('Feature List', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('More Details', 'eazyrecruitz')
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
		$this->end_controls_section();
		
		$this->start_controls_section(
			'our_tab',
			[
				'label' => esc_html__( 'Our Tabs', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'our_tabs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['tab_title' => esc_html__('Short Term Hiring', 'eazyrecruitz')],
                			['tab_title' => esc_html__('Last Minute Hiring', 'eazyrecruitz')],
							['tab_title' => esc_html__('Immediate Hiring', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons2',
								'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'tab_title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'tab_img',
                    			'label' => esc_html__('image Url', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'tab_text',
                    			'label' => esc_html__('Description', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'btn_title1',
                    			'label' => esc_html__('Button Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('More Details', 'eazyrecruitz')
                			],
							[
                    			'name' => 'btn_link1',
								'label' => __( 'External Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{tab_title}}',
                 ]
        );
		$this->end_controls_section();
		
		$this->start_controls_section(
			'service_advantages',
			[
				'label' => esc_html__( 'Service Advantages', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'title3',
			[
				'label'       => __( 'Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'text3',
			[
				'label'       => __( 'Text', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'advantages', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['adv_title' => esc_html__('Qualified Candidates', 'eazyrecruitz')],
                			['adv_title' => esc_html__('Save Your Money', 'eazyrecruitz')],
							['adv_title' => esc_html__('Broad Network', 'eazyrecruitz')],
							['adv_title' => esc_html__('Save Your Time', 'eazyrecruitz')],
                			['adv_title' => esc_html__('Increase Flexibility', 'eazyrecruitz')],
							['adv_title' => esc_html__('Improve Productivity', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons3',
								'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'adv_title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'adv_text',
                    			'label' => esc_html__('Description', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
            			],
            	    'title_field' => '{{adv_title}}',
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
        
        <!-- service-details -->
        <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            <div class="content-one">
                                <div class="sec-title">
                                    <span class="top-title"><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></span>
                                    <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                                </div>
                                <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['service_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                <div class="text">
                                    <?php echo wp_kses( $settings['text'], $allowed_tags );?>
                                </div>
                            </div>
                            <div class="content-two">
                                <div class="inner-box clearfix">
                                    <?php $i = 1; foreach($settings['services'] as $key => $item):?>
                                    <div class="single-column">
                                        <div class="content-box">
                                            <h5><?php $i = sprintf('%02d', $i); echo $i; ?></h5>
                                            <h3><?php echo wp_kses($item['title1'], $allowed_tags);?></h3>
                                            <div class="link"><a href="<?php echo esc_url($item['btn_link']['url']);?>"><i class="flaticon-right-arrow"></i></a></div>
                                            <div class="icon-box"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                        </div>
                                        <div class="overlay-box">
                                            <div class="icon-box"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                            <h5><?php echo wp_kses($item['list_title'], $allowed_tags);?></h5>
                                            <ul class="list clearfix">
                                                <?php $fearures = explode("\n", ($item['feature_str']));?>
												<?php foreach($fearures as $feature):?>
                                                <li><?php echo wp_kses($feature, true); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="link"><a href="<?php echo esc_url($item['btn_link']['url']);?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($item['btn_title'], $allowed_tags);?></a></div>
                                        </div>
                                    </div>
                                    <?php $i++; endforeach;?>
                                </div>
                            </div>
                            
                            <div class="content-three">
                                <div class="upper-box">
                                    <h3><?php echo wp_kses( $settings['title2'], $allowed_tags );?></h3>
                                    <p><?php echo wp_kses( $settings['text2'], $allowed_tags );?></p>
                                </div>
                                <div class="tabs-box">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-12 col-sm-12 btn-column">
                                            <div class="tab-btn-box">
                                                <ul class="tab-btns tab-buttons clearfix">
                                                    <?php $count = 1; foreach($settings['our_tabs'] as $key => $item):?>
                                                    <li class="tab-btn <?php if($count == 1) echo 'active-btn' ; ?>" data-tab="#tab-<?php echo esc_attr($count); ?>">
                                                        <div class="icon-box"><i class="<?php echo esc_attr($item['icons2']);?>"></i></div>
                                                        <h6><?php echo wp_kses($item['tab_title'], $allowed_tags);?></h6>
                                                    </li>
                                                    <?php $count++; endforeach;?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12 content-column">
                                            <div class="tabs-content">
                                                <?php $counts = 1; foreach($settings['our_tabs'] as $key => $item):?>
                                                <div class="tab <?php if($counts == 1) echo 'active-tab' ; ?>" id="tab-<?php echo esc_attr($counts); ?>">
                                                    <div class="inner-box">
                                                        <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['tab_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                                        <div class="text">
                                                            <h3><?php echo wp_kses($item['tab_title'], $allowed_tags);?></h3>
                                                            <p><?php echo wp_kses($item['tab_text'], $allowed_tags);?></p>
                                                            <a href="<?php echo esc_url($item['btn_link1']['url']);?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($item['btn_title1'], $allowed_tags);?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $counts++; endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-four">
                                <div class="upper-box">
                                    <h3><?php echo wp_kses( $settings['title3'], $allowed_tags );?></h3>
                                    <p><?php echo wp_kses( $settings['text3'], $allowed_tags );?></p>
                                </div>
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <ul class="list-item clearfix">
                                            	<?php $inc = 0; foreach($settings['advantages'] as $key => $item):?>
                                                <?php if(($inc%3) == 0 && $inc != 0):?>                                             
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <ul class="list-item clearfix">
                                                <?php endif; ?>
                                                <li>
                                                    <div class="icon-box"><i class="<?php echo esc_attr($item['icons3']);?>"></i></div>
                                                    <h5><?php echo wp_kses($item['adv_title'], $allowed_tags);?></h5>
                                                    <div class="more-content">
                                                        <div class="menu-icon"><i class="flaticon-menu"></i><i class="flaticon-menu"></i></div>
                                                        <div class="text">
                                                            <p><?php echo wp_kses($item['adv_text'], $allowed_tags);?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $inc++; endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar">
                            <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
								<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-details end -->
          
		<?php 
	}

}