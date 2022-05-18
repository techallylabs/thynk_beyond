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
class Feature_Service_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_feature_service_v2';
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
		return esc_html__( 'Feature Service V2', 'eazyrecruitz' );
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
			'feature_service_v2',
			[
				'label' => esc_html__( 'Feature Service V2', 'eazyrecruitz' ),
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
			'pattern_image',
				[
				  'label' => __( 'Pattern Image', 'eazyrecruitz' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Temprory', 'eazyrecruitz')],
                			['title' => esc_html__('Direct', 'eazyrecruitz')],
							['title' => esc_html__('Contract', 'eazyrecruitz')],
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
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                			[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
							[
                    			'name' => 'feature_str',
                    			'label' => esc_html__('Feature List', 'eazyrecruitz'),
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
							[
                    			'name' => 'bottom_descritpion',
                    			'label' => esc_html__('Bottom Description', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
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
        
        <!-- service-style-two -->
        <section class="service-style-two" id="services">
            <div class="bg-layer"></div>
            <div class="auto-container">
                <div class="inner-container" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);">
                    <div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id']));?>);"></div>
                    <div class="row clearfix">
                        <?php foreach($settings['features'] as $key => $item):?>
                        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                            <div class="single-item">
                                <div class="inner-box">
                                    <?php if($item['icon_image']['id']): ?><figure class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image']['id']);?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure><?php endif; ?>
                                    <h3><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['title'], $allowed_tags) ;?></a></h3>
                                    <p><?php echo wp_kses($item['text'], $allowed_tags) ;?></p>
                                    <ul class="list clearfix">
                                        <?php $fearures = explode("\n", ($item['feature_str']));?>
										<?php foreach($fearures as $feature):?>
                                        <li><?php echo wp_kses($feature, $allowed_tags); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="link"><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($item['btn_title'], $allowed_tags) ;?></a></div>
                                	<?php if($item['bottom_descritpion']): ?><span class="text"><?php echo wp_kses($item['bottom_descritpion'], $allowed_tags); ?></span><?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-style-two end -->
        
		<?php 
	}

}
