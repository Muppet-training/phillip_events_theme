<?php
/**
 * phillip_dir functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package phillip_dir
 */

if ( ! function_exists( 'phillip_dir_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function phillip_dir_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on phillip_dir, use a find and replace
		 * to change 'phillip_dir' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'phillip_dir', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'phillip_dir' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'phillip_dir_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'phillip_dir_setup' );

show_admin_bar( false );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function phillip_dir_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'phillip_dir_content_width', 640 );
}
add_action( 'after_setup_theme', 'phillip_dir_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phillip_dir_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'phillip_dir' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'phillip_dir' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'phillip_dir_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function phillip_dir_scripts() {
	wp_enqueue_style( 'phillip_dir-style', get_stylesheet_uri() );

	// wp_enqueue_script('phillip_dir-custom', get_template_directory_uri() . '/js/phillip.js', array('jquery', 'jquery-ui-datepicker'), '20151215', true  )

	wp_enqueue_script( 'phillip_dir-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'phillip_dir-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'phillip_dir_scripts' );

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
 * Extra Code By Tom
 */


function get_events(){













	$today = time('now');

	echo $today;

	$args = array (
    'post_type' => 'event',
    'meta_query' => array(
			array(
	        'key'		=> 'event_start_date',
	        'compare'	=> '<=',
	        'value'		=> $today,
	    ),
	    array(
	        'key'		=> 'event_end_date',
	        'compare'	=> '>=',
	        'value'		=> $today,
			),
    ),
	);

	$query = new WP_Query( $args );

	echo '<pre>';
	echo print_r($query);
	echo '</pre>';

	while ( $query->have_posts() ) : $query->the_post();
		// echo '<pre>';
		// echo print_r($count);
		// echo print_r($query->the_post());
		
		// echo '</pre>';
		echo '<br/>';
		the_title();

	endwhile;

	echo '<hr/>';








	$args = array (
    'post_type' => 'event',
	);

	$query = new WP_Query( $args );

	echo $today . '<br/>';
	while ( $query->have_posts() ) : $query->the_post();
		$post_meta = get_post_meta(get_the_ID(), '', true);
		$start_date = $post_meta['event_start_date'][0];
		$end_date = $post_meta['event_end_date'][0];
		
		$bool = (($start_date <= $today) && ($today <= $end_date))? 'TRUE' : 'FALSE';
		// ($min <= $today) && ($today <= $start_date);

		the_title();
		echo ' | ' . $start_date . ' | ' . $end_date . ': ' . $bool;
		echo '<br/>';
		

	endwhile;


	die();







	$args = array( 'post_type' => 'event', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );




	while ( $loop->have_posts() ) : $loop->the_post();
		$post_meta = get_post_meta(get_the_ID(), '', true);
		$start_date = $post_meta['event_start_date'][0];

		


		the_title();
		echo '<div class="entry-content">';
		the_content();
		echo '</div>';
	endwhile;
}


function wpb_change_title_text( $title ){
  $screen = get_current_screen();

  if  ( 'event' == $screen->post_type ) {
       $title = 'Add Event Name';
  }

  return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );

