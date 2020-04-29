<?php

/**
 * bnbWebSite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bnbWebSite
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('bnbwebsite_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bnbwebsite_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bnbWebSite, use a find and replace
		 * to change 'bnbwebsite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('bnbwebsite', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('blog-image-hard', 200, 200, true);
		// add_image_size('blog-image-positioned', 100, 50, ['left', 'top']);

		function my_custom_sizes($sizes)
		{
			return array_merge($sizes, array(
				'blog-image' => __('blog-image'),
			));
		}



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'bnbwebsite'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bnbwebsite_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'bnbwebsite_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bnbwebsite_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('bnbwebsite_content_width', 640);
}
add_action('after_setup_theme', 'bnbwebsite_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bnbwebsite_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'bnbwebsite'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'bnbwebsite'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar test', 'bnbwebsite'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Add widgets here.', 'bnbwebsite'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'bnbwebsite_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bnbwebsite_scripts()
{
	wp_enqueue_style('bnbwebsite-style', get_stylesheet_uri(), array(), microtime());
	wp_style_add_data('bnbwebsite-style', 'rtl', 'replace');

	wp_enqueue_script('bnbwebsite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_enqueue_script('bnbwebsite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bnbwebsite_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



// custom functions

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
	return 5;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
	if (!is_single()) {
		$more = sprintf(
			'<a class="read-more" href="%1$s">%2$s</a>',
			get_permalink(get_the_ID()),
			__('Read More', 'textdomain')
		);
	}

	return $more;
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');

/**
 *
 * custom post types
 *
 */

// Register Custom Post Type
function runners()
{

	$labels = array(
		'name'                  => _x('runners', 'Post Type General Name', 'text_domain'),
		'singular_name'         => _x('runner', 'Post Type Singular Name', 'text_domain'),
		'menu_name'             => __('Runners Trail', 'text_domain'),
		'name_admin_bar'        => __('Runners Trail', 'text_domain'),
		'archives'              => __('Archivio runners', 'text_domain'),
		'attributes'            => __('Item Attributes', 'text_domain'),
		'parent_item_colon'     => __('Parent Item:', 'text_domain'),
		'all_items'             => __('All Items', 'text_domain'),
		'add_new_item'          => __('Add New runner', 'text_domain'),
		'add_new'               => __('Add New runner', 'text_domain'),
		'new_item'              => __('New Item', 'text_domain'),
		'edit_item'             => __('Edit Item', 'text_domain'),
		'update_item'           => __('Update Item', 'text_domain'),
		'view_item'             => __('View Item', 'text_domain'),
		'view_items'            => __('View Items', 'text_domain'),
		'search_items'          => __('Search Item', 'text_domain'),
		'not_found'             => __('Not found', 'text_domain'),
		'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
		'featured_image'        => __('Featured Image', 'text_domain'),
		'set_featured_image'    => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image'    => __('Use as featured image', 'text_domain'),
		'insert_into_item'      => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list'            => __('Events list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list'     => __('Filter items list', 'text_domain'),
	);
	$args = array(
		'label'                 => __('runner', 'text_domain'),
		'description'           => __('Runners di trail running', 'text_domain'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes', 'custom-fields'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-shield',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type('runners', $args);
}
add_action('init', 'runners', 0);


/**
 *
 * custom taxonomies
 *
 */

// Register Custom Taxonomy EVENT TYPE
function trail_events_type()
{

	$labels = array(
		'name'                       => _x('types', 'Taxonomy General Name', 'trail'),
		'singular_name'              => _x('type', 'Taxonomy Singular Name', 'trail'),
		'menu_name'                  => __('Events Types', 'trail'),
		'all_items'                  => __('All types', 'trail'),
		'parent_item'                => __('Parent Item', 'trail'),
		'parent_item_colon'          => __('Parent Item:', 'trail'),
		'new_item_name'              => __('New Event Type Name', 'trail'),
		'add_new_item'               => __('Add New Event Type', 'trail'),
		'edit_item'                  => __('Edit Item', 'trail'),
		'update_item'                => __('Update Item', 'trail'),
		'view_item'                  => __('View Item', 'trail'),
		'separate_items_with_commas' => __('Separate items with commas', 'trail'),
		'add_or_remove_items'        => __('Add or remove items', 'trail'),
		'choose_from_most_used'      => __('Choose from the most used', 'trail'),
		'popular_items'              => __('Popular Items', 'trail'),
		'search_items'               => __('Search Items', 'trail'),
		'not_found'                  => __('Not Found', 'trail'),
		'no_terms'                   => __('No items', 'trail'),
		'items_list'                 => __('Items list', 'trail'),
		'items_list_navigation'      => __('Items list navigation', 'trail'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('type', array('eventi'), $args);
}
add_action('init', 'trail_events_type', 0);

// Register Custom Taxonomy REVIEWS
function trail_events_review()
{

	$labels = array(
		'name'                       => _x('reviews', 'Taxonomy General Name', 'trail'),
		'singular_name'              => _x('review', 'Taxonomy Singular Name', 'trail'),
		'menu_name'                  => __('Events Review', 'trail'),
		'all_items'                  => __('All reviews', 'trail'),
		'parent_item'                => __('Parent Item', 'trail'),
		'parent_item_colon'          => __('Parent Item:', 'trail'),
		'new_item_name'              => __('New Review Name', 'trail'),
		'add_new_item'               => __('Add New Review', 'trail'),
		'edit_item'                  => __('Edit Item', 'trail'),
		'update_item'                => __('Update Item', 'trail'),
		'view_item'                  => __('View Item', 'trail'),
		'separate_items_with_commas' => __('Separate items with commas', 'trail'),
		'add_or_remove_items'        => __('Add or remove items', 'trail'),
		'choose_from_most_used'      => __('Choose from the most used', 'trail'),
		'popular_items'              => __('Popular Items', 'trail'),
		'search_items'               => __('Search Items', 'trail'),
		'not_found'                  => __('Not Found', 'trail'),
		'no_terms'                   => __('No items', 'trail'),
		'items_list'                 => __('Items list', 'trail'),
		'items_list_navigation'      => __('Items list navigation', 'trail'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('review', array('eventi'), $args);
}
add_action('init', 'trail_events_review', 0);
