<?php
if ( ! function_exists( "eazyrecruitz_add_metaboxes" ) ) {
	function eazyrecruitz_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php',
			'dimension.php',
			'jobs.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/eazyrecruitz_options/boxes", "eazyrecruitz_add_metaboxes" );
}

