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

// Show all Products on Products Archive Page
function products_page( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'products' ) ) {
      $query->set( 'posts_per_page', '-1' );
    }
}
add_action( 'pre_get_posts', 'products_page' );

// Show all Products on Products Taxonomy Page
function products_tax_page( $query ) {
  if (($query->is_tax(array('product-location')) ))      
  $query->set( 'posts_per_page', '-1' );
}
add_action( 'pre_get_posts', 'products_tax_page' );

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
		'page_title' 	=> 'Products Archive',
		'menu_title'	=> 'Products Archive',
		'parent_slug'	=> 'theme-general-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Projects Archive',
		'menu_title'	=> 'Projects Archive',
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
      'taxonomies' => array( 'page-attributes', 'project-locations', 'project-types', 'project-products', 'project-tags' ),
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

// Project Location Taxonomy
function register_taxonomy_project_locations() {
  
  $labels = array(
    'name' => _x( 'Project Locations', 'project-locations' ),
    'singular_name' => _x( 'Project Location', 'project-locations' ),
    'search_items' => _x( 'Search Project Locations', 'project-locations' ),
    'popular_items' => _x( 'Popular Project Locations', 'project-locations' ),
    'all_items' => _x( 'All Project Locations', 'project-locations' ),
    'parent_item' => _x( 'Parent Project Location', 'project-locations' ),
    'parent_item_colon' => _x( 'Parent Project Location:', 'project-locations' ),
    'edit_item' => _x( 'Edit Project Location', 'project-locations' ),
    'update_item' => _x( 'Update Project Location', 'project-locations' ),
    'add_new_item' => _x( 'Add New Project Location', 'project-locations' ),
    'new_item_name' => _x( 'New Project Location', 'project-locations' ),
    'separate_items_with_commas' => _x( 'Separate Project Locations with commas', 'project-locations' ),
    'add_or_remove_items' => _x( 'Add or Remove Project Locations', 'project-locations' ),
    'choose_from_most_used' => _x( 'Choose from most used Project Locations', 'project-locations' ),
    'menu_name' => _x( 'Project Locations', 'project-locations' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'project-location'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'project-locations', array('project-locations'), $args );
}

add_action( 'init', 'register_taxonomy_project_locations', 0 );

// Project Products Taxonomy
function register_taxonomy_project_products() {
  
  $labels = array(
    'name' => _x( 'Project Products', 'project-product' ),
    'singular_name' => _x( 'Project Product', 'project-product' ),
    'search_items' => _x( 'Search Project Products', 'project-product' ),
    'popular_items' => _x( 'Popular Project Products', 'project-product' ),
    'all_items' => _x( 'All Project Products', 'project-product' ),
    'parent_item' => _x( 'Parent Project Product', 'project-product' ),
    'parent_item_colon' => _x( 'Parent Project Product:', 'project-product' ),
    'edit_item' => _x( 'Edit Project Product', 'project-product' ),
    'update_item' => _x( 'Update Project Product', 'project-product' ),
    'add_new_item' => _x( 'Add New Project Product', 'project-product' ),
    'new_item_name' => _x( 'New Project Product', 'project-product' ),
    'separate_items_with_commas' => _x( 'Separate Project Products with commas', 'project-product' ),
    'add_or_remove_items' => _x( 'Add or Remove Project Products', 'project-product' ),
    'choose_from_most_used' => _x( 'Choose from most used Project Products', 'project-product' ),
    'menu_name' => _x( 'Project Products', 'project-product' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'project-product'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'project-products', array('project-products'), $args );
}

add_action( 'init', 'register_taxonomy_project_products', 0 );

// Project Tags Taxonomy
function register_taxonomy_project_tags() {
  
  $labels = array(
    'name' => _x( 'Project Tags', 'project-tags' ),
    'singular_name' => _x( 'Project Tag', 'project-tags' ),
    'search_items' => _x( 'Search Project Tags', 'project-tags' ),
    'popular_items' => _x( 'Popular Project Tags', 'project-tags' ),
    'all_items' => _x( 'All Project Tags', 'project-tags' ),
    'parent_item' => _x( 'Parent Project Tag', 'project-tags' ),
    'parent_item_colon' => _x( 'Parent Project Tag:', 'project-tags' ),
    'edit_item' => _x( 'Edit Project Tag', 'project-tags' ),
    'update_item' => _x( 'Update Project Tag', 'project-tags' ),
    'add_new_item' => _x( 'Add New Project Tag', 'project-tags' ),
    'new_item_name' => _x( 'New Project Tag', 'project-tags' ),
    'separate_items_with_commas' => _x( 'Separate Project Tags with commas', 'project-tags' ),
    'add_or_remove_items' => _x( 'Add or Remove Project Tags', 'project-tags' ),
    'choose_from_most_used' => _x( 'Choose from most used Project Tags', 'project-tags' ),
    'menu_name' => _x( 'Project Tags', 'project-tags' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'project-tag'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'project-tags', array('project-tags'), $args );
}

add_action( 'init', 'register_taxonomy_project_tags', 0 );

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
    'hierarchical' => true,
    'description' => 'This post type will be used to house the Products.',
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
    'taxonomies' => array( 'page-attributes', 'product-location', 'product-category', 'site-conditions', 'mountings', 'weather-conditions', 'budgets' ),
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
    'capability_type' => 'page',
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

// Product Category Taxonomy
function register_taxonomy_product_category() {
  
  $labels = array(
    'name' => _x( 'Product Categories', 'product-categories' ),
    'singular_name' => _x( 'Product Category', 'product-categories' ),
    'search_items' => _x( 'Search Product Categories', 'product-categories' ),
    'popular_items' => _x( 'Popular Product Categories', 'product-categories' ),
    'all_items' => _x( 'All Product Categories', 'product-categories' ),
    'parent_item' => _x( 'Parent Product Category', 'product-categories' ),
    'parent_item_colon' => _x( 'Parent Product Category:', 'product-categories' ),
    'edit_item' => _x( 'Edit Product Category', 'product-categories' ),
    'update_item' => _x( 'Update Product Category', 'product-categories' ),
    'add_new_item' => _x( 'Add New Product Category', 'product-categories' ),
    'new_item_name' => _x( 'New Product Category', 'product-categories' ),
    'separate_items_with_commas' => _x( 'Separate Product Categories with commas', 'product-categories' ),
    'add_or_remove_items' => _x( 'Add or Remove Product Categories', 'product-categories' ),
    'choose_from_most_used' => _x( 'Choose from most used Product Categories', 'product-categories' ),
    'menu_name' => _x( 'Product Categories', 'product-categories' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'product-category'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'product-category', array('product-category'), $args );
}

add_action( 'init', 'register_taxonomy_product_category', 0 );

// Product Site Condition Taxonomy
function register_taxonomy_product_site_conditions() {
  
  $labels = array(
    'name' => _x( 'Site Conditions', 'site-conditions' ),
    'singular_name' => _x( 'Site Condition', 'site-conditions' ),
    'search_items' => _x( 'Search Site Conditions', 'site-conditions' ),
    'popular_items' => _x( 'Popular Site Conditions', 'site-conditions' ),
    'all_items' => _x( 'All Site Conditions', 'site-conditions' ),
    'parent_item' => _x( 'Parent Site Condition', 'site-conditions' ),
    'parent_item_colon' => _x( 'Parent Site Condition:', 'site-conditions' ),
    'edit_item' => _x( 'Edit Site Condition', 'site-conditions' ),
    'update_item' => _x( 'Update Site Condition', 'site-conditions' ),
    'add_new_item' => _x( 'Add New Site Condition', 'site-conditions' ),
    'new_item_name' => _x( 'New Site Condition', 'site-conditions' ),
    'separate_items_with_commas' => _x( 'Separate Site Conditions with commas', 'site-conditions' ),
    'add_or_remove_items' => _x( 'Add or Remove Site Conditions', 'site-conditions' ),
    'choose_from_most_used' => _x( 'Choose from most used Site Conditions', 'site-conditions' ),
    'menu_name' => _x( 'Site Conditions', 'site-conditions' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'site-conditions'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'site-conditions', array('site-conditions'), $args );
}

add_action( 'init', 'register_taxonomy_product_site_conditions', 0 );

// Product Mounting Taxonomy
function register_taxonomy_product_mountings() {
  
  $labels = array(
    'name' => _x( 'Mountings', 'mountings' ),
    'singular_name' => _x( 'Mounting', 'mountings' ),
    'search_items' => _x( 'Search Mountings', 'mountings' ),
    'popular_items' => _x( 'Popular Mountings', 'mountings' ),
    'all_items' => _x( 'All Mountings', 'mountings' ),
    'parent_item' => _x( 'Parent Mounting', 'mountings' ),
    'parent_item_colon' => _x( 'Parent Mounting:', 'mountings' ),
    'edit_item' => _x( 'Edit Mounting', 'mountings' ),
    'update_item' => _x( 'Update Mounting', 'mountings' ),
    'add_new_item' => _x( 'Add New Mounting', 'mountings' ),
    'new_item_name' => _x( 'New Mounting', 'mountings' ),
    'separate_items_with_commas' => _x( 'Separate Mountings with commas', 'mountings' ),
    'add_or_remove_items' => _x( 'Add or Remove Mountings', 'mountings' ),
    'choose_from_most_used' => _x( 'Choose from most used Mountings', 'mountings' ),
    'menu_name' => _x( 'Mountings', 'mountings' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'mountings'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'mountings', array('mountings'), $args );
}

add_action( 'init', 'register_taxonomy_product_mountings', 0 );

// Product Weather Taxonomy
function register_taxonomy_product_weather() {
  
  $labels = array(
    'name' => _x( 'Weather Conditions', 'weather-conditions' ),
    'singular_name' => _x( 'Weather Condition', 'weather-conditions' ),
    'search_items' => _x( 'Search Weather Conditions', 'weather-conditions' ),
    'popular_items' => _x( 'Popular Weather Conditions', 'weather-conditions' ),
    'all_items' => _x( 'All Weather Conditions', 'weather-conditions' ),
    'parent_item' => _x( 'Parent Weather Condition', 'weather-conditions' ),
    'parent_item_colon' => _x( 'Parent Weather Condition:', 'weather-conditions' ),
    'edit_item' => _x( 'Edit Weather Condition', 'weather-conditions' ),
    'update_item' => _x( 'Update Weather Condition', 'weather-conditions' ),
    'add_new_item' => _x( 'Add New Weather Condition', 'weather-conditions' ),
    'new_item_name' => _x( 'New Weather Condition', 'weather-conditions' ),
    'separate_items_with_commas' => _x( 'Separate Weather Conditions with commas', 'weather-conditions' ),
    'add_or_remove_items' => _x( 'Add or Remove Weather Conditions', 'weather-conditions' ),
    'choose_from_most_used' => _x( 'Choose from most used Weather Condition', 'weather-conditions' ),
    'menu_name' => _x( 'Weather Conditions', 'weather-conditions' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'weather-conditions'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'weather-conditions', array('weather-conditions'), $args );
}

add_action( 'init', 'register_taxonomy_product_weather', 0 );

// Product Budget Taxonomy
function register_taxonomy_product_budgets() {
  
  $labels = array(
    'name' => _x( 'Budgets', 'budgets' ),
    'singular_name' => _x( 'Budget', 'budgets' ),
    'search_items' => _x( 'Search Budgets', 'budgets' ),
    'popular_items' => _x( 'Popular Budgets', 'budgets' ),
    'all_items' => _x( 'All Budgets', 'budgets' ),
    'parent_item' => _x( 'Parent Budget', 'budgets' ),
    'parent_item_colon' => _x( 'Parent Budget:', 'budgets' ),
    'edit_item' => _x( 'Edit Budget', 'budgets' ),
    'update_item' => _x( 'Update Budget', 'budgets' ),
    'add_new_item' => _x( 'Add New Budget', 'budgets' ),
    'new_item_name' => _x( 'New Budget', 'budgets' ),
    'separate_items_with_commas' => _x( 'Separate Budgets with commas', 'budgets' ),
    'add_or_remove_items' => _x( 'Add or Remove Budgets', 'budgets' ),
    'choose_from_most_used' => _x( 'Choose from most used Budget', 'budgets' ),
    'menu_name' => _x( 'Budgets', 'budgets' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'rewrite'  => array('slug' => 'budgets'),
    'query_var' => true,
    'show_in_rest' => true
  );

  register_taxonomy( 'budgets', array('budgets'), $args );
}

add_action( 'init', 'register_taxonomy_product_budgets', 0 );

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
