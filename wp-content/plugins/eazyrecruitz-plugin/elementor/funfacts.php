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
class Funfacts extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_funfacts';
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
		return esc_html__( 'Funfacts', 'eazyrecruitz' );
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
			'funfacts',
			[
				'label' => esc_html__( 'Funfacts', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Years of Experience in Field', 'eazyrecruitz')],
                			['block_title' => esc_html__('Companies With Our Tie-up', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'counter_start',
                    			'label' => esc_html__('Counter Start', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Counter Stop', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'alphabet_letter',
                    			'label' => esc_html__('Alphabet Letters', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
								'name' => 'style_two',
								'label'   => esc_html__( 'Choose Different Style', 'eazyrecruitz' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'Choose Style One', 'eazyrecruitz' ),
									'two'  => esc_html__( 'Choose Style Two', 'eazyrecruitz' ),
								),
							]
            			],
            	    'title_field' => '{{block_title}}',
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
        
        <!-- hiring-strategies -->
        <section class="hiring-strategies">
            <div class="auto-container">
                <div class="inner-box">
                    <div class="funfact-inner clearfix">
                        <div class="row clearfix">
                            <?php 
								foreach($settings['funfact'] as $service_block):
						    	if($service_block['style_two'] == 'two'):
							?>
                            <div class="col-lg-4 col-md-6 col-sm-12 counter-column">
                                <div class="counter-block">
                                    <div class="count-outer count-box">
                                        <span><?php esc_html_e('0', 'eazyrecruitz'); ?></span><span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($service_block['counter_stop']);?>"><?php echo esc_attr($service_block['counter_start']);?></span><span class="icon flaticon-up-arrow-2"></span>
                                    </div>
                                    <h6><?php echo wp_kses($service_block['block_title'], $allowed_tags);?></h6>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 counter-column">
                                <div class="counter-block">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="<?php echo esc_attr($service_block['counter_stop']);?>"><?php echo esc_attr($service_block['counter_start']);?></span><span><?php echo esc_attr($service_block['alphabet_letter']);?></span>
                                    </div>
                                    <h6><?php echo wp_kses($service_block['block_title'], $allowed_tags);?></h6>
                                </div>
                            </div>
                            <?php endif; endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hiring-strategies end -->
        
		<?php 
	}

}
