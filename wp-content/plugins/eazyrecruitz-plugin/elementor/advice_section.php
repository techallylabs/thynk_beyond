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
class Advice_Section extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_advice_section';
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
		return esc_html__( 'Advice Section', 'eazyrecruitz' );
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
			'advice_section',
			[
				'label' => esc_html__( 'Advice Section', 'eazyrecruitz' ),
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
			'title',
			[
				'label'       => __( 'Description', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'elementor' ),
			]
		);
		$this->add_control(
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['link_url' => esc_html__('Facebook', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'social_icon',
                    			'label' => esc_html__('Enter The icons', 'eazyrecruitz'),
                    			'type' => Controls_Manager::SELECT,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'link_url',
								'label' => __( 'Social Link', 'eazyrecruitz' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{link_url}}',
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
        
        <!-- advice-section -->
        <section class="advice-section" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);">
            <div class="auto-container">
                <div class="content-inner clearfix">
                    <div class="text pull-left"><h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2></div>
                    <ul class="social-links pull-right">
                        <?php foreach($settings['funfact'] as $item):?>
                        <li><a href="<?php echo esc_url($item['link_url']['url']);?>"><i class="fab <?php echo esc_attr($item['social_icon']);?>"></i></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- advice-section end -->
            
		<?php 
	}

}
