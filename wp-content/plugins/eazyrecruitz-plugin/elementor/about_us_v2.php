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
class About_Us_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_about_us_v2';
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
		return esc_html__( 'About Us V2', 'eazyrecruitz' );
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
			'about_us_v2',
			[
				'label' => esc_html__( 'About Us V2', 'eazyrecruitz' ),
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
			'video_image',
				[
				  'label' => __( 'Video Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'video_link',
				[
				  'label' => __( 'Video Url', 'eazyrecruitz' ),
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
			'about_image',
				[
				  'label' => __( 'About Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'briefcase_image',
				[
				  'label' => __( 'Briefcase Image', 'eazyrecruitz' ),
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
		$this->add_control(
            'style_two',
			[
				'label'   => esc_html__( 'Choose Spacing Style', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Style One', 'eazyrecruitz' ),
					'two'  => esc_html__( 'Style Two', 'eazyrecruitz' ),
				),
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
        
        <!-- about-style-two -->
        <section class="about-style-two <?php if($settings['style_two'] == 'two') echo 'about-page'; else echo ''; ?>" id="about">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div id="image_block_1">
                                <div class="image-box">
                                    <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);"></div>
                                    <div class="video-inner" style="background-image: url(<?php echo wp_get_attachment_url($settings['video_image']['id']);?>);">
                                        <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="lightbox-image video-btn" data-caption="">
                                            <i class="flaticon-play"></i>
                                        </a>
                                        <div class="border"></div>
                                    </div>
                                    <figure class="image-1"><img src="<?php echo wp_get_attachment_url($settings['about_image']['id']);?>" alt=""></figure>
                                    <figure class="image-2 wow slideInLeft animated animated" data-wow-delay="00ms"><img src="<?php echo wp_get_attachment_url($settings['briefcase_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div id="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">
                                        <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                                        <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($settings['text'], $allowed_tags) ;?></p>
                                    </div>
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
        <!-- about-style-two end -->
              
		<?php 
	}

}
