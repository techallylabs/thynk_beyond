<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'eazyrecruitz' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'eazyrecruitz' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'eazyrecruitz' ),
				'e' => esc_html__( 'Elementor', 'eazyrecruitz' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'eazyrecruitz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'eazyrecruitz' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'eazyrecruitz' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'eazyrecruitz' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'eazyrecruitz' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'eazyrecruitz' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'eazyrecruitz' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
				'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'eazyrecruitz' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'footer_bg_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Image', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'newsletter_title_v1',
			'type'    => 'text',
			'title'   => __( 'Newsletter Form Title', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Newsletter Form Title', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'newsletter_form_id_v1',
			'type'    => 'text',
			'title'   => __( 'Newsletter Form ID', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Newsletter Form ID', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the raw html', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_logo_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'copyright_text_v2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'    => 'footer_v2_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'copyright_text_v3',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_menu_3',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the raw html', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'       => 'footer_bg_img_v4',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Image', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'newsletter_title_v4',
			'type'    => 'text',
			'title'   => __( 'Newsletter Form Title', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Newsletter Form Title', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'newsletter_form_id_v4',
			'type'    => 'text',
			'title'   => __( 'Newsletter Form ID', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Newsletter Form ID', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'copyright_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'eazyrecruitz' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_menu_v4',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enter the raw html', 'eazyrecruitz' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
