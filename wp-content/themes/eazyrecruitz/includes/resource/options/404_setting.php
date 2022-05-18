<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'eazyrecruitz' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'eazyrecruitz' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'eazyrecruitz' ),
				'e' => esc_html__( 'Elementor', 'eazyrecruitz' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'eazyrecruitz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'eazyrecruitz' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'error_page_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Error Page Image', 'eazyrecruitz' ),
			'desc'     => esc_html__( 'Insert Error Page image for banner', 'eazyrecruitz' ),
		),
		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'eazyrecruitz' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'eazyrecruitz' ),
		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'eazyrecruitz' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'eazyrecruitz' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'eazyrecruitz' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'eazyrecruitz' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'eazyrecruitz' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'eazyrecruitz' ),
			'default'  => esc_html__( 'Back To Home', 'eazyrecruitz' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);