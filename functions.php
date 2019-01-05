<?php
/**
 * phillip_dir functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package phillip_dir
 */

date_default_timezone_set('Australia/Melbourne');

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
		add_theme_support( 'html-5', array('search-form') );

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
		// register_nav_menus( array(
		// 	'event-menu' => esc_html__( 'Event Menu', 'phillip' ),
		// 	'dir-menu' => esc_html__( 'Directory Menu', 'phillip' ),
		// 	'quick-menu' => esc_html__( 'Quick Menu', 'phillip' ), 
		// ) );

		register_nav_menus(array(
			'event-menu' => 'Event Menu',
			'dir-menu' => 'Directory Menu', 
			'quick-menu' => 'Quick Menu',
		));

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

	wp_enqueue_script('phillip_dir-custom', get_template_directory_uri() . '/js/phillip.js', array(), '20151215', true  );

	wp_enqueue_script( 'phillip_dir-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'phillip_dir-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'phillip_google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC0Yqv30YyfuQCwLWN4Aq_7VMtn-7isv8Q&callback=initMap', array(), '20151215', true );

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

/* @Recreate the default filters on the_content
-------------------------------------------------------------- */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );

function add_linebreak_shortcode() {
	return '<br />';
	}
	add_shortcode('br', 'add_linebreak_shortcode' );

/**
 * Extra Code By Tom
 */

function phillip_add_post_templates_support( $cpt ) {

	$cpt['events'] = 'Label';

	return $cpt;

} add_filter( 'dslc_post_templates_post_types', 'phillip_add_post_templates_support' );

/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}

function val_sort($array, $key){
	foreach ($array as $k => $v){
		$r[] = $v[$key];
	}
	asort($r);
	// print_r($r);

	foreach ($r as $k => $v){
		$response[] = $array[$k];
	}
	return $response;
}

function current_day_start($array, $day_stamp){
	$c = 0;
	foreach ($array as $k => $v){
		if($v['start_stamp'] >= $day_stamp){
			$res[] = $v;
			$c = 1;
		}	
	}
	if($c == 0){$res = null;}
	return $res;
}

function early_start($array, $day_stamp){
	$c = 0;
	foreach ($array as $k => $v){
		if($v['start_stamp'] <= $day_stamp){
			$res[] = $v;
			$c = 1;
		}	
	}
	if($c == 0){$res = null;}
	return $res;
}

function early_week_start($array, $now, $today){
	$c = 0;
	foreach ($array as $k => $v){
		if( $v['start_stamp'] <= $today && $now <= $v['end_stamp']){
			$res[] = $v;
			$c = 1;
		}
	}
	if($c == 0){$res = null;}
	return $res;
}

function early_weekend_start($array){
	$c = 0;
	$sunday = strtotime('next sunday', $array[0]['start_stamp']);
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) <= 4 && date('N', $v['end_stamp']) >= 5 ){
			$res[] = $v;
			$c = 1;
		}	
		if(date('N', $v['start_stamp']) <= 4 && date('N', $v['end_stamp']) >= 0 ){
			if($v['start_stamp'] <= $sunday){
				$res[] = $v;
				$c = 1;
			}
		}	
	}
	if($c == 0){$res = null;}
	return $res;
}

function today_start($array, $now, $today){
	
	// echo '<pre>';
	// echo print_r($array);
	// echo '</pre>';
	// echo $now;
	$c = 0;
	foreach ($array as $k => $v){
		if( $v['start_stamp'] >= $today && $v['start_stamp'] <= strtotime('tomorrow')){
			$res[] = $v;
			$c = 1;
		}	
	}
	if($c == 0){
		$res = null;
	}

	if($c == 0){$res = null;}
	return $res;
}

function tomorrow_start($array, $now){
	$tomorrow_end = strtotime('tomorrow 23:59');
	$tomorrow_start = strtotime('tomorrow 04:00');
	$tomorrow_day = date('N', $tomorrow_start);
	// echo $tomorrow_day;

	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == $tomorrow_day ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $tomorrow_end && $tomorrow_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
	// $c = 0;
	// $tomorrow = strtotime('tomorrow'); 
	// $next_day_start = strtotime('+2 day 00:00'); 

	// // echo $tomorrow . ' - ' . $next_day_start . ' - ' . $now . '<br/>';
	
	// foreach ($array as $k => $v){
	// 	// echo $v['start_stamp'] . '<br/>';
		
	// 	if($v['start_stamp'] <= $next_day_start &&  $v['start_stamp'] >= $tomorrow){
	// 		$res[] = $v;
	// 		$c = 1;
	// 	}	
	// }
	// if($c == 0){
	// 	$res = null;
	// }
	// if($c == 0){$res = null;}
	// return $res;
}

