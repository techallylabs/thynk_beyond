<?php
/**
 * Plugin Name: Eazyrecruitz Plugin
 * Plugin URI: http://themeforest.net/user/template-path/
 * Description: Supported plugin for Eazyrecruitz WordPress theme
 * Author: Template Path
 * Version: 1.0
 * Author URI: https://themeforest.net/user/template-path/
 *
 * @package eazyrecruitz-plugin
 */

defined( 'EAZYRECRUITZPLUGIN_PLUGIN_PATH' ) || define( 'EAZYRECRUITZPLUGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EAZYRECRUITZ_PLUGIN_URI', plugins_url( 'eazyrecruitz-plugin' ) . '/' );
require_once plugin_dir_path( __FILE__ ) . 'file_crop.php';
function eazyrecruitz_bunch_widget_init2()
{
	//footer Widget
	if( class_exists( 'Eazyrecruitz_About_Company' ) )register_widget( 'Eazyrecruitz_About_Company' );
	if( class_exists( 'Eazyrecruitz_For_Employers' ) )register_widget( 'Eazyrecruitz_For_Employers' );
	
	//footer Two Widget
	if( class_exists( 'Eazyrecruitz_About_Company_V2' ) )register_widget( 'Eazyrecruitz_About_Company_V2' );
	if( class_exists( 'Eazyrecruitz_Callback_Form' ) )register_widget( 'Eazyrecruitz_Callback_Form' );
	
	//footer Three Widget
	if( class_exists( 'Eazyrecruitz_About_Company_V3' ) )register_widget( 'Eazyrecruitz_About_Company_V3' );
	if( class_exists( 'Eazyrecruitz_Recent_Post' ) )register_widget( 'Eazyrecruitz_Recent_Post' );
	
	//Service Widget
	if( class_exists( 'Eazyrecruitz_services_sidebar' ) )register_widget( 'Eazyrecruitz_services_sidebar' );
	if( class_exists( 'Eazyrecruitz_Place_a_Job' ) )register_widget( 'Eazyrecruitz_Place_a_Job' );
	
	//Blog Widget
	if( class_exists( 'Eazyrecruitz_Recently_Posted' ) )register_widget( 'Eazyrecruitz_Recently_Posted' );
	if( class_exists( 'Eazyrecruitz_Our_Projects' ) )register_widget( 'Eazyrecruitz_Our_Projects' );
	if( class_exists( 'Eazyrecruitz_Educational_Resources' ) )register_widget( 'Eazyrecruitz_Educational_Resources' );
	
	
}
add_action( 'widgets_init', 'eazyrecruitz_bunch_widget_init2' );	

class EAZYRECRUITZPLUGIN_Plugin_Core {

	/**
	 * The instance variable.
	 *
	 * @var [type]
	 */
	public static $instance;

	/**
	 * The main constructor
	 */
	function __construct() {
		self::includes();
		$this->init();

	}

