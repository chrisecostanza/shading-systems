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
		'page_title' 	=> 'Location Dropdown',
		'menu_title'	=> 'Location Dropdown',
		'parent_slug'	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'CTA Contact Form',
		'menu_title'	=> 'CTA Contact Form',
		'parent_slug'	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}

// New Custom Post Types
// Team Members CPT
function register_cpt_team_members() {

    $labels = array(
      'name' => _x( 'Team Members', 'team-members' ),
      'singular_name' => _x( 'Team Member', 'team-members' ),
      'add_new' => _x( 'Add Team Member', 'team-members' ),
      'add_new_item' => _x( 'Add New Team Member', 'team-members' ),
      'edit_item' => _x( 'Edit Team Member', 'team-members' ),
      'new_item' => _x( 'New Team Member', 'team-members' ),
      'view_item' => _x( 'View Team Member', 'team-members' ),
      'search_items' => _x( 'Search Team Members', 'team-members' ),
      'not_found' => _x( 'No Team Members found', 'team-members' ),
      'not_found_in_trash' => _x( 'No Team Members found in Trash', 'team-members' ),
      'parent_item_colon' => _x( 'Parent Team Member:', 'team-members' ),
      'menu_name' => _x( 'Team Members', 'team-members' ),
    );
  
    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'This post type will be used to house the Team Members.',
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
      'rewrite'  => array('slug' => 'team'),
      'capability_type' => 'post',
      'menu_icon'=> 'dashicons-nametag'
    );
  
    register_post_type( 'team-members', $args );
  }
  
  add_action( 'init', 'register_cpt_team_members' );