function monday_start($array){
	$monday_end = strtotime('monday 23:59');
	$monday_start = strtotime('monday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 1 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $monday_end && $monday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function tuesday_start($array){
	$tuesday_end = strtotime('tuesday 23:59');
	$tuesday_start = strtotime('tuesday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 2 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $tuesday_end && $tuesday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function wednesday_start($array){
	$wednesday_end = strtotime('wednesday 23:59');
	$wednesday_start = strtotime('wednesday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 3 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $wednesday_end && $wednesday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function thursday_start($array){
	$thursday_end = strtotime('thursday 23:59');
	$thursday_start = strtotime('thursday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 4 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $thursday_end && $thursday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function friday_start($array){

	$friday_end = strtotime('friday 23:59');
	$friday_start = strtotime('friday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $friday_end && $friday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){
		$res = null;
	}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		// echo '<pre>';
		// print_r($sorted);
		// echo '</pre>';
		return $sorted;
	}
	return $res;
}

function saturday_start($array){

	$saturday_end = strtotime('saturday 23:59');
	$saturday_start = strtotime('saturday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 6 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $saturday_end && $saturday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		
		return $sorted;
	}
	return $res;
}

function sunday_start($array){

	$sunday_end = strtotime('sunday 23:59');
	$sunday_start = strtotime('sunday 04:00');
	$c = 0;
	$n = 0;
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 7 ){
			$res[] = $v;
			$c = 1;
		}	
		elseif($v['start_stamp'] <= $sunday_end && $sunday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}

	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_monday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 1){
		$monday_end = strtotime('next monday + 1 week 23:59');
		$monday_start = strtotime('next monday + 1 week 04:00');
	}else{
		$monday_end = strtotime('next monday 23:59');
		$monday_start = strtotime('next monday 04:00');
	}

	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 1 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $monday_end && $monday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	// echo '<pre>';
	// print_r($res);
	// echo '</pre>';
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_tuesday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 2){
		$tuesday_end = strtotime('next tuesday + 1 week 23:59');
		$tuesday_start = strtotime('next tuesday + 1 week 04:00');
	}else{
		$tuesday_end = strtotime('next tuesday 23:59');
		$tuesday_start = strtotime('next tuesday 04:00');
	}
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 2 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $tuesday_end && $tuesday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_wednesday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 3){
		$wednesday_end = strtotime('next wednesday + 1 week 23:59');
		$wednesday_start = strtotime('next wednesday + 1 week 04:00');
	}else{
		$wednesday_end = strtotime('next wednesday 23:59');
		$wednesday_start = strtotime('next wednesday 04:00');
	}
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 3 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $wednesday_end && $wednesday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_thursday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 4){
		$thursday_end = strtotime('next thursday + 1 week 23:59');
		$thursday_start = strtotime('next thursday + 1 week 04:00');
	}else{
		$thursday_end = strtotime('next thursday 23:59');
		$thursday_start = strtotime('next thursday 04:00');
	}
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 4 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $thursday_end && $thursday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_friday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 5){
		$friday_end = strtotime('next friday + 1 week 23:59');
		$friday_start = strtotime('next friday + 1 week 04:00');
	}else{
		$friday_end = strtotime('next friday 23:59');
		$friday_start = strtotime('next friday 04:00');
	}
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 4 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $friday_end && $friday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_saturday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 6){
		$saturday_end = strtotime('next saturday + 1 week 23:59');
		$saturday_start = strtotime('next saturday + 1 week 04:00');
	}else{
		$saturday_end = strtotime('next saturday 23:59');
		$saturday_start = strtotime('next saturday 04:00');
	}
	// echo $saturday_start;
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 6 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $saturday_end && $saturday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	// echo '<pre>';
	// print_r($res);
	// echo '</pre>';
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function next_sunday_start($array){
	$day = date('N', strtotime('today'));
	if($day < 7){
		$sunday_end = strtotime('next sunday + 1 week 23:59');
		$sunday_start = strtotime('next sunday + 1 week 04:00');
	}else{
		$sunday_end = strtotime('next sunday 23:59');
		$sunday_start = strtotime('next sunday 04:00');
	}
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 4 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $sunday_end && $sunday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
				case 7:
						$nStamp = strtotime('+7 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function queryToArray($query){
	$post_data = array();
	while ( $query->have_posts() ) {
		$query->the_post();
		$post_meta = get_post_meta(get_the_ID(), '', true);
		$post_data[] = array(
				'title'   			=> get_the_title(),
				'url'						=> get_permalink(get_the_ID()),
				'start_stamp'   => $post_meta['event_start_timestamp'][0],
				'end_stamp'     => $post_meta['event_end_timestamp'][0],
				'image'					=> get_the_post_thumbnail_url(get_the_ID()), 
				'place'					=> $post_meta['event_place'][0],
				'town'					=> $post_meta['event_town'][0],
				'price'					=> $post_meta['event_price'][0],
		);
	}
	return $post_data;
}

function queryListingToArray($post){
	$post_data = array();

	// echo '<pre>';
	// print_r($post);
	// echo '</pre>';
	
	$post_meta = get_post_meta($post->ID, '', true);
	// echo '<pre>';
	// print_r($post_meta);
	// echo '</pre>';
	if(
		isset($post_meta['dir_map'][0]) &&
		isset($post_meta['o_link'][0])
	){
		$post_data = array(
			'title'   			=> $post->post_title,
			'id'   					=> $post->ID,
			'url'						=> get_permalink($post->ID),
			'image'					=> get_the_post_thumbnail_url($post->ID), 
			'street'					=> $post_meta['dir_street'][0],
			'town'					=> $post_meta['dir_town'][0], 
			'check'					=> $post_meta['dir_travel_check'][0],
			'summary'				=> $post_meta['dir_summary'][0],
			'map_link'			=> $post_meta['dir_map'][0],
			
			'number'					=> $post_meta['o_number'][0],
			'email'					=> $post_meta['o_email'][0],
			'link'					=> $post_meta['o_link'][0],
		);
	}else{
		$post_data = 0;
	}



	return $post_data;
}

function queryFoodToArray($post){
	$post_data = array();

	// echo '<pre>';
	// print_r($post);
	// echo '</pre>';
	
	$post_meta = get_post_meta($post->ID, '', true);
	// echo '<pre>';
	// print_r($post_meta);
	// echo '</pre>';
	if(
		isset($post_meta['food_map'][0]) &&
		isset($post_meta['o_link'][0])
	){
		$post_data = array(
			'title'   			=> $post->post_title,
			'id'   					=> $post->ID,
			'url'						=> get_permalink($post->ID),
			'image'					=> get_the_post_thumbnail_url($post->ID), 
			'street'					=> $post_meta['food_street'][0],
			'town'					=> $post_meta['food_town'][0], 
			'check'					=> $post_meta['food_travel_check'][0],
			'summary'				=> $post_meta['food_summary'][0],
			'map_link'			=> $post_meta['food_map'][0],
			'menu_link'			=> $post_meta['food_menu'][0],
			
			'number'				=> $post_meta['o_number'][0],
			'email'					=> $post_meta['o_email'][0],
			'link'					=> $post_meta['o_link'][0],
			
			'vegan_check'		=> $post_meta['vegan_check'][0],
			'takeaway_check'=> $post_meta['takeaway_check'][0],
			'gf_check'			=> $post_meta['gf_check'][0],
			'alcohol_check'	=> $post_meta['alcohol_check'][0],
		);
	}else{
		$post_data = 0;
	}



	return $post_data;
}

function postToArray($post){
	$post_data = array();
	if ( $post != null) {
		$post_meta = get_post_meta($post->ID, '', true);

			// echo '<pre>';
			// echo print_r($post_meta);
			// echo '</pre>';
		if(
			isset($post_meta['event_start_timestamp'][0]) &&
			isset($post_meta['event_end_timestamp'][0]) &&
			isset($post_meta['event_lat'][0]) &&
			isset($post_meta['event_lng'][0]) &&
			isset($post_meta['o_name'][0])
		){
			$post_data = array(
				'title'   			=> get_the_title(),
				'id'   					=> get_the_ID(),
				'url'						=> get_permalink(get_the_ID()),
				'start_stamp'   => $post_meta['event_start_timestamp'][0],
				'end_stamp'     => $post_meta['event_end_timestamp'][0],
				// 'image'					=> get_the_post_thumbnail( get_the_ID(), 'medium' ),
				'image'					=> get_the_post_thumbnail_url(get_the_ID()), 
				'place'					=> $post_meta['event_place'][0],
				'town'					=> $post_meta['event_town'][0], 
				'price'					=> $post_meta['event_price'][0],
				'description'		=> $post_meta['event_description'][0],
				'lat'						=> $post_meta['event_lat'][0],
				'lng'						=> $post_meta['event_lng'][0],
				
				'name'					=> $post_meta['o_name'][0],
				'number'					=> $post_meta['o_number'][0],
				'email'					=> $post_meta['o_email'][0],
				'link'					=> $post_meta['o_link'][0],
			);
		}else{
			$post_data = 0;
		}
	}

	// echo '<pre>';
	// // echo $post->ID . '<br/>';
	// echo print_r($post_data);
	// echo '</pre>';

	return $post_data;
}

function display_events($event_array){

	// echo '<pre>';
	// echo print_r($event_array);
	// echo '</pre>';

	$now = strtotime('now');
	echo '<ul>';
		foreach ($event_array as $post){
			echo '<li>';
				echo '<a href="'. $post['url'] .'">';
				if($now >= $post['start_stamp'] && $now <= $post['end_stamp']){
					echo '<div class="popout"> Now </div>';
				}else{
					echo '<div class="popout">'. date('ga', $post['start_stamp']) .'</div>';
				}
				echo ($post['price'] == 0)?  '<div class="popout free">Free</div>' : null;
				echo ' <div class="event_image">';
				echo '<img width="100%" height="100%" src="'. $post['image'] . '"/>'; 
				echo ' </div>';
				echo '<div class="description">';
				echo $post['title'];
				echo '<p>'. $post['place'].', '. $post['town'] .', Vic</p>';
				echo '</div>';
				echo '</a>';
			echo '</li>';
		}
	echo '</ul>';
	echo '<hr class="event_separator">';
}

function get_events_today(){
	$now = time('now');
	$args = array (
		'posts_per_page' => '-1',
    'post_type' => 'event',
    'meta_query' => array(
			array(
	        'key'		=> 'event_start_midnight_timestamp',
	        'compare'	=> '<=',
	        'value'		=> $now,
	    ),
	    array(
	        'key'		=> 'event_end_timestamp',
	        'compare'	=> '>=',
	        'value'		=> $now,
			),
    ),
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		$post_data = queryToArray($query);
		$sorted = val_sort($post_data, 'start_stamp');
		if(!empty($sorted)){
			$early_start = early_start($sorted, $now );
			$current_day_start = current_day_start($sorted, $now );
			if($early_start != null){
				echo '<h4 class="date_heading">';
				echo 'Events happening now, starting from ' . date('l', $early_start[0]['start_stamp']);
				echo '</h4>';
				display_events($early_start); 
			}
			if($current_day_start != null){
				echo '<h4 class="date_heading">';
				echo 'Today ' . date('l, F jS', $current_day_start[0]['start_stamp']);
				echo '</h4>';
				display_events($current_day_start); 
			}
		}
	} else {
		echo '<p class="no-events">';
		echo 'We havent found any events on.. </br> If you have an event on or know of an event please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function get_events_tomorow(){
	$tomorrow = strtotime('tomorrow');
	$args = array (
		'posts_per_page' => '-1',
    'post_type' => 'event',
    'meta_query' => array(
			array(
	        'key'		=> 'event_start_midnight_timestamp',
	        'compare'	=> '<=',
	        'value'		=> $tomorrow,
	    ),
	    array(
	        'key'		=> 'event_end_timestamp',
	        'compare'	=> '>=',
	        'value'		=> $tomorrow,
			),
    ),
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		$post_data = queryToArray($query);
		$sorted = val_sort($post_data, 'start_stamp');
		if(!empty($sorted)){
			$early_start = early_start($sorted, $tomorrow );
			$current_day_start = current_day_start($sorted, $tomorrow );
			if($early_start != null){
				echo '<h4 class="date_heading">';
				echo 'Events starting from ' . date('l', $early_start[0]['start_stamp']) . ' and are on tomorrow';
				echo '</h4>';
				display_events($early_start); 
			}
			if($current_day_start != null){
				echo '<h4 class="date_heading">';
				echo 'Tomorrow ' . date('l, F jS', $current_day_start[0]['start_stamp']);
				echo '</h4>';
				display_events($current_day_start); 
			}
		}
	} else {
		echo '<p class="no-events">';
		echo 'We havent found any events on.. </br> If you have an event on or know of an event please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function get_events_dates_this_weekend(){
	$today = strtotime('today');
	$d = date('N', $today);
	if($d == 1 || $d == 2 || $d == 3 || $d == 4){
		$start = date('j M', strtotime('next friday'));
		$sunday = date('j M', strtotime('next sunday'));
	} elseif($d == 5 || $d == 6){ // Friday - Sunday
		$start = date('j M', strtotime('last friday')); 
		print_r($start);
		$sunday = date('j M', strtotime('next sunday'));	
	}elseif($d == 7){
		$start = date('j M', strtotime('last friday'));
		$sunday = date('j M', strtotime('today'));
	}
	echo $start . ' - ' . $sunday;
}

function get_events_dates_this_week(){
	$today = strtotime('today');
	$d = date('N', $today);
	if($d == 2 || $d == 3 || $d == 4 || $d == 5 || $d == 6){
		$start = date('j M', strtotime('last monday'));
		$sunday = date('j M', strtotime('next sunday'));
	}elseif($d == 1){ // Friday - Sunday
		$start = date('j M', strtotime('today'));
		$sunday = date('j M', strtotime('next sunday'));
	}elseif($d == 7){
		$start = date('j M', strtotime('last monday'));
		$sunday = date('j M', strtotime('today'));
	}
	echo $start . ' - ' . $sunday;
}

function get_events_dates_next_week(){
	$today = strtotime('today');
	$d = date('N', $today);
	
	if($d == 7){
		$start = date('j M', strtotime('next Monday'));
		$following_sunday = date('j M', strtotime('today +1 week 23:59'));
	}else{
		$start = date('j M', strtotime('next Monday 00:00'));
		$following_sunday = date('j M', strtotime('next Sunday +1 week 23:59'));
	}
	echo $start . ' - ' . $following_sunday;
}

function get_events_this_weekend(){
	$today = strtotime('today');
	// echo $today. ' - Today <br/>';
	$fake = strtotime('last Friday 00:00');
	$d = date('N', $today);
	// echo $d. 'Hello';
	if($d == 1 || $d == 2 || $d == 3 || $d == 4){
		$friday = strtotime('next Friday 16:00');
		$sunday = strtotime('next Sunday 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( 
				'relation' => 'AND',
				array( 	// Pre -> Weekend
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $friday,
				),
				array(	// Weekend -> Post
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday,
				),
			),
		);
		$args = array (
			'posts_per_page' => '-1',
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query	
		);
	} elseif($d == 5){ // Friday
		$now = time('now');
		// print_r($now);
		$fake_friday = strtotime('last Friday 16:00');
		$sunday = strtotime('next Sunday 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( // Pre -> Now
				'relation' => 'AND',
				array(
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $now,
				),
				array(
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday,
				),
			),
		);
		$args = array (
			'posts_per_page' => '-1',
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query
				
		);
	} elseif($d == 6){ // Saturday & Sunday
		$now = time('now');
		$sunday = strtotime('next Sunday 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( // Pre -> Now
				'relation' => 'AND',
				array(
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $now,
				),
				array(
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday,
				),
			),
		);
		$args = array (
			'posts_per_page' => '-1',
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query	
		);
	} elseif($d == 7) {
		$now = time('now');
		$sunday = strtotime('today 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( // Pre -> Now
				'relation' => 'AND',
				array(
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $now,
				),
				array(
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday,
				),
			),
		);
		$args = array (
			'posts_per_page' => '-1',
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query	
		);
	}

	
	$query = new WP_Query( $args );


	
	if ( $query->have_posts() ) {
		$post_data = queryToArray($query);	
		// echo '<pre>';
		// var_dump($post_data);
		// echo '</pre>';
		$sorted = val_sort($post_data, 'start_stamp');
		
		if(!empty($sorted)) {
			$early_start = early_weekend_start($sorted);
			$friday_start = friday_start($sorted);
			$saturday_start = saturday_start($sorted);
			$sunday_start = sunday_start($sorted);

			if($early_start != null){
				echo '<h4 class="date_heading">';
				// echo 'Weekend Events Starting From: <br/>' . date('l, F j', $early_start[0]['start_stamp']);
				echo 'Events starting from ' . date('l', $early_start[0]['start_stamp']) . ' and are on this weekend';
				echo '</h4>';
				display_events($early_start); 
			}
			if($friday_start != null){
				echo '<h4 class="date_heading">';
				if($friday_start[0]['start_stamp'] <= $today){
					echo 'Events starting from ' . date('l', $friday_start[0]['start_stamp']) . ' and are on today';
				}else{
					echo date('l, F jS', $friday_start[0]['start_stamp']);
				}
				echo '</h4>';
				display_events($friday_start); 
			}
			if($saturday_start != null){
				echo '<h4 class="date_heading">';
				if($saturday_start[0]['start_stamp'] <= $today){
					echo 'Events starting from ' . date('l', $saturday_start[0]['start_stamp']) . ' and are on today';
				}else{
					echo date('l, F jS', $saturday_start[0]['start_stamp']);
				}
				echo '</h4>';
				display_events($saturday_start); 
			}
			if($sunday_start != null){
				echo '<h4 class="date_heading">';
				if($sunday_start[0]['start_stamp'] <= $today){
					echo 'Events starting from ' . date('l', $sunday_start[0]['start_stamp']) . ' and are on today';
				}else{
					echo date('l, F jS', $sunday_start[0]['start_stamp']);
				}
				echo '</h4>';
				display_events($sunday_start); 
			}		
		}
	} else{
		echo '<p class="no-events">';
		echo 'We havent found any events on.. </br> If you have an event on or know of an event please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function get_events_this_week(){
	$today = strtotime('now');
	$d = date('N', $today);
	$now = time('now');
	if($d <= 6 ){
		$sunday = strtotime('next Sunday 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( // Now -> Sunday
				'relation' => 'AND',
				array(
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $now,
				),
				array(
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday,
				),
			),
		);
		$args = array (
			'posts_per_page' => -1,
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query
		);
	} elseif($d == 7){ // Sunday
		$sunday_night = strtotime('today 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( // Pre -> Now
				'relation' => 'AND',
				array(
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $now,
				),
				array(
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday_night,
				),
			),
		);
		$args = array (
			'posts_per_page'         => '-1',
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query,			
		);
	}
	
	$query = new WP_Query( $args );

	// echo '<pre>';
	// print_r($query);
	// echo '</pre>';

	
	if ( $query->have_posts() ) {
		$post_data = queryToArray($query);
		
		// echo '<pre>';
		// print_r($post_data);
		// echo '</pre>';
		
		$sorted = val_sort($post_data, 'start_stamp');
		$today_int = date('N', $today);

		if(!empty($sorted)) {
			$early_week_start = early_week_start($sorted, $now, $today);
			$today_start = today_start($sorted, $now, $today);
			$tomorrow_start = tomorrow_start($sorted, $now);
			$monday_start = monday_start($sorted);
			$tuesday_start = tuesday_start($sorted);
			$wednesday_start = wednesday_start($sorted);
			$thursday_start = thursday_start($sorted);
			$friday_start = friday_start($sorted);
			$saturday_start = saturday_start($sorted);
			$sunday_start = sunday_start($sorted);

			$c = 1;

			if($early_week_start != null){
				echo '<h4 class="date_heading">';
				echo 'Events starting from ' . date('l', $early_week_start[0]['start_stamp']) . ' and are on Today';
				echo '</h4>';
				display_events($early_week_start); 
			}

			if($today_start != null){
				echo '<h4 class="date_heading">';
					echo 'Events starting Today <br/>' . date('l, F jS', $today_start[0]['start_stamp']);
				echo '</h4>';
				display_events($today_start); 
			}
			
			if($tomorrow_start != null){
				echo '<h4 class="date_heading">';
					echo 'Events starting Tomorrow <br/>' . date('l, F jS', $tomorrow_start[0]['start_stamp']);				
				echo '</h4>';
				display_events($tomorrow_start); 
			}	
			
			$mon_int = ( $monday_start != null)? date('N', $monday_start[0]['start_stamp']) : null;
			$tue_int = ( $tuesday_start != null)? date('N', $tuesday_start[0]['start_stamp']) : null;
			$wed_int = ( $wednesday_start != null)? date('N', $wednesday_start[0]['start_stamp']) : null;
			$thu_int = ( $thursday_start != null)? date('N', $thursday_start[0]['start_stamp']) : null;
			$fri_int = ( $friday_start != null)? date('N', $friday_start[0]['start_stamp']) : null;
			$sat_int = ( $saturday_start != null)? date('N', $saturday_start[0]['start_stamp']) : null;
			$sun_int = ( $sunday_start != null)? date('N', $sunday_start[0]['start_stamp']) : null;

			
			for($x = $today_int; $x <= 7; $x++){
				if($x == 2){
					for($x = 4; $x <= 7; $x++){
						if($thu_int != null && $thu_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $thursday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($thursday_start); 
						}
						
						if($fri_int != null && $fri_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $friday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($friday_start); 
						}
						if($sat_int != null && $sat_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $saturday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($saturday_start); 
						}
						if($sun_int != null && $sun_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $sunday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($sunday_start); 
						}
					}
				}	
				// echo $wed_int;
				if($x == 3){
					for($x = 5; $x <= 7; $x++){
						if($fri_int != null && $fri_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $friday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($friday_start); 
						}
						if($sat_int != null && $sat_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $saturday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($saturday_start); 
						}
						if($sun_int != null && $sun_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $sunday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($sunday_start); 
						}
					}
				}
				if($x == 4){
					for($x = 5; $x <= 7; $x++){
						if($sat_int != null && $sat_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $saturday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($saturday_start); 
						}
						if($sun_int != null && $sun_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $sunday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($sunday_start); 
						}
					}
				}	
				if($x == 5){
					for($x = 6; $x <= 7; $x++){
						if($sun_int != null && $sun_int == $x){
							echo '<h4 class="date_heading">';
								echo date('l, F jS', $sunday_start[0]['start_stamp']);
							echo '</h4>';
							display_events($sunday_start); 
						}
					}
				}	

				// If sunday make sure you don't display events for the following monday.. I think you have checked this already
			}		
		}
	} else{
		echo '<p class="no-events">';
		echo 'We havent found any events on.. </br> If you have an event on or know of an event please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function get_events_next_week(){
	$next_monday = strtotime('next Monday 00:00');
	$following_sunday = strtotime('next Sunday +1 week 23:59');
	$meta_query = array(
		'relation' => 'OR',
		array( // Now -> Sunday
			'relation' => 'AND',
			array(
				'key'     => 'event_end_timestamp',
				'compare' => '>=',
				'value'   => $next_monday,
			),
			array(
				'key'     => 'event_start_timestamp',
				'compare' => '<=',
				'value'   => $following_sunday,
			),
		),
	);
	$args = array (
		'posts_per_page' => '-1',
		'post_type' => 'event',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => $meta_query
	);
	
	$query = new WP_Query( $args );
	
	if ( $query->have_posts() ) {
		$post_data = queryToArray($query);	
		$sorted = val_sort($post_data, 'start_stamp');

		// echo '<pre>';
		// print_r($post_data);
		// echo '</pre>';

		if(!empty($sorted)) {
			$monday_start = next_monday_start($sorted);
			$tuesday_start = next_tuesday_start($sorted);
			$wednesday_start = next_wednesday_start($sorted);
			$thursday_start = next_thursday_start($sorted);
			$friday_start = next_friday_start($sorted);
			$saturday_start = next_saturday_start($sorted);
			$sunday_start = next_sunday_start($sorted);

			$c = 1;

			$mon_int = ( $monday_start != null)? date('N', $monday_start[0]['start_stamp']) : null;
			$tue_int = ( $tuesday_start != null)? date('N', $tuesday_start[0]['start_stamp']) : null;
			$wed_int = ( $wednesday_start != null)? date('N', $wednesday_start[0]['start_stamp']) : null;
			$thu_int = ( $thursday_start != null)? date('N', $thursday_start[0]['start_stamp']) : null;
			$fri_int = ( $friday_start != null)? date('N', $friday_start[0]['start_stamp']) : null;
			$sat_int = ( $saturday_start != null)? date('N', $saturday_start[0]['start_stamp']) : null;
			$sun_int = ( $sunday_start != null)? date('N', $sunday_start[0]['start_stamp']) : null;

			if($mon_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $monday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($monday_start); 
			}
			if($tue_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $tuesday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($tuesday_start); 
			}
			if($wed_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $wednesday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($wednesday_start); 
			}
			if($thu_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $thursday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($thursday_start); 
			}
			if($fri_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $friday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($friday_start); 
			}
			if($sat_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $saturday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($saturday_start); 
			}
			if($sun_int != null){
				echo '<h4 class="date_heading">';
					echo date('l, F jS', $sunday_start[0]['start_stamp']);
				echo '</h4>';
				display_events($sunday_start); 
			}
		}
	} else{
		echo '<p class="no-events">';
		echo 'We havent found any events on.. </br> If you have an event on or know of an event please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function get_events(){
	$now = time('now');
	echo $now;
	$args = array (
		'posts_per_page' => '-1',
    'post_type' => 'event',
	);

	$query = new WP_Query( $args );
	


	while ( $query->have_posts() ) : $query->the_post();
		echo '<br/>';
		the_title();

	endwhile;

	echo '<hr/>';


	// echo strtotime('next Friday 16:00'). ' - Friday Timestamp<br/>';
	echo strtotime('now'). ' - Now Timestamp<br/>';
	while ( $query->have_posts() ) : $query->the_post();
		$post_meta = get_post_meta(get_the_ID(), '', true);
		$event_start_date = $post_meta['event_start_date'][0];
		$event_start_timestamp = $post_meta['event_start_timestamp'][0];
		$event_start_midnight_timestamp = $post_meta['event_start_midnight_timestamp'][0];
		$start_time = date('ga', $event_start_timestamp);
		$event_end_date = $post_meta['event_end_date'][0];
		$event_end_timestamp = $post_meta['event_end_timestamp'][0];
		$now = strtotime('now');
		$friday = strtotime('next Friday 16:00');
		$sunday = strtotime('next Sunday 23:59');
		
		$bool = (($event_start_timestamp >= $now) && ($event_end_timestamp <= $sunday))? 'TRUE' : 'FALSE';
		$startsbefore = (($event_end_timestamp >= $now) && ($event_end_timestamp <= $sunday))? 'TRUE' : 'FALSE';
		$endsafter = (($event_start_timestamp >= $now) && ($event_start_timestamp <= $sunday))? 'TRUE' : 'FALSE';
		// ($min <= $today) && ($today <= $start_date);

		the_title();
		echo ' | ' . $event_start_date . ' | ' . $event_end_date . ': ' . $bool .' | ' . $startsbefore . ' | ' . $endsafter . ' - ' . $now . ' - ' . $event_start_timestamp . ' - ' . $event_end_timestamp;
		echo '<br/>';
		// echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
		

	endwhile;


	// die();







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
       $title = 'Add Event Name Here';
  }
  if  ( 'listing' == $screen->post_type ) {
       $title = 'Add Business Name Here';
  }

  return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );

