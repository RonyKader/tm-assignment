<?php
/**
 * tm-project functions and definitions
 *
 * @package tm-project
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

// Initialization of CMB2
if ( file_exists (  (dirname( __FILE__ ) ) . '/inc/cmb2/init.php' ) ) {
  require_once  (dirname( __FILE__ ) ) . '/inc/cmb2/init.php';
} 
require_once dirname( __FILE__ ). '/inc/meta.php';

if ( ! function_exists( 'tm_setup' ) ) :
	require_once dirname( __FILE__ ).'/inc/theme-option.php';
	require_once dirname( __FILE__ ).'/shortcode/slider.php';


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
	 * If you're building a theme based on tm-project, use a find and replace
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
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'member', 270, 270, true );
	add_image_size( 'member_hov', 270, 270, true );

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
	wp_enqueue_style("bs", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css");
	wp_enqueue_style("fas", get_stylesheet_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style("fas", get_stylesheet_directory_uri().'/css/responsiveslides.css' );
	wp_enqueue_style( 'tm-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'boot-js','//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js',array( 'jquery' ) );
	wp_enqueue_script( 'res-sli',get_template_directory_uri().'/js/responsiveslides.min.js',array( 'jquery' ) );
	wp_enqueue_script( 'tm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tm_scripts' );

function admin_script( $hook ) {
	if ( 'post.php'== $hook ) {
	wp_enqueue_script( 'qt-js', get_stylesheet_directory_uri().'/js/qt.js',array( 'jquery','quicktags'));
		
	}

}
add_action( 'admin_enqueue_scripts', 'admin_script' );
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
