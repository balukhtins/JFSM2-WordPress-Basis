<?php
/**
 * DevIT-Basis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DevIT-Basis
 */

require_once get_template_directory() . '/Header_Menu.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'devit_basis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function devit_basis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DevIT-Basis, use a find and replace
		 * to change 'devit-basis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'devit-basis', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Header Menu', 'devit-basis' ),
				'menu-footer' => esc_html__( 'Footer Menu', 'devit-basis' ),
				'menu-courses' => esc_html__( 'Courses Menu', 'devit-basis' ),
				'menu-interesting' => esc_html__( 'Interesting Menu', 'devit-basis' ),
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
				'devit_basis_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'devit_basis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devit_basis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'devit_basis_content_width', 640 );
}
add_action( 'after_setup_theme', 'devit_basis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function devit_basis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'devit-basis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'devit-basis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		)
	);
}
add_action( 'widgets_init', 'devit_basis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function devit_basis_scripts() {
	wp_enqueue_style( 'devit-basis-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'devit-basis-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'devit-basis-font-open-sans', '://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap' );
    wp_enqueue_style( 'devit-basis-main', get_template_directory_uri().'/assets/css/main.css', array(), _S_VERSION );

    wp_style_add_data( 'devit-basis-style', 'rtl', 'replace' );

	wp_enqueue_script( 'devit-basis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'devit-basis-bootstrap-bundle-js', '//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'devit-basis-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devit_basis_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Shortcode for contact form.
 */
require get_template_directory() . '/inc/view_contact_form_shortcode.php';
add_shortcode('devit_contact_form', 'view_contact_form_shortcode');

/**
 * Custom Post Type - devit_contact_form
 */
require get_template_directory() . '/inc/my_custom_post_type.php';
add_action('init', 'my_custom_post_type');