function get_icon($slug){
	switch($slug){
		case 'retail':
			echo '#shopping-bag">';
			break;
		case 'wellness':
			echo '#heart">';
			break;
		case 'trades':
			echo '#settings">';
			break;
		case 'services':
			echo '#customer-service">';
			break;
		case 'community':
			echo '#chat">';
			break;
		case 'tourism':
			echo '#penguin">';
			break;
		case 'eating-out':
			echo '#cheers">';
			break;
		case 'medical':
			echo '#first-aid-kit">';
			break;
		case 'gallery-studios':
			echo '#paint-palette-and-brush">';
			break;
		case 'transport':
			echo '#bus-stop">';
			break;
		default:
			echo '#settings">';
			break;
	}
}

function sub_category_menu($cats, $cat){
	echo '<ul id="'. $cat->slug .'" class="sub_menu">';
	foreach($cats as $sub_cat){
		if($cat->cat_ID == $sub_cat->category_parent){
			echo '<li>';
				echo '<a id="'.clean($sub_cat->name).'" href="'.get_category_link($sub_cat->term_id).'" class="sub_menu_item">';
					echo '<div class="menu-item">';
						// echo '<a href="'. echo get_category_link( $cat->term_id ).'">';
						echo '<h4>'.$sub_cat->name.'</h4>';
					echo '</div>';
				echo '</a>';
			echo '</li>';
		}
	}
	echo '</ul>';



}

