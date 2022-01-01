<?php


if ( ! function_exists( 'demo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function demo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on demo, use a find and replace
		 * to change 'demo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'demo', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'demo' ),
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
				'demo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		/*
		 * Add theme support for selective refresh for widgets.
		 * It has the performance benefit of not having to refresh the entire preview window.
		 * */
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
add_action( 'after_setup_theme', 'demo_setup' );


/**
 * Enqueue scripts and styles.
 */
function demo_scripts() {
	$css_uri = get_template_directory_uri() . '/assets/css';
	$css_path = get_template_directory() . '/assets/css';
	$js_uri = get_template_directory_uri() . '/assets/js';
	$js_path = get_template_directory() . '/assets/js';

	wp_register_style( 'main-css', $css_uri . '/main.css', [], filemtime( $css_path . '/main.css' ) );
	wp_enqueue_style( 'main-css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_register_script( 'tailwind-cdn', '//cdn.tailwindcss.com' );
	wp_register_script( 'main-js', $js_uri . '/main.js', [], filemtime( $js_path . '/main.js' ), true );
	wp_enqueue_script( 'tailwind-cdn' );
	wp_enqueue_script( 'main-js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'demo_scripts' );


