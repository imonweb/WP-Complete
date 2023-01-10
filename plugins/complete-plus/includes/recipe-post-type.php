<?php 

function up_recipe_post_type() {
  $labels = array(
		'name'                  => _x( 'Recipes', 'Post type general name', 'complete-plus' ),
		'singular_name'         => _x( 'Recipe', 'Post type singular name', 'complete-plus' ),
		'menu_name'             => _x( 'Recipes', 'Admin Menu text', 'complete-plus' ),
		'name_admin_bar'        => _x( 'Recipe', 'Add New on Toolbar', 'complete-plus' ),
		'add_new'               => __( 'Add New', 'complete-plus' ),
		'add_new_item'          => __( 'Add New Recipe', 'complete-plus' ),
		'new_item'              => __( 'New Recipe', 'complete-plus' ),
		'edit_item'             => __( 'Edit Recipe', 'complete-plus' ),
		'view_item'             => __( 'View Recipe', 'complete-plus' ),
		'all_items'             => __( 'All Recipes', 'complete-plus' ),
		'search_items'          => __( 'Search Recipes', 'complete-plus' ),
		'parent_item_colon'     => __( 'Parent Recipes:', 'complete-plus' ),
		'not_found'             => __( 'No Recipes found.', 'complete-plus' ),
		'not_found_in_trash'    => __( 'No Recipes found in Trash.', 'complete-plus' ),
		'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'complete-plus' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'complete-plus' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'complete-plus' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'complete-plus' ),
		'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'complete-plus' ),
		'insert_into_item'      => _x( 'Insert into Recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'complete-plus' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'complete-plus' ),
		'filter_items_list'     => _x( 'Filter Recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'complete-plus' ),
		'items_list_navigation' => _x( 'Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'complete-plus' ),
		'items_list'            => _x( 'Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'complete-plus' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'recipe' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
    'show_in_rest'       => true,
    'description'        => __('A custom post type for recipes', 'complete-plus'),
    'taxonomies'         => ['category', 'post_tag']
	);

	register_post_type( 'recipe', $args );

  register_taxonomy( 'cuisine', 'recipe', [
    'label'         =>  __('Cuisine', 'complete-plus'),
    'rewrite'       =>  ['slug' => 'cuisine'],
    'show_in_rest'  =>  true
  ]);

	register_term_meta( 'cuisine', 'more_info_url', [
		'type' 					=> 'string',
		'description' 	=> __('A URL for more information on a cuisine', 'complete-plus'),
		'single'				=> true,
		'show_in_rest'	=> true,
		'default'				=> '#'
	]);
	
  
}