function get_category_icons(){
	
	$args = array(
		'posts_per_page' => '-1',
		'type'            => 'listing',
		'orderby'         => 'name',
		'order'           => 'ASC',
		'hide_empty'      => 0,
		// 'parent' 					=> 0
	);
	
	$cats = get_categories($args);

	// echo '<pre>';
	// echo print_r($cats);
	// echo '</pre>';
	// die();

	echo '<ul>';
	foreach($cats as $cat) {
		$x = 0;
		$url = '';
		// Get Child Categories
		if($cat->category_parent == 0){
			foreach($cats as $child){
				if($x == 0 && $cat->cat_ID == $child->category_parent){
					$url = $child->slug;
					$x = 1;
				}

			}


			echo '<li class="menu-list-group" >';
				// echo '<a href="'.get_category_link($cat->term_id).'" >';
				echo '<div class="menu_tab" onclick="dir_menu(\''.$cat->slug.'\');">';
					echo '<div class="svg_wrap">';
						echo '<svg id="parent_'. clean($cat->name) .'" shape-rendering="geometricPrecision">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						get_icon($cat->slug);
						echo '</use>';
						echo '</svg>';
					echo '</div>';
					echo '<div class="menu-item" onclick="dir_sub_menu(\''.$cat->slug.'\');">';
						// echo '<a href="'. $url .'">';
						// echo '<a href="'. get_category_link( $cat->term_id ).'">';
						echo '<h4>'.$cat->name.'</h4>';	
						// echo '</a>'; 
					echo '</div>';
				echo '</div>';
			sub_category_menu($cats, $cat);
			echo '</li>';
		}
	}
	echo '</ul>';
}

