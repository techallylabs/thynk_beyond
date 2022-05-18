<?php
return array(
	'title'      => 'Eazyrecruitz Team Setting',
	'id'         => 'eazyrecruitz_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'eazyrecruitz_team' ),
	'sections'   => array(
		array(
			'id'     => 'eazyrecruitz_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'signature_title',
					'type'  => 'text',
					'title' => esc_html__( 'Image Caption Title', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'External Link', 'eazyrecruitz' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'eazyrecruitz' ),
				),
			),
		),
	),
);