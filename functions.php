<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/* Move Yoast to bottom */
function yoasttobottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/* Adding ACF Options Page */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog Archive',
		'menu_title'	=> 'Blog Archive',
		'parent_slug'	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}

// New Custom Post Types
// Projects CPT
function register_cpt_projects() {

    $labels = array(
      'name' => _x( 'Projects', 'projects' ),
      'singular_name' => _x( 'Project', 'projects' ),
      'add_new' => _x( 'Add Project', 'projects' ),
      'add_new_item' => _x( 'Add New Project', 'projects' ),
      'edit_item' => _x( 'Edit Project', 'projects' ),
      'new_item' => _x( 'New Project', 'projects' ),
      'view_item' => _x( 'View Project', 'projects' ),
      'search_items' => _x( 'Search Projects', 'projects' ),
      'not_found' => _x( 'No Projects found', 'projects' ),
      'not_found_in_trash' => _x( 'No Projects found in Trash', 'projects' ),
      'parent_item_colon' => _x( 'Parent Project:', 'projects' ),
      'menu_name' => _x( 'Projects', 'projects' ),
    );
  
    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'This post type will be used to house the Projects.',
      'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
      'taxonomies' => array( 'page-attributes', 'project-types' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 20,
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite'  => array('slug' => 'projects'),
      'capability_type' => 'post',
      'menu_icon'=> 'dashicons-hammer'
    );
  
    register_post_type( 'projects', $args );
  }
  
  add_action( 'init', 'register_cpt_projects' );

// Project Type Taxonomy
function register_taxonomy_project_types() {
  
  $labels = array(
    'name' => _x( 'Project Types', 'project-types' ),
    'singular_name' => _x( 'Project Type', 'project-types' ),
    'search_items' => _x( 'Search Project Types', 'project-types' ),
    'popular_items' => _x( 'Popular Project Types', 'project-types' ),
    'all_items' => _x( 'All Project Types', 'project-types' ),
    'parent_item' => _x( 'Parent Project Type', 'project-types' ),
    'parent_item_colon' => _x( 'Parent Project Type:', 'project-types' ),
    'edit_item' => _x( 'Edit Project Type', 'project-types' ),
    'update_item' => _x( 'Update Project Type', 'project-types' ),
    'add_new_item' => _x( 'Add New Project Type', 'project-types' ),
    'new_item_name' => _x( 'New Project Type', 'project-types' ),
    'separate_items_with_commas' => _x( 'Separate Project Types with commas', 'project-types' ),
    'add_or_remove_items' => _x( 'Add or Remove Project Types', 'project-types' ),
    'choose_from_most_used' => _x( 'Choose from most used Project Types', 'project-types' ),
    'menu_name' => _x( 'Project Types', 'project-types' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'project-type'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'project-types', array('project-types'), $args );
}

add_action( 'init', 'register_taxonomy_project_types', 0 );

// Products CPT
function register_cpt_products() {

  $labels = array(
    'name' => _x( 'Products', 'products' ),
    'singular_name' => _x( 'Product', 'products' ),
    'add_new' => _x( 'Add Product', 'products' ),
    'add_new_item' => _x( 'Add New Product', 'products' ),
    'edit_item' => _x( 'Edit Product', 'products' ),
    'new_item' => _x( 'New Product', 'products' ),
    'view_item' => _x( 'View Product', 'products' ),
    'search_items' => _x( 'Search Products', 'products' ),
    'not_found' => _x( 'No Products found', 'products' ),
    'not_found_in_trash' => _x( 'No Products found in Trash', 'products' ),
    'parent_item_colon' => _x( 'Parent Product:', 'products' ),
    'menu_name' => _x( 'Products', 'products' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'This post type will be used to house the Products.',
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
    'taxonomies' => array( 'page-attributes', 'product-location' ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 20,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite'  => array('slug' => 'products'),
    'capability_type' => 'post',
    'menu_icon'=> 'dashicons-store'
  );

  register_post_type( 'products', $args );
}

add_action( 'init', 'register_cpt_products' );

// Product Location Category Taxonomy
function register_taxonomy_product_location() {
  
  $labels = array(
    'name' => _x( 'Product Locations', 'product-locations' ),
    'singular_name' => _x( 'Product Location', 'product-locations' ),
    'search_items' => _x( 'Search Product Locations', 'product-locations' ),
    'popular_items' => _x( 'Popular Product Locations', 'product-locations' ),
    'all_items' => _x( 'All Product Locations', 'product-locations' ),
    'parent_item' => _x( 'Parent Product Location', 'product-locations' ),
    'parent_item_colon' => _x( 'Parent Product Location:', 'product-locations' ),
    'edit_item' => _x( 'Edit Product Location', 'product-locations' ),
    'update_item' => _x( 'Update Product Location', 'product-locations' ),
    'add_new_item' => _x( 'Add New Product Location', 'product-locations' ),
    'new_item_name' => _x( 'New Product Location', 'product-locations' ),
    'separate_items_with_commas' => _x( 'Separate Product Locations with commas', 'product-locations' ),
    'add_or_remove_items' => _x( 'Add or Remove Product Locations', 'product-locations' ),
    'choose_from_most_used' => _x( 'Choose from most used Product Locations', 'product-locations' ),
    'menu_name' => _x( 'Product Locations', 'product-locations' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'product-location'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'product-location', array('product-location'), $args );
}

add_action( 'init', 'register_taxonomy_product_location', 0 );

// Locations CPT
function register_cpt_locations() {

  $labels = array(
    'name' => _x( 'Locations', 'locations' ),
    'singular_name' => _x( 'Location', 'locations' ),
    'add_new' => _x( 'Add Location', 'locations' ),
    'add_new_item' => _x( 'Add New Location', 'locations' ),
    'edit_item' => _x( 'Edit Location', 'locations' ),
    'new_item' => _x( 'New Location', 'locations' ),
    'view_item' => _x( 'View Location', 'locations' ),
    'search_items' => _x( 'Search Locations', 'locations' ),
    'not_found' => _x( 'No Locations found', 'locations' ),
    'not_found_in_trash' => _x( 'No Locations found in Trash', 'locations' ),
    'parent_item_colon' => _x( 'Parent Location:', 'locations' ),
    'menu_name' => _x( 'Locations', 'locations' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'This post type will be used to house the Locations.',
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
    'taxonomies' => array( 'page-attributes' ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 20,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite'  => array('slug' => 'office'),
    'capability_type' => 'post',
    'menu_icon'=> 'dashicons-building'
  );

  register_post_type( 'locations', $args );
}

add_action( 'init', 'register_cpt_locations' );
