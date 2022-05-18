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
class Call_To_Action extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_call_to_action';
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
		return esc_html__( 'Call To Action', 'eazyrecruitz' );
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
			'call_to_action',
			[
				'label' => esc_html__( 'Call To Action', 'eazyrecruitz' ),
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
            'description',
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'eazyrecruitz' ),
				'default'     => __( 'Hire', 'eazyrecruitz' ),
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
		$this->add_control(
			'btn_title1',
			[
				'label'       => __( 'Button Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'eazyrecruitz' ),
				'default'     => __( 'Apply', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'btn_link1',
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
		$this->add_control(
              'clients', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['client_link' => esc_html__('#', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'client_img',
                    			'label' => esc_html__('Client image Url', 'eazyrecruitz'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
                			[
                    			'name' => 'client_link',
								'label' => __( 'External Url', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
                			
            			],
            	    'title_field' => '{{client_link}}',
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
        
        <!-- clients-style-two -->
        <section class="clients-style-two" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);">
            <div class="auto-container">
                <div class="title-inner centred">
                    <h2><?php echo wp_kses($settings['description'], $allowed_tags) ;?></h2>
                    <div class="btn-box">
                        <a href="<?php echo esc_url($settings['btn_link']['url']) ;?>" class="btn-one"><?php echo wp_kses($settings['btn_title'], $allowed_tags) ;?></a>
                        <a href="<?php echo esc_url($settings['btn_link1']['url']) ;?>" class="btn-two"><?php echo wp_kses($settings['btn_title1'], $allowed_tags) ;?></a>
                    </div>
                </div>
                <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <?php foreach($settings['clients'] as $item):?>
                    <figure class="clients-logo-box">
                        <a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo wp_get_attachment_url($item['client_img']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></a>
                    </figure>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- clients-style-two end -->
              
		<?php 
	}

}
