<?php

/**
 * Plugin Name: Core Functions
 * Description: This plugin contains site's core functions so that it is theme independent. It should always be activated.
 * Version: 1.0.0
 * Author: Monoscopic Studio
 * Author URI: https://monoscopic.net/
 * Text Domain: core-functions
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/**
 * Disable Gutenberg.
 */

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');

// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');

add_action('wp_enqueue_scripts', function () {
	// Remove CSS on the front end.
	wp_dequeue_style('wp-block-library');

	// Remove Gutenberg theme.
	wp_dequeue_style('wp-block-library-theme');

	// Remove inline global CSS on the front end.
	wp_dequeue_style('global-styles');

	// Remove auto generated classic theme styles.
	wp_dequeue_style('classic-theme-styles');
}, 20);

/**
 * Setup Images.
 */

// Disable the scaling of big images.
add_filter('big_image_size_threshold', '__return_false');

// Disable srcset on frontend
function disable_wp_responsive_images()
{
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

/**
 * Register Poster CPT
 */

function register_cpt_poster()
{

	$labels = [
		'name' => __('Posters', 'core-functions'),
		'singular_name' => __('Poster', 'core-functions'),
		'menu_name' => __('Posters', 'core-functions'),
		'all_items' => __('All Posters', 'core-functions'),
		'add_new' => __('Add New', 'core-functions'),
		'add_new_item' => __('Add New Poster', 'core-functions'),
		'edit_item' => __('Edit Poster', 'core-functions'),
		'new_item' => __('New Poster', 'core-functions'),
		'view_item' => __('View Poster', 'core-functions'),
		'view_items' => __('View Posters', 'core-functions'),
		'search_items' => __('Search Posters', 'core-functions'),
		'not_found' => __('No Posters found', 'core-functions'),
		'not_found_in_trash' => __('No Posters found in Trash', 'core-functions'),
		'parent' => __('Parent Poster', 'core-functions'),
		'use_featured_image' => __('Use as featured image for this Poster', 'core-functions'),
		'archives' => __('Poster archives', 'core-functions'),
		'insert_into_item' => __('Insert into Poster', 'core-functions'),
		'uploaded_to_this_item' => __('Uploaded to this Poster', 'core-functions'),
		'filter_items_list' => __('Filter Posters list', 'core-functions'),
		'items_list_navigation' => __('Posters list navigation', 'core-functions'),
		'items_list' => __('Posters list', 'core-functions'),
		'attributes' => __('Posters attributes', 'core-functions'),
		'name_admin_bar' => __('Poster', 'core-functions'),
		'item_published' => __('Poster published', 'core-functions'),
		'item_published_privately' => __('Poster published privately', 'core-functions'),
		'item_reverted_to_draft' => __('Poster reverted to draft', 'core-functions'),
		'item_scheduled' => __('Poster scheduled', 'core-functions'),
		'item_updated' => __('Poster updated', 'core-functions'),
		'parent_item_colon' => __('Parent Poster', 'core-functions'),
	];

	$args = [
		'labels' => $labels,
		'taxonomies' => [''],
		'public' => true,
		'publicly_queryable' => true,
		'show_in_rest' => false,
		'has_archive' => 'posters',
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'delete_with_user' => false,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => ['slug' => 'poster'],
		'query_var' => true,
		'menu_icon' => 'dashicons-format-image',
		'supports' => ['title', 'author', 'thumbnail'],
		'show_in_graphql' => false,
	];

	register_post_type('poster', $args);
}

add_action('init', 'register_cpt_poster');

/**
 * Register Poster Custom Fields
 */

if (function_exists('acf_add_local_field_group')) :

	acf_add_local_field_group(array(
		'key' => 'group_620298cb42777',
		'title' => 'Poster',
		'fields' => array(
			array(
				'key' => 'field_620298e583eaa',
				'label' => 'Radio Show Title',
				'name' => 'radio_show_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_620298ef83eab',
				'label' => 'Radio Show Date',
				'name' => 'radio_show_date',
				'aria-label' => '',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'l j F Y',
				'return_format' => 'l j F Y',
				'first_day' => 1,
			),
			array(
				'key' => 'field_620298f283eac',
				'label' => 'Radio Show Start Time',
				'name' => 'radio_show_start_time',
				'aria-label' => '',
				'type' => 'time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'H:i',
				'return_format' => 'H:i',
			),
			array(
				'key' => 'field_62039f685967b',
				'label' => 'Radio Show End Time',
				'name' => 'radio_show_end_time',
				'aria-label' => '',
				'type' => 'time_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'H:i',
				'return_format' => 'H:i',
			),
			array(
				'key' => 'field_63718a26e6a78',
				'label' => 'Stories Layout',
				'name' => 'stories_layout',
				'aria-label' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'poster',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

endif;

/**
 * Register Timetable CPT
 */

function register_cpt_timetable()
{

	$labels = [
		'name' => __('Timetables', 'core-functions'),
		'singular_name' => __('Timetable', 'core-functions'),
		'menu_name' => __('Timetables', 'core-functions'),
		'all_items' => __('All Timetables', 'core-functions'),
		'add_new' => __('Add New', 'core-functions'),
		'add_new_item' => __('Add New Timetable', 'core-functions'),
		'edit_item' => __('Edit Timetable', 'core-functions'),
		'new_item' => __('New Timetable', 'core-functions'),
		'view_item' => __('View Timetable', 'core-functions'),
		'view_items' => __('View Timetables', 'core-functions'),
		'search_items' => __('Search Timetables', 'core-functions'),
		'not_found' => __('No Timetables found', 'core-functions'),
		'not_found_in_trash' => __('No Timetables found in Trash', 'core-functions'),
		'parent' => __('Parent Timetable', 'core-functions'),
		'use_featured_image' => __('Use as featured image for this Timetable', 'core-functions'),
		'archives' => __('Timetable archives', 'core-functions'),
		'insert_into_item' => __('Insert into Timetable', 'core-functions'),
		'uploaded_to_this_item' => __('Uploaded to this Timetable', 'core-functions'),
		'filter_items_list' => __('Filter Timetables list', 'core-functions'),
		'items_list_navigation' => __('Timetables list navigation', 'core-functions'),
		'items_list' => __('Timetables list', 'core-functions'),
		'attributes' => __('Timetables attributes', 'core-functions'),
		'name_admin_bar' => __('Timetable', 'core-functions'),
		'item_published' => __('Timetable published', 'core-functions'),
		'item_published_privately' => __('Timetable published privately', 'core-functions'),
		'item_reverted_to_draft' => __('Timetable reverted to draft', 'core-functions'),
		'item_scheduled' => __('Timetable scheduled', 'core-functions'),
		'item_updated' => __('Timetable updated', 'core-functions'),
		'parent_item_colon' => __('Parent Timetable', 'core-functions'),
	];

	$args = [
		'labels' => $labels,
		'taxonomies' => [''],
		'public' => true,
		'publicly_queryable' => true,
		'show_in_rest' => false,
		'has_archive' => 'timetables',
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_nav_menus' => true,
		'delete_with_user' => false,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => ['slug' => 'timetable'],
		'query_var' => true,
		'menu_icon' => 'dashicons-format-image',
		'supports' => ['title', 'author', 'thumbnail'],
		'show_in_graphql' => false,
	];

	register_post_type('timetable', $args);
}

add_action('init', 'register_cpt_timetable');
