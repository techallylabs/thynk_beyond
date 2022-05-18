<?php

namespace EAZYRECRUITZPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page
		'slider_v1',
		'our_clients',
		'welcome_section',
		'about_us',
		'services_v1',
		'recruitment_technology',
		'industries_hiring',
		'how_it_possible',
		'our_team',
		'latest_news',
		'testimonials_v1',
		'our_achievements',		
		//Home Two 
		'slider_v2',
		'feature_service_v1',
		'about_us_v2',
		'feature_service_v2',
		'our_projects',
		'industries_hiring_v2',
		'our_advantages',
		'pricing_plan',
		'testimonials_v2',
		'latest_news_v2',
		'call_to_action',
		'touch_with_us',
		//Home Three
		'slider_v3',
		'about_us_v3',
		'video_section',
		'how_we_work',
		'pricing_plans_v2',
		'our_team_v2',
		'our_projects_v2',
		'testimonials_v3',
		'latest_news_v3',
		'advice_section',
		//Inner Pages
		'our_history',
		'our_team_v3',
		'our_team_v4',
		'hiring_strategies',
		'hr_problems',
		'growth_section',
		//job related
		'place_order',
		'job_opening',
		'dream_job',
		//job end
		'our_faqs',
		'video_section_v2',
		'testimonials_v4',
		'services_v2',
		'hiring_section',
		'touch_with_us_v2',
		'service_single',
		'related_projects',
		'potential_career',
		'time_to_grow',
		'our_advantages_v2',
		'blog_grid_view',
		'portfolio_v1',
		'portfolio_v2',
		'portfolio_v3',
		'portfolio_v4',
		'portfolio_v5',
		'choose_block_v2',
		'project_block_v1',
		'project_block_v2',
		'experience_block',
		'funfacts',
		'faqs_block',
		'video_block',
		'contact_form',
		'contact_us',
		'contact_us_v2',
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\EAZYRECRUITZPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'eazyrecruitz',
			[
				'title' => esc_html__( 'Eazyrecruitz', 'eazyrecruitz' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'eazyrecruitz' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();