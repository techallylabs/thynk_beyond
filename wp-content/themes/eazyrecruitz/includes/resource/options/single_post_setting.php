<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'eazyrecruitz' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'eazyrecruitz' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'eazyrecruitz' ),
				'e' => esc_html__( 'Elementor', 'eazyrecruitz' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'eazyrecruitz' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'eazyrecruitz' ),
			'default' => false,
		),

		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_tag',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tags', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show post tags on posts single page', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_links',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'eazyrecruitz' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'eazyrecruitz' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'eazyrecruitz' ),
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





