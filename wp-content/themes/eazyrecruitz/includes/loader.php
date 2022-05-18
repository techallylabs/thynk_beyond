<?php


defined( 'EAZYRECRUITZ_NAME' ) or define( 'EAZYRECRUITZ_NAME', 'eazyrecruitz' );

define( 'EAZYRECRUITZ_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'eazyrecruitz_wp_load', 5 );

function eazyrecruitz_wp_load() {

	defined( 'EAZYRECRUITZ_URL' ) or define( 'EAZYRECRUITZ_URL', get_template_directory_uri() . '/' );
	define(  'EAZYRECRUITZ_KEY','!@#eazyrecruitz');
	define(  'EAZYRECRUITZ_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'EAZYRECRUITZ_NONCE' ) ) {
		define( 'EAZYRECRUITZ_NONCE', 'eazyrecruitz_wp_theme' );
	}

	( new \EAZYRECRUITZ\Includes\Classes\Base )->loadDefaults();
	( new \EAZYRECRUITZ\Includes\Classes\Ajax )->actions();

}
add_action( 'init', 'eazyrecruitz_bunch_theme_init');
function eazyrecruitz_bunch_theme_init()
{
	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';
	foreach( $bunch_exlude_hooks as $k => $v )
	{
		foreach( $v as $value )
		remove_action( $k, $value[0], $value[1] );
	}

}
