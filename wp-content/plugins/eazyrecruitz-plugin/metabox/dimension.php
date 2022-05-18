<?php
	return array(
		'title'      => 'eazyrecruitz post Setting',
		'id'         => 'eazyrecruitz_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'       => 'gallery_imgs',
						'type'     => 'gallery',
						'url'      => true,
						'title'    => esc_html__('Gallery Images Image', 'eazyrecruitz'),
						'desc'     => esc_html__('Insert Gallery Images Image URl', 'eazyrecruitz'),
					),
					array(
						'id'    => 'video_link',
						'type'  => 'textarea',
						'title' => esc_html__('Video Link', 'eazyrecruitz'),
					),
				),
			),
		),
	);


?>