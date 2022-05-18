<?php

namespace EAZYRECRUITZPLUGIN\Inc;


use EAZYRECRUITZPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpeazyrecruitz' ),
			'singular_name'     => _x( 'Project Category', 'wpeazyrecruitz' ),
			'search_items'      => __( 'Search Category', 'wpeazyrecruitz' ),
			'all_items'         => __( 'All Categories', 'wpeazyrecruitz' ),
			'parent_item'       => __( 'Parent Category', 'wpeazyrecruitz' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeazyrecruitz' ),
			'edit_item'         => __( 'Edit Category', 'wpeazyrecruitz' ),
			'update_item'       => __( 'Update Category', 'wpeazyrecruitz' ),
			'add_new_item'      => __( 'Add New Category', 'wpeazyrecruitz' ),
			'new_item_name'     => __( 'New Category Name', 'wpeazyrecruitz' ),
			'menu_name'         => __( 'Project Category', 'wpeazyrecruitz' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'eazyrecruitz_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpeazyrecruitz' ),
			'singular_name'     => _x( 'Service Category', 'wpeazyrecruitz' ),
			'search_items'      => __( 'Search Category', 'wpeazyrecruitz' ),
			'all_items'         => __( 'All Categories', 'wpeazyrecruitz' ),
			'parent_item'       => __( 'Parent Category', 'wpeazyrecruitz' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeazyrecruitz' ),
			'edit_item'         => __( 'Edit Category', 'wpeazyrecruitz' ),
			'update_item'       => __( 'Update Category', 'wpeazyrecruitz' ),
			'add_new_item'      => __( 'Add New Category', 'wpeazyrecruitz' ),
			'new_item_name'     => __( 'New Category Name', 'wpeazyrecruitz' ),
			'menu_name'         => __( 'Service Category', 'wpeazyrecruitz' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'eazyrecruitz_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpeazyrecruitz' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpeazyrecruitz' ),
			'search_items'      => __( 'Search Category', 'wpeazyrecruitz' ),
			'all_items'         => __( 'All Categories', 'wpeazyrecruitz' ),
			'parent_item'       => __( 'Parent Category', 'wpeazyrecruitz' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeazyrecruitz' ),
			'edit_item'         => __( 'Edit Category', 'wpeazyrecruitz' ),
			'update_item'       => __( 'Update Category', 'wpeazyrecruitz' ),
			'add_new_item'      => __( 'Add New Category', 'wpeazyrecruitz' ),
			'new_item_name'     => __( 'New Category Name', 'wpeazyrecruitz' ),
			'menu_name'         => __( 'Testimonials Category', 'wpeazyrecruitz' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'eazy_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpeazyrecruitz' ),
			'singular_name'     => _x( 'Team Category', 'wpeazyrecruitz' ),
			'search_items'      => __( 'Search Category', 'wpeazyrecruitz' ),
			'all_items'         => __( 'All Categories', 'wpeazyrecruitz' ),
			'parent_item'       => __( 'Parent Category', 'wpeazyrecruitz' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeazyrecruitz' ),
			'edit_item'         => __( 'Edit Category', 'wpeazyrecruitz' ),
			'update_item'       => __( 'Update Category', 'wpeazyrecruitz' ),
			'add_new_item'      => __( 'Add New Category', 'wpeazyrecruitz' ),
			'new_item_name'     => __( 'New Category Name', 'wpeazyrecruitz' ),
			'menu_name'         => __( 'Team Category', 'wpeazyrecruitz' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'eazyrecruitz_team', $args );
		
		//Job Taxonomy Start
		$labels = array(
			'name'              => _x( 'Jobs Category', 'wpeazyrecruitz' ),
			'singular_name'     => _x( 'Job Category', 'wpeazyrecruitz' ),
			'search_items'      => __( 'Search Category', 'wpeazyrecruitz' ),
			'all_items'         => __( 'All Categories', 'wpeazyrecruitz' ),
			'parent_item'       => __( 'Parent Category', 'wpeazyrecruitz' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeazyrecruitz' ),
			'edit_item'         => __( 'Edit Category', 'wpeazyrecruitz' ),
			'update_item'       => __( 'Update Category', 'wpeazyrecruitz' ),
			'add_new_item'      => __( 'Add New Category', 'wpeazyrecruitz' ),
			'new_item_name'     => __( 'New Category Name', 'wpeazyrecruitz' ),
			'menu_name'         => __( 'Job Category', 'wpeazyrecruitz' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'jobs_cat' ),
		);


		register_taxonomy( 'jobs_cat', 'eazyrecruitz_jobs', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpeazyrecruitz' ),
			'singular_name'     => _x( 'Faq Category', 'wpeazyrecruitz' ),
			'search_items'      => __( 'Search Category', 'wpeazyrecruitz' ),
			'all_items'         => __( 'All Categories', 'wpeazyrecruitz' ),
			'parent_item'       => __( 'Parent Category', 'wpeazyrecruitz' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeazyrecruitz' ),
			'edit_item'         => __( 'Edit Category', 'wpeazyrecruitz' ),
			'update_item'       => __( 'Update Category', 'wpeazyrecruitz' ),
			'add_new_item'      => __( 'Add New Category', 'wpeazyrecruitz' ),
			'new_item_name'     => __( 'New Category Name', 'wpeazyrecruitz' ),
			'menu_name'         => __( 'Faq Category', 'wpeazyrecruitz' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'eazyrecruitz_faqs', $args );
	}
	
}
