<?php
/**
 * techMasters functions and definitions
 *
 * @package techMasters
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tm_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on techMasters, use a find and replace
	 * to change 'tm' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tm' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tm_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Register image sizes.
	add_image_size('slider_image','970' ,'300', true);
}
endif; // tm_setup
add_action( 'after_setup_theme', 'tm_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tm' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tm_scripts() {
	wp_enqueue_style( 'tm-style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.3.2');

	wp_enqueue_script( 'tm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '3.3.2', true );

	wp_enqueue_script( 'tm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tm_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Shortcodes .
 */
require get_template_directory() . '/shortcodes.php';


/**
 * Load CMB2 .
 */
if (!class_exists('CMB2')) {
	require get_template_directory().'/libs/cmb2/init.php';
	require get_template_directory().'/libs/metaboxs.php';
}

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Team Members', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Team Members', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Team Members', 'text_domain' ),
		'view_item'           => __( 'View Team Member', 'text_domain' ),
		'add_new_item'        => __( 'Add New Team Member', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Team Member', 'text_domain' ),
		'update_item'         => __( 'Update Team Member', 'text_domain' ),
		'search_items'        => __( 'Search Team Member', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'team_members', 'text_domain' ),
		'description'         => __( 'Team Members Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'menu_icon'			  => get_template_directory_uri().'/img/users.png'
	);
	register_post_type( 'post_type', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );
