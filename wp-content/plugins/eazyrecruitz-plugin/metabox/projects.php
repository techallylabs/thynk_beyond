<?php
return array(
	'title'      => 'Eazyrecruitz Project Setting',
	'id'         => 'eazyrecruitz_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'eazyrecruitz_project' ),
	'sections'   => array(
		array(
			'id'     => 'eazyrecruitz_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'eazyrecruitz' ),
					'options'  => array(
						'extra_width_height' => esc_html__( 'Extra Width Height', 'eazyrecruitz' ),
						'extra_width' => esc_html__( 'Extra Width', 'eazyrecruitz' ),
						'extra_height' => esc_html__( 'Extra Height', 'eazyrecruitz' ),
						'normal_height' => esc_html__( 'Normal Size', 'eazyrecruitz' ),
					),
					'default'  => 'normal_height',
				),
			),
		),
	),
);