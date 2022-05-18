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
class About_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_about_us';
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
		return esc_html__( 'About Us', 'eazyrecruitz' );
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
			'about_us',
			[
				'label' => esc_html__( 'About Us', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'bg_image',
				[
				  'label' => __( 'Background Pattern Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'about_image',
				[
				  'label' => __( 'About Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'icon_image',
				[
				  'label' => __( 'Icon Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'eazyrecruitz' ),
				'default'     => __( 'Guides & E-books', 'eazyrecruitz' ),
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
            'heading',
            [
                'label'       => __('Title/Heading', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('', 'eazyrecruitz'),
            ]
        );
		$this->add_control(
            'text',
            [
                'label'       => __('Text', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Text', 'eazyrecruitz'),
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
				'default'     => __( 'More About Us', 'eazyrecruitz' ),
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
			'quote_info',
			[
				'label'       => __( 'Quote Description', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Quote Description', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'author_image',
				[
				  'label' => __( 'Author Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'author_title',
			[
				'label'       => __( 'Author Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Title', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'author_designation',
			[
				'label'       => __( 'Author Designation', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Designation', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'signature_image',
				[
				  'label' => __( 'Signature Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
        
        <!-- about-section -->
        <section class="about-section">
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);"></div>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div id="content_block_2">
                                <div class="content-box centred">
                                    <figure class="image-box"><img src="<?php echo wp_get_attachment_url($settings['about_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                    <div class="inner-box">
                                        <figure class="icon-box"><img src="<?php echo wp_get_attachment_url($settings['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        <h3><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h3>
                                        <a href="<?php echo esc_url($settings['btn_link']['url']) ;?>"><?php echo wp_kses($settings['btn_title'], $allowed_tags) ;?><i class="flaticon-direct-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div id="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">
                                        <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                                        <h2><?php echo wp_kses($settings['heading'], $allowed_tags) ;?></h2>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($settings['text'], $allowed_tags) ;?></p>
                                    </div>
                                    <div class="link"><a href="<?php echo esc_url($settings['btn_link1']['url']) ;?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($settings['btn_title1'], $allowed_tags) ;?></a></div>
                                    <div class="author-box">
                                        <div class="author-text">
                                            <h3><?php echo wp_kses($settings['quote_info'], $allowed_tags) ;?></h3>
                                        </div>
                                        <div class="author-info">
                                            <figure class="author-thumb"><img src="<?php echo wp_get_attachment_url($settings['author_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                            <h4><?php echo wp_kses($settings['author_title'], $allowed_tags) ;?></h4>
                                            <span class="designation"><?php echo wp_kses($settings['author_designation'], $allowed_tags) ;?></span>
                                            <figure class="signature"><img src="<?php echo wp_get_attachment_url($settings['signature_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->
               
		<?php 
	}

}
