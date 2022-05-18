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
class Our_Team extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eazyrecruitz_our_team';
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
		return esc_html__( 'Our Team', 'eazyrecruitz' );
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
			'our_team',
			[
				'label' => esc_html__( 'Our Team', 'eazyrecruitz' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'eazyrecruitz' ),
				'default'     => __( 'Team Behind Us', 'eazyrecruitz' ),
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
				'placeholder' => __( 'Enter your title', 'eazyrecruitz' )
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'eazyrecruitz' )
			]
		);
		$this->add_control(
              'skills', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['bar_title' => esc_html__('Temporary', 'eazyrecruitz')],
                			['bar_title' => esc_html__('Contract', 'eazyrecruitz')],
							['bar_title' => esc_html__('Direct Hire', 'eazyrecruitz')],
							['bar_title' => esc_html__('Payrolling', 'eazyrecruitz')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'fill_bar_value',
                    			'label' => esc_html__('Fill Bar Value', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
							[
                    			'name' => 'bar_title',
                    			'label' => esc_html__('Bar Title', 'eazyrecruitz'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'eazyrecruitz')
                			],
                		],
            	    'title_field' => '{{bar_title}}',
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
				'default'     => __( 'Meet All Team Members', 'eazyrecruitz' ),
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
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'eazyrecruitz' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'eazyrecruitz' ),
					'title'      => esc_html__( 'Title', 'eazyrecruitz' ),
					'menu_order' => esc_html__( 'Menu Order', 'eazyrecruitz' ),
					'rand'       => esc_html__( 'Random', 'eazyrecruitz' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'eazyrecruitz' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'eazyrecruitz' ),
					'ASC'  => esc_html__( 'ASC', 'eazyrecruitz' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'eazyrecruitz' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'eazyrecruitz' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'eazyrecruitz'),
				  'options' => get_team_categories()
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
		
        $paged = eazyrecruitz_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-eazyrecruitz' );
		$args = array(
			'post_type'      => 'eazyrecruitz_team',
			'posts_per_page' => eazyrecruitz_set( $settings, 'query_number' ),
			'orderby'        => eazyrecruitz_set( $settings, 'query_orderby' ),
			'order'          => eazyrecruitz_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( eazyrecruitz_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = eazyrecruitz_set( $settings, 'query_exclude' );
		}
		
		if( eazyrecruitz_set( $settings, 'query_category' ) ) $args['team_cat'] = eazyrecruitz_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		        
        <!-- team-section -->
        <section class="team-section <?php if($settings['style_two'] == 'two') echo 'bg-color-2'; else echo ''; ?>">
            <?php if($settings['bg_image']['id']):?><div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>);"></div><?php endif; ?>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 experience-column">
                        <div id="content_block_5">
                            <div class="content-box">
                                <div class="sec-title">
                                    <span class="top-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags) ;?></span>
                                    <h2><?php echo wp_kses($settings['title'], $allowed_tags) ;?></h2>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses($settings['text'], $allowed_tags) ;?></p>
                                </div>
                                <div class="progress-inner">
                                    <?php foreach($settings['skills'] as $key => $item):?>
                                    <div class="progress-box">
                                        <div class="bar">
                                            <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($item['fill_bar_value']) ;?>"><div class="count-text"><?php echo esc_attr($item['fill_bar_value']) ;?></div></div>
                                        </div>
                                        <h6><?php echo wp_kses($item['bar_title'], $allowed_tags) ;?></h6>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                                <div class="link"><a href="<?php echo esc_url($settings['btn_link']['url']) ;?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses($settings['btn_title'], $allowed_tags) ;?></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="row align-items-center clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 team-block wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <?php 
									$count = 0; 
									while ( $query->have_posts() ) : $query->the_post(); 
									if(($count%2) == 0 && $count != 0):
								?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 team-block wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <?php endif; ?>
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <?php the_post_thumbnail('eazyrecruitz_270x200'); ?>
                                            <span class="singature"><?php echo (get_post_meta( get_the_id(), 'signature_title', true ));?></span>
                                            <?php
												$icons = get_post_meta( get_the_id(), 'social_profile', true );
												if ( ! empty( $icons ) ) :
											?>
                                            <div class="share-box">
                                                
												<p><i class="fas fa-share-alt"></i><?php esc_html_e('Share', 'eazyrecruitz'); ?></p>
                                                                                                
                                                <ul class="social-links clearfix">
                                                    <?php
													foreach ( $icons as $h_icon ) :
													$header_social_icons = json_decode( urldecode( eazyrecruitz_set( $h_icon, 'data' ) ) );
													if ( eazyrecruitz_set( $header_social_icons, 'enable' ) == '' ) {
														continue;
													}
													$icon_class = explode( '-', eazyrecruitz_set( $header_social_icons, 'icon' ) );
													?>
													<li><a href="<?php echo eazyrecruitz_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo eazyrecruitz_set( $header_social_icons, 'background' ); ?>; color: <?php echo eazyrecruitz_set( $header_social_icons, 'color' ); ?>"><i class="fab <?php echo esc_attr( eazyrecruitz_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
													<?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                        </figure>
                                        <div class="lower-content">
                                            <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'team_link', true));?>"><?php the_title(); ?></a></h3>
                                            <span class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php $count++; endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-section end -->
         
        <?php }
		wp_reset_postdata();
	}

}
