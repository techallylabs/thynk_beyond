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
class How_It_Possible extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_how_it_possible';
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
		return esc_html__( 'How it Possible', 'eazyrecruitz' );
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
			'how_it_possible',
			[
				'label' => esc_html__( 'How It Possible', 'eazyrecruitz' ),
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
                'label'       => __('Text', 'eazyrecruitz'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Text', 'eazyrecruitz'),
            ]
        );
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Initiation', 'eazyrecruitz')],
                			['title1' => esc_html__('Scheduling', 'eazyrecruitz')],
							['title1' => esc_html__('Contracts & Pay', 'eazyrecruitz')],
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
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
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
        
        <!-- process-section -->
        <section class="process-section centred">
            <div class="auto-container">
                <?php if(($settings['subtitle']) || ($settings['title']) || ($settings['title'])):?>
                <div class="sec-title">
                    <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                    <p><?php echo wp_kses($settings['text'], $allowed_tags) ;?></p>
                </div>
                <?php endif; ?>
                <div class="row clearfix">
                    <?php $count = 1; foreach($settings['features'] as $key => $item):?>
                    <div class="col-lg-4 col-md-6 col-sm-12 process-block">
                        <div class="process-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="icon-box">
                                    <img src="<?php echo wp_get_attachment_url($item['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>">
                                    <span><?php $count = sprintf('%02d', $count); echo $count; ?></span>
                                    <div class="anim-icon">
                                        <div class="icon-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-8.png);"></div>
                                        <div class="icon-2 rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-2.png);"></div>
                                        <div class="icon-3 rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-2.png);"></div>
                                    </div>
                                </figure>
                                <div class="lower-content">
                                    <h3><?php echo wp_kses($item['title1'], $allowed_tags) ;?></h3>
                                    <p><?php echo wp_kses($item['text1'], $allowed_tags) ;?></p>
                                    <a href="<?php echo esc_url($item['btn_link']['url']) ;?>"><?php echo wp_kses($item['btn_title'], $allowed_tags) ;?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++; endforeach;?>
                </div>
            </div>
        </section>
        <!-- process-section end -->
        
		<?php 
	}

}