function get_category_listings($category){

	// var_dump($category);

	$args = array(
		'posts_per_page'   => -1,
		'category'         => $category,
		'orderby'          => 'name',
		'order'            => 'ASC',
		'post_type'        => 'listing'
	);
	$posts = get_posts( $args );

		// echo '<pre>';
		// print_r($posts);
		// echo '</pre>';

	if($posts){

	foreach( $posts as $post ){
		$post_array = queryListingToArray($post);
		echo '<li id="contact_'.$post_array['id'].'" onclick="contact_business('.$post_array['id'].');">';
			echo '<div class="promo_image">';
				echo '<img src="'.$post_array['image'].'" alt="Listing Image"/>';
			echo '</div>';
			echo '<div class="promo_content">';
				echo '<h3 id="c_name_'.$post_array['id'].'">'.$post_array['title'].'</h3>';
				echo '<span class="c_id" id="c_id_'.$post_array['id'].'">'.$post_array['id'].'</span>';
				echo '<div class="link_line"><a class="link_line_phone" href="tel:'.$post_array['number'].'">'.$post_array['number'].'</a><a id="c_oemail_'.$post_array['id'].'" href="mailto:'.$post_array['email'].'">'.$post_array['email'].'</a></div>';
				echo '<p>'.$post_array['summary'].'</p>';
				if($post_array['check'] == 1){
					$class = 'checked';
					$message = $post_array['title'].' Travels To You';
				}else{
					$class = 'not_checked';
					$message = 'You Travel To '. $post_array['title'];
				}
				echo '<div class="check_toggle" id="check_toggle_'.$post_array['id'].'">'.$message.'</div>';
				echo '<div class="listing_icon">';

					echo '<svg id="check_'.$post_array['check'].'" class="check '.$class.'" shape-rendering="geometricPrecision" onclick="check_travel('.$post_array['id'].')">';
					echo '<use xlink:href="';
					is_customize_preview() ?
					esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
					echo '#van';
					echo '"></use>';
					echo '</svg>';

					echo '<a href="'.$post_array['map_link'].'">';
						echo '<svg shape-rendering="geometricPrecision">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#placeholder';
						echo '"></use>';
						echo '</svg>';
					echo '</a>';

					echo '<a href="'.$post_array['link'].'" target="_blank">';
						echo '<svg shape-rendering="geometricPrecision">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#share';
						echo '"></use>';
						echo '</svg>';
					echo '</a>';
				echo '</div>';
			echo '</div>';
		echo '</li>';
	}
	}else {
		echo '<p class="no-events">';
		echo 'We havent found any businesses in this category.. </br>Please check out another sub category</br></br> If you are a business owner or know someone who would benefit from being listed here please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function get_food_category_listings($category){

	// var_dump($category);
	// exit();

	$args = array(
		'posts_per_page'   => -1,
		'category'         => $category,
		'orderby'          => 'name',
		'order'            => 'ASC',
		'post_type'        => 'food'
	);
	$posts = get_posts( $args );

	if($posts){

	foreach( $posts as $post ){
		$post_array = queryFoodToArray($post);
		// echo '<li id="contact">';
		echo '<li id="contact_'.$post_array['id'].'" onclick="contact_business('.$post_array['id'].');">';
			echo '<div class="promo_image">';
				echo '<img src="'.$post_array['image'].'" alt="Listing Image"/>';
			echo '</div>';
			echo '<div class="promo_content">';
				echo '<h3 id="c_name_'.$post_array['id'].'">'.$post_array['title'].'</h3>';
				echo '<span class="c_id" id="c_id_'.$post_array['id'].'">'.$post_array['id'].'</span>';
				echo '<div class="link_line"><a class="link_line_phone" href="tel:'.$post_array['number'].'">'.$post_array['number'].'</a><a id="c_oemail_'.$post_array['id'].'" href="mailto:'.$post_array['email'].'">'.$post_array['email'].'</a></div>';
				echo '<p>'.$post_array['summary'].'</p>';
				
				if($post_array['check'] == 1){
					$class = 'checked';
					$message = $post_array['title'].' Travels To You';
				}else{
					$class = 'not_checked';
					$message = 'You Travel To '. $post_array['title'];
				}
				
				$gf = $post_array['gf_check'];
				$v = $post_array['vegan_check'];
				$t = $post_array['takeaway_check'];
				$a = $post_array['alcohol_check'];
				$c = $post_array['check'];

				$class_gf = '';
				$class_v = '';
				$class_t = '';
				$class_a = '';
				$class_c = '';

				if($gf == 1){
					$class_gf = 'checked';
				}
				if($v == 1){
					$class_v = 'checked';
				}
				if($t == 1){
					$class_t = 'checked';
				}
				if($a == 1){
					$class_a = 'checked';
				}
				if($c == 1){
					$class_c = 'checked';
				}

				echo '<div class="check_toggle" id="check_toggle_'.$post_array['id'].'">'.$message.'</div>';
				// echo '<div class="toggle_check" id="toggle_check_'.$post_array['id'].'"></div>';
				echo '<div class="listing_icon">';
					echo '<div>';
						echo '<svg id="check_'.$gf.'" class="check '.$class_gf.'" shape-rendering="geometricPrecision"
						onclick="toggle_check(\''.$gf.'\',\'gf\',\''.$post_array['id'].'\')">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#gluten-free';
						echo '"></use>';
						echo '</svg>'; 
					echo '</div>';
					echo '<div>';
						echo '<svg id="check_'.$v.'" class="check '.$class_v.'" shape-rendering="geometricPrecision"
						onclick="toggle_check(\''.$v.'\',\'v\',\''.$post_array['id'].'\')">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#diet';
						echo '"></use>';
						echo '</svg>'; 
					echo '</div>';
					echo '<div>';
						echo '<svg id="check_'.$a.'" class="check '.$class_a.'" shape-rendering="geometricPrecision"
						onclick="toggle_check(\''.$a.'\',\'a\',\''.$post_array['id'].'\')">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#cheers';
						echo '"></use>';
						echo '</svg>'; 
					echo '</div>';
					echo '<div>';
						echo '<svg id="check_'.$t.'" class="check '.$class_t.'" shape-rendering="geometricPrecision"
						onclick="toggle_check(\''.$t.'\',\'t\',\''.$post_array['id'].'\')">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#takeaway';
						echo '"></use>';
						echo '</svg>'; 
					echo '</div>';
					echo '<div>';
						echo '<svg id="check_'.$c.'" class="check '.$class_c.'" shape-rendering="geometricPrecision"
						onclick="toggle_check(\''.$c.'\',\'c\',\''.$post_array['id'].'\')">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#van';
						echo '"></use>';
						echo '</svg>'; 
					echo '</div>';

					echo '<a href="'.$post_array['map_link'].'" target="_blank">';
						echo '<svg shape-rendering="geometricPrecision">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#placeholder';
						echo '"></use>';
						echo '</svg>';
					echo '</a>';
					
					echo '<a href="'.$post_array['menu_link'].'" target="_blank">';
						echo '<svg shape-rendering="geometricPrecision">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#menu';
						echo '"></use>';
						echo '</svg>';
					echo '</a>';

					echo '<a href="'.$post_array['link'].'" target="_blank">';
						echo '<svg shape-rendering="geometricPrecision">';
						echo '<use xlink:href="';
						is_customize_preview() ?
						esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '';
						echo '#share';
						echo '"></use>';
						echo '</svg>';
					echo '</a>';
				echo '</div>';
			echo '</div>';
		echo '</li>';
	}
	}else {
		echo '<p class="no-events">';
		echo 'We havent found any businesses in this category.. </br>Please check out another sub category</br></br> If you are a business owner or know someone who would benefit from being listed here please let us know to today.<br/>';
		echo 'Either call us on <a href="call:0427853233">0427 857 233</a> or email us <a href="mailto:jonathan@phillipislandtime.com.au">jonathan @ phillipislandtime.com.au</a>';
		echo '</p>';
	}
}

function clean($string) {
	$string = strtolower($string);
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	$string = htmlspecialchars_decode($string);
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	$string = str_replace('--', '-', $string); // Replaces all '--' with hyphen.
	return $string;
}

function get_parent_cat_name(){
	$cat_name = single_cat_title('',false);
	$cat_id = get_cat_ID($cat_name);
	$cat = get_category($cat_id); 
	$cat_parent = get_the_category_by_ID($cat->parent);
	$clean_cat = clean($cat_parent);
	echo $clean_cat;
}

function new_subcategory_hierarchy() { 
	$category = get_queried_object();

	$parent_id = $category->category_parent;

	$templates = array();

	if ( $parent_id == 0 ) {
			// Use default values from get_category_template()
			$templates[] = "category-{$category->slug}.php";
			$templates[] = "category-{$category->term_id}.php";
			$templates[] = 'category.php';     
	} else {
			// Create replacement $templates array
			$parent = get_category( $parent_id );

			// Current first
			$templates[] = "category-{$category->slug}.php";
			$templates[] = "category-{$category->term_id}.php";

			// Parent second
			$templates[] = "category-{$parent->slug}.php";
			$templates[] = "category-{$parent->term_id}.php";
			$templates[] = 'category.php'; 
	}
	return locate_template( $templates );
}

add_filter( 'category_template', 'new_subcategory_hierarchy' );

function get_search_slug($id){

	$cat = get_the_category( $id );

	if($cat == null){
		return get_permalink($id);
	}else{
		// echo '<pre>';
		// echo print_r($cat);
		// echo '</pre>';
		return get_category_link($cat[0]->cat_ID);
	}


}