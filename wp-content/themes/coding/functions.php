<?php

/* Include custom style */
function add_theme_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/custom.css' );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/* Include menu */
function register_my_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}

add_action( 'init', 'register_my_menu' );

/* Custom Post Type Start */
function create_posttype() {
	register_post_type( 'movies',

//CPT Options
		array(
			'labels'      => array(
				'name'          => __( 'Movies' ),
				'singular_name' => __( 'movies' )
			),
			'public'      => true,
			'has_archive' => false,
			'rewrite'     => array( 'slug' => 'movies' ),
		)
	);
}

/* Hooking up function to theme setup. When creating custom post types, is necessary to use init
 for hook in add_action() and the register_post_type() function will take the arguments. */
add_action( 'init', 'create_posttype' );


function cw_post_type_movies() {
	//$supports: Specifies that the post type is compatible and supports all essential feature
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields by default, will create custom C.f. below
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
	);

	//$labels: Specifies that the post type is referred correctly to the admin area.
	$labels = array(
		'name'           => _x( 'movies', 'plural' ),
		'singular_name'  => _x( 'movies', 'singular' ),
		'menu_name'      => _x( 'Movies', 'admin menu' ),
		'name_admin_bar' => _x( 'movies', 'admin bar' ),
		'add_new'        => _x( 'Add New', 'add new' ),
		'add_new_item'   => __( 'Add New movies' ),
		'new_item'       => __( 'New movies' ),
		'edit_item'      => __( 'Edit movies' ),
		'view_item'      => __( 'View movies' ),
		'all_items'      => __( 'All movies' ),
		'search_items'   => __( 'Search movies' ),
		'not_found'      => __( 'No movies found.' ),
	);

	//$args: Specifies a permalink slug of the movies and a menu position located just beneath the Posts menu.
	$args = array(
		'supports'     => $supports,
		'labels'       => $labels,
		'public'       => true,
		'query_var'    => true,
		'rewrite'      => array( 'slug' => 'movies' ),
		'has_archive'  => true,
		'hierarchical' => false,
	);

	register_post_type( 'movies', $args );
}

add_action( 'init', 'cw_post_type_movies' );

/**
 * Register meta boxes.
 */
function cf_register_meta_boxes() {
	add_meta_box( 'cf-1', __( 'Add Custom Field', 'cf' ), 'cf_display_callback', 'movies' );
}

add_action( 'add_meta_boxes', 'cf_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function cf_display_callback( $post ) {
	include plugin_dir_path( __FILE__ ) . '/fields-form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function cf_save_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( $parent_id = wp_is_post_revision( $post_id ) ) {
		$post_id = $parent_id;
	}
	$fields = [
		'cf_movies_title',
	];
	foreach ( $fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
}

add_action( 'save_post', 'cf_save_meta_box' );
