<?php
return array(
	'title'      => 'Eazyrecruitz Setting',
	'id'         => 'eazyrecruitz_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'eazyrecruitz_team', 'eazyrecruitz_service', 'eazyrecruitz_project', 'eazyrecruitz_jobs' ),
	'sections'   => array(
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once EAZYRECRUITZPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);