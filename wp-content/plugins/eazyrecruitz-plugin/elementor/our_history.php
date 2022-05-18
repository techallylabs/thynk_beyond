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
class Our_History extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_our_history';
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
		return esc_html__( 'Our History', 'eazyrecruitz' );
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
			'our_history',
			[
				'label' => esc_html__( 'Our History', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'layer_image',
				[
				  'label' => __( 'Layer Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'default'     => __( 'Our History', 'eazyrecruitz' ),
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
			'history_left_column',
			[
				'label' => esc_html__( 'History Left Column', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
              'history', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Fast Growing Company', 'eazyrecruitz')],
                			['title1' => esc_html__('1000 Companies Tie-up', 'eazyrecruitz')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'history_image',
                    			'label' => esc_html__('image', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'history_year',
                    			'label' => esc_html__('Year', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
						],
            	    'title_field' => '{{title1}}',
                 ]
        );
		$this->end_controls_section();
		
		$this->start_controls_section(
			'history_right_column',
			[
				'label' => esc_html__( 'History Right Column', 'eazyrecruitz' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
              'history_v', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title2' => esc_html__('Started in Houston', 'eazyrecruitz')],
                			['title2' => esc_html__('Best Staffing Talent Award', 'eazyrecruitz')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'history_year1',
                    			'label' => esc_html__('Year', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'title2',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'history_image1',
                    			'label' => esc_html__('image', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
						],
            	    'title_field' => '{{title2}}',
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
        
        <!-- history-section -->
        <section class="history-section">
            <figure class="image-layer"><img src="<?php echo wp_get_attachment_url($settings['layer_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                        <div class="sec-title">
                            <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                            <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                        <div class="inner-box">
                            <?php foreach($settings['history'] as $key => $item):?>
                            <figure class="image-box">
                                <img src="<?php echo wp_get_attachment_url($item['history_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>">
                                <div class="dots-box"></div>
                            </figure>
                            <div class="content-box">
                                <div class="dots-box active"></div>
                                <div class="year-box">
                                    <h3><?php echo wp_kses($item['history_year'], $allowed_tags) ;?></h3>
                                    <div class="pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-37.png);"></div>
                                    <div class="pattern-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-38.png);"></div>
                                </div>
                                <div class="text">
                                    <h3><?php echo wp_kses($item['title1'], $allowed_tags) ;?></h3>
                                    <p><?php echo wp_kses($item['text'], $allowed_tags) ;?></p>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                        <div class="inner-box">
                            <?php foreach($settings['history_v'] as $key => $item):?>
                            <div class="content-box">
                                <div class="year-box">
                                    <h3><?php echo wp_kses($item['history_year1'], $allowed_tags) ;?></h3>
                                    <div class="pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-37.png);"></div>
                                    <div class="pattern-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-38.png);"></div>
                                </div>
                                <div class="text">
                                    <h3><?php echo wp_kses($item['title2'], $allowed_tags) ;?></h3>
                                    <p><?php echo wp_kses($item['text1'], $allowed_tags) ;?></p>
                                </div>
                            </div>
                            <figure class="image-box"><img src="<?php echo wp_get_attachment_url($item['history_image1']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- history-section end -->
        
		<?php 
	}

}
