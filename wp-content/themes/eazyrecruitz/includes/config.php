<?php
/**
 * Theme config file.
 *
 * @package EAZYRECRUITZ
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['eazyrecruitz_main_header'][] 	= array( 'eazyrecruitz_preloader', 98 );
$config['default']['eazyrecruitz_main_header'][] 	= array( 'eazyrecruitz_main_header_area', 99 );

$config['default']['eazyrecruitz_main_footer'][] 	= array( 'eazyrecruitz_preloader', 98 );
$config['default']['eazyrecruitz_main_footer'][] 	= array( 'eazyrecruitz_main_footer_area', 99 );

$config['default']['eazyrecruitz_sidebar'][] 	    = array( 'eazyrecruitz_sidebar', 99 );

$config['default']['eazyrecruitz_banner'][] 	    = array( 'eazyrecruitz_banner', 99 );


return $config;
