<?php

return array(
	'id'     => 'eazyrecruitz_banner_settings',
	'title'  => esc_html__( "Eazyrecruitz Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'eazyrecruitz' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'eazyrecruitz' ),
				'e' => esc_html__( 'Elementor', 'eazyrecruitz' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'eazyrecruitz' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'eazyrecruitz' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'eazyrecruitz' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_text',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Banner Section Description', 'eazyrecruitz' ),
			'desc'     => esc_html__( 'Enter the Description to show in banner section', 'eazyrecruitz' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'eazyrecruitz' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'eazyrecruitz' ),
			'default'  => array(
				'url' => EAZYRECRUITZ_URI . 'assets/images/background/page-title.jpg',
			),
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);