	/**
	 * Load the instance.
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public static function includes() {
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/helpers/functions.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/elementor/elementor.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-post-type-abstract.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-taxonomy-abstract.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/helpers/widgets.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/post_types/project.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/post_types/team.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/post_types/testimonials.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/post_types/services.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/post_types/jobs.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/post_types/faqs.php';
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/inc/taxonomies.php';
		if ( ! class_exists( 'Redux' ) ) {
			require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . 'redux-framework/redux-framework.php';
			require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/metabox/metaboxes.php';
		}

	}

	function init() {
		EAZYRECRUITZPLUGIN\Inc\Post_Types\Project::init();
		EAZYRECRUITZPLUGIN\Inc\Post_Types\Team::init();
		EAZYRECRUITZPLUGIN\Inc\Post_Types\Testimonials::init();
		EAZYRECRUITZPLUGIN\Inc\Post_Types\Services::init();
		EAZYRECRUITZPLUGIN\Inc\Post_Types\Jobs::init();
		EAZYRECRUITZPLUGIN\Inc\Post_Types\Faqs::init();
		
		add_action( 'init', array( '\EAZYRECRUITZPLUGIN\Inc\Taxonomies', 'init' ) );
	}
}

/**
 * [eazyrecruitz_get_sidebars description]
 *
 * @param  boolean $multi [description].
 *
 * @return [type]         [description]
 */
function eazyrecruitzs_get_sidebars( $multi = false ) {
	global $wp_registered_sidebars;

	$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;

	if ( $multi ) {
		$data[] = array( 'value' => '', 'label' => 'No Sidebar' );
	} else {
		$data = array( '' => esc_html__( 'No Sidebar', 'hlc' ) );
	}

	foreach ( ( array ) $sidebars as $sidebar ) {

		if ( $multi ) {

			$data[] = array( 'value' => eazyrecruitz_set( $sidebar, 'id' ), 'label' => eazyrecruitz_set( $sidebar, 'name' ) );
		} else {

			$data[ eazyrecruitz_set( $sidebar, 'id' ) ] = eazyrecruitz_set( $sidebar, 'name' );
		}
	}

	return $data;
}

/**
 * [eazyrecruitz_social_profiler description]
 *
 * @param  [type] $obj [description]
 *
 * @return [type]      [description]
 */
function eazyrecruitz_social_profiler() {
	return array(
		'adn'                 => 'fa-adn',
		'android'             => 'fa-android',
		'apple'               => 'fa-apple',
		'behance'             => 'fa-behance',
		'behance_square'      => 'fa-behance-square',
		'bitbucket'           => 'fa-bitbucket',
		'bitcoin'             => 'fa-btc',
		'css3'                => 'fa-css3',
		'delicious'           => 'fa-delicious',
		'deviantart'          => 'fa-deviantart',
		'dribbble'            => 'fa-dribbble',
		'dropbox'             => 'fa-dropbox',
		'drupal'              => 'fa-drupal',
		'empire'              => 'fa-empire',
		'facebook'            => 'fa-facebook',
		'four_square'         => 'fa-foursquare',
		'git_square'          => 'fa-git-square',
		'github'              => 'fa-github',
		'github_alt'          => 'fa-github',
		'github_square'       => 'fa-github-square',
		'git_tip'             => 'fa-gittip',
		'google'              => 'fa-google',
		'google_plus'         => 'fa-google-plus',
		'google_plus_square'  => 'fa-google-plus-square',
		'hacker_news'         => 'fa-hacker-news',
		'html5'               => 'fa-html5',
		'instagram'           => 'fa-instagram',
		'joomla'              => 'fa-joomla',
		'js_fiddle'           => 'fa-jsfiddle',
		'linkedIn'            => 'fa-linkedin',
		'linkedIn_square'     => 'fa-linkedin-square',
		'linux'               => 'fa-linux',
		'MaxCDN'              => 'fa-maxcdn',
		'OpenID'              => 'fa-openid',
		'page_lines'          => 'fa-pagelines',
		'pied_piper'          => 'fa-pied-piper',
		'pinterest'           => 'fa-pinterest',
		'pinterest_square'    => 'fa-pinterest-square',
		'QQ'                  => 'fa-qq',
		'rebel'               => 'fa-rebel',
		'reddit'              => 'fa-reddit',
		'reddit_square'       => 'fa-reddit-square',
		'ren-ren'             => 'fa-renren',
		'share_alt'           => 'fa-share-alt',
		'share_square'        => 'fa-share-alt-square',
		'skype'               => 'fa-skype',
		'slack'               => 'fa-slack',
		'sound_cloud'         => 'fa-soundcloud',
		'spotify'             => 'fa-spotify',
		'stack_exchange'      => 'fa-stack-exchange',
		'stack_overflow'      => 'fa-stack-overflow',
		'steam'               => 'fa-steam',
		'steam_square'        => 'fa-steam-square',
		'stumble_upon'        => 'fa-stumbleupon',
		'stumble_upon_circle' => 'fa-stumbleupon-circle',
		'tencent_weibo'       => 'fa-tencent-weibo',
		'trello'              => 'fa-trello',
		'tumblr'              => 'fa-tumblr',
		'tumblr_square'       => 'fa-tumblr-square',
		'twitter'             => 'fa-twitter',
		'twitter_square'      => 'fa-twitter-square',
		'vimeo_square'        => 'fa-vimeo-square',
		'vine'                => 'fa-vine',
		'vK'                  => 'fa-vk',
		'weibo'               => 'fa-weibo',
		'weixin'              => 'fa-weixin',
		'windows'             => 'fa-windows',
		'wordPress'           => 'fa-wordpress',
		'xing'                => 'fa-xing',
		'xing_square'         => 'fa-xing-square',
		'yahoo'               => 'fa-yahoo',
		'yelp'                => 'fa-yelp',
		'youTube'             => 'fa-youtube',
		'youTube_play'        => 'fa-youtube-play',
		'youTube_square'      => 'fa-youtube-square',
	);
}

function EAZYRECRUITZPLUGIN_P() {

	if ( ! isset( $GLOBALS['EAZYRECRUITZPLUGIN_Plugin_p'] ) ) {
		$GLOBALS['EAZYRECRUITZPLUGIN_Plugin'] = EAZYRECRUITZPLUGIN_Plugin_Core::instance();
	}

	return $GLOBALS['EAZYRECRUITZPLUGIN_Plugin'];
}

EAZYRECRUITZPLUGIN_P();
if ( ! function_exists( 'eazyrecruitz_set' ) ) {

	function eazyrecruitz_set( $var, $key, $def = '' ) {
		/*if (!$var)
		return false;*/

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}

}

function eazyrecruitz_fontawesome_icons() {


	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';

	$subject = wp_remote_get( get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	preg_match_all( $pattern, eazyrecruitz_set( $subject, 'body' ), $matches, PREG_SET_ORDER );
	$icons = array();
	foreach ( $matches as $match ) {
		$new_val            = ucwords( str_replace( 'fa-', '', $match[1] ) );
		$icons[ $match[1] ] = ucwords( str_replace( '-', ' ', $new_val ) );
	}

	return $icons;


}


function eazyrecruitz_encrypt( $param ) {
	return base64_encode( $param );
}


function eazyrecruitz_decrypt( $param ) {
	return base64_decode( $param );
}

function eazyrecruitz_taxonomy_regster($name, $post_type, $args) {
	// Register the taxonomy now so that the import works!
	register_taxonomy(
		$data['taxonomy'],
		apply_filters( 'woocommerce_taxonomy_objects_' . $data['taxonomy'], array( 'product' ) ),
		apply_filters( 'woocommerce_taxonomy_args_' . $data['taxonomy'], array(
			'hierarchical' => true,
			'show_ui'      => false,
			'query_var'    => true,
			'rewrite'      => false,
		) )
	);
}


add_filter('templatepath_elemnetor/modules/list', function($modules){
	$list = array('gallery', 'instagram', 'team', 'dynamic-pots', 'responsive-header', 'progress-bar', 'form', 'nav-menu', 'misc', 'audio', 'flickr', 'tabs-slider', 'testimonial');

	$modules = array_merge($modules, $list);

	return array_filter($modules);
});
