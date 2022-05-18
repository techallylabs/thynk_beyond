<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'eazyrecruitz_setup_theme' );
add_action( 'after_setup_theme', 'eazyrecruitz_load_default_hooks' );


function eazyrecruitz_setup_theme() {

	load_theme_textdomain( 'eazyrecruitz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('wp-block-styles');
	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');
	add_theme_support('editor-styles');
	add_theme_support('post', 'page-attributes');
    add_theme_support('post-formats', array('gallery', 'video'));


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	//Register image sizes
	add_image_size( 'eazyrecruitz_370x300', 370, 300, true ); //'eazyrecruitz_370x300 Service V1'
	add_image_size( 'eazyrecruitz_270x200', 270, 200, true ); //'eazyrecruitz_270x200 Our Team'
	add_image_size( 'eazyrecruitz_370x490', 370, 490, true ); //'eazyrecruitz_370x490 Latest News'
	add_image_size( 'eazyrecruitz_60x60', 60, 60, true ); //'eazyrecruitz_60x60 Testimonials_v1'
	add_image_size( 'eazyrecruitz_348x348', 348, 348, true ); //'eazyrecruitz_348x348 Our Projcets'
	add_image_size( 'eazyrecruitz_100x100', 100, 100, true ); //'eazyrecruitz_100x100 Our Projcets widget'
	add_image_size( 'eazyrecruitz_570x570', 570, 570, true ); //'eazyrecruitz_570x570 Portfolio V1'
	add_image_size( 'eazyrecruitz_370x370', 370, 370, true ); //'eazyrecruitz_370x370 Portfolio V2'
	add_image_size( 'eazyrecruitz_570x570', 570, 570, true ); //'eazyrecruitz_370x370 Portfolio V3'
	add_image_size( 'eazyrecruitz_570x270', 570, 270, true ); //'eazyrecruitz_570x270 Portfolio V3'
	add_image_size( 'eazyrecruitz_270x570', 270, 570, true ); //'eazyrecruitz_270x570 Portfolio V3'
	add_image_size( 'eazyrecruitz_270x270', 270, 270, true ); //'eazyrecruitz_270x270 Portfolio V3'
	add_image_size( 'eazyrecruitz_442x442', 442, 442, true ); //'eazyrecruitz_442x442 Portfolio V4'
	add_image_size( 'eazyrecruitz_348x348', 348, 348, true ); //'eazyrecruitz_348x348 Portfolio V5'
	add_image_size( 'eazyrecruitz_1170x600', 1170, 600, true ); //'eazyrecruitz_1170x600 Our Blog'
	
	
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'eazyrecruitz' ),
		'rtl_menu' => esc_html__( 'RTL Menu', 'eazyrecruitz' ),
		'onepage_menu' => esc_html__( 'One Page Menu', 'eazyrecruitz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'eazyrecruitz_admin_init', 2000000 );
}

function eazyrecruitz_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'eazyrecruitz' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'eazyrecruitz' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'eazyrecruitz' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'eazyrecruitz' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'eazyrecruitz' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'eazyrecruitz' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'eazyrecruitz' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'eazyrecruitz' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'eazyrecruitz' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'eazyrecruitz_gutenberg_editor_palette_styles' );

/**
 * [eazyrecruitz_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function eazyrecruitz_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( EAZYRECRUITZ_NAME . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'eazyrecruitz' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'eazyrecruitz' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3><i class="flaticon-note"></i></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'eazyrecruitz'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'eazyrecruitz'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'eazyrecruitz'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'eazyrecruitz'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'eazyrecruitz'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'eazyrecruitz'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Four', 'eazyrecruitz'),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'eazyrecruitz'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'eazyrecruitz'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'eazyrecruitz'),
		'before_widget'=>'<div id="%1$s" class="service-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><i class="flaticon-note"></i></div>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'eazyrecruitz' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'eazyrecruitz' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h3>',
	  'after_title' => '</h3><i class="flaticon-note"></i></div>'
	));
	if ( ! is_object( eazyrecruitz_WSH() ) ) {
		return;
	}

	$sidebars = eazyrecruitz_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( eazyrecruitz_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3><i class="flaticon-note"></i></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'eazyrecruitz_widgets_init' );

/**
 * [eazyrecruitz_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function eazyrecruitz_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/**
 * [eazyrecruitz_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'eazyrecruitz_set' ) ) {
	function eazyrecruitz_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

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
function eazyrecruitz_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'eazyrecruitz_add_editor_styles' );

// Add specific CSS class by filter.
$options = eazyrecruitz_WSH()->option(); 
if( eazyrecruitz_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

function eazyrecruitz_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'eazyrecruitz_related_products_args', 20 );
  function eazyrecruitz_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}