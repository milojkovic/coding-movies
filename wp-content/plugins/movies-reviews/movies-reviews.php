<?php
/**
 * Plugin Name: Movies Reviews
 * Plugin URI: https://www.test.com/
 * Description: A custom movies review plugin built for exam.
 * Version: 1.0
 * Author: Milos
 * Author URI: http://test.com/
 **/

// Register the Custom Movies Review Post Type
function register_cpt_movies_review() {

	$labels = array(
		'name'               => _x( 'Movies Reviews', 'movies_review' ),
		'singular_name'      => _x( 'Movies Review', 'movies_review' ),
		'add_new'            => _x( 'Add New', 'movies_review' ),
		'add_new_item'       => _x( 'Add New Movies Review', 'movies_review' ),
		'edit_item'          => _x( 'Edit Movies Review', 'movies_review' ),
		'new_item'           => _x( 'New Movies Review', 'movies_review' ),
		'view_item'          => _x( 'View Movies Review', 'movies_review' ),
		'search_items'       => _x( 'Search Movies Reviews', 'movies_review' ),
		'not_found'          => _x( 'No Movies reviews found', 'movies_review' ),
		'not_found_in_trash' => _x( 'No Movies reviews found in Trash', 'movies_review' ),
		'parent_item_colon'  => _x( 'Parent Movies Review:', 'movies_review' ),
		'menu_name'          => _x( 'Movies Reviews', 'movies_review' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => true,
		'description'         => 'Movies reviews filterable by genre',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'page-attributes'
		),
		'taxonomies'          => array( 'genres' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-audio',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post'
	);

	register_post_type( 'movies_review', $args );
}

add_action( 'init', 'register_cpt_movies_review' );

//Registering a new Taxonomy
function genres_taxonomy() {
	register_taxonomy(
		'genres',
		'movies_review',
		array(
			'hierarchical' => true,
			'label'        => 'Genres',
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'genre',
				'with_front' => false
			)
		)
	);
}

add_action( 'init', 'genres_taxonomy' );

// Function used to automatically create Movies Reviews page.
function create_movies_review_pages() {
	//post status and options
	$post = array(
		'comment_status' => 'open',
		'ping_status'    => 'closed',
		'post_date'      => date( 'Y-m-d H:i:s' ),
		'post_name'      => 'movies_review',
		'post_status'    => 'publish',
		'post_title'     => 'Movies Reviews',
		'post_type'      => 'page',
	);
	//insert page and save the id
	$newvalue = wp_insert_post( $post, false );
	//save the id in the database
	update_option( 'mrpage', $newvalue );
}

// Activates function if plugin is activated
register_activation_hook( __FILE__, 'create_movies_review_pages' );
