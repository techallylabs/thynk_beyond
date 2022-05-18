<?php
return array(
	'title'      => 'Eazyrecruitz Service Setting',
	'id'         => 'eazyrecruitz_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'eazyrecruitz_service' ),
	'sections'   => array(
		array(
			'id'     => 'eazyrecruitz_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Service Icon Image', 'eazyrecruitz' ),
					'desc'     => esc_html__( 'Insert Service Icon Image URl', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'eazyrecruitz' ),
				),
			),
		),
	),
);