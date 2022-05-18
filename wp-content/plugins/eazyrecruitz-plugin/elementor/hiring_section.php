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
class Hiring_Section extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_hiring_section';
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
		return esc_html__( 'Hiring Section', 'eazyrecruitz' );
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
			'hiring_section',
			[
				'label' => esc_html__( 'Hiring Section', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
			'hiring_image1',
				[
				  'label' => __( 'Hiring Image One', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'hiring_image2',
				[
				  'label' => __( 'Hiring Image Two', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
              'feature', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Industries Hiring', 'eazyrecruitz')],
                			['title' => esc_html__('Professions Hiring', 'eazyrecruitz')],
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
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'eazyrecruitz')
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
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Different Style', 'eazyrecruitz' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'one',
								'options' => array(
                					'one' => esc_html__( 'Choose Industries Hiring', 'eazyrecruitz' ),
                					'two'  => esc_html__( 'Choose Professions Hiring', 'eazyrecruitz' ),
                				),
                			],
            			],
            	    'title_field' => '{{title}}',
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
        
        <!-- hiring-section -->
        <section class="hiring-section">
            <div class="image-layer">
                <figure class="image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['hiring_image1']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                <figure class="image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['hiring_image2']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
            </div>
            <div class="outer-container clearfix">
                <?php foreach ($settings['feature'] as $key => $item):?>
                <div class="<?php if($item['style_two'] == 'two') echo 'right-column pull-right'; else echo 'left-column pull-left'; ?> clearfix">
                    <div class="inner-box <?php if($item['style_two'] == 'two') echo 'pull-left'; else echo 'pull-right'; ?>">
                        <div class="icon-box"><i class="<?php echo esc_attr($item['icons']) ;?>"></i></div>
                        <h2><?php echo wp_kses($item['title'], $allowed_tags) ;?></h2>
                        <p><?php echo wp_kses($item['text'], $allowed_tags) ;?></p>
                        <a href="<?php echo esc_url($item['btn_link']['url']) ;?>"><?php echo wp_kses($item['btn_title'], $allowed_tags) ;?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- hiring-section end -->
             
		<?php 
	}

}
