<?php
return array(
	'title'      => 'Eazyrecruitz Job Setting',
	'id'         => 'eazyrecruitz_meta_jobs',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'eazyrecruitz_jobs' ),
	'sections'   => array(
		array(
			'id'     => 'eazyrecruitz_jobs_meta_setting',
			'fields' => array(
				array(
					'id'    => 'location',
					'type'  => 'textarea',
					'title' => esc_html__( 'Location', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'salry',
					'type'  => 'text',
					'title' => esc_html__( 'Salary', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'exp',
					'type'  => 'textarea',
					'title' => esc_html__( 'EXPERIENCE', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'job',
					'type'  => 'text',
					'title' => esc_html__( 'Job Number', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'web',
					'type'  => 'text',
					'title' => esc_html__( 'Website', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'date',
					'type'  => 'text',
					'title' => esc_html__( 'Apply before Date', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'bookmark',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Bookmark Link', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'upload',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Upload Link', 'eazyrecruitz' ),
				),
				array(
					'id'       => 'show_related_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Related Post', 'eazyrecruitz' ),
					'default'  => false,
				),
			),
		),
	),
);