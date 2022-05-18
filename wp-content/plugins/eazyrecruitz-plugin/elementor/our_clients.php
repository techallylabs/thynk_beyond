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
class Our_Clients extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_our_clients';
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
		return esc_html__( 'Our Clients', 'eazyrecruitz' );
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
			'our_clients',
			[
				'label' => esc_html__( 'Our Clients', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'clients', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Visit Website', 'eazyrecruitz')],
                			['title' => esc_html__('Visit Website', 'eazyrecruitz')],
                			['title' => esc_html__('Visit Website', 'eazyrecruitz')],
							['title' => esc_html__('Visit Website', 'eazyrecruitz')],
							['title' => esc_html__('Visit Website', 'eazyrecruitz')]
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
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
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
            	    'title_field' => '{{title}}',
                 ]
        );
		$this->add_control(
            'style_two',
			[
				'label'   => esc_html__( 'Choose Different Style', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style One', 'eazyrecruitz' ),
					'two'  => esc_html__( 'Choose Style Two', 'eazyrecruitz' ),
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
        
        <!-- clients-section -->
        <section class="clients-section <?php if($settings['style_two'] == 'two') echo 'alternet-2'; else echo ''; ?>">
            <div class="outer-container">
                <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <?php foreach($settings['clients'] as $item):?>
                    <figure class="clients-logo-box">
                        <a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo wp_get_attachment_url($item['client_img']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></a>
                        <span class="logo-title"><a href="<?php echo esc_url($item['client_link']['url']);?>"><?php echo wp_kses($item['title'], $allowed_tags) ;?></a></span>
                    </figure>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- clients-section end -->
		<?php 
	}

}
