<?php
/**
 * Theme functions and definitions.
 */
function eazyrecruitz_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'eazyrecruitz-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'eazyrecruitz-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'eazyrecruitz-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'eazyrecruitz-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'eazyrecruitz_child_enqueue_styles' );