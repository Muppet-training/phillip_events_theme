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

	wp_enqueue_script('phillip_dir-custom', get_template_directory_uri() . '/js/phillip.js', array(), '20151215', true  );

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

function friday_start($array){
	$c = 0;
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
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

function saturday_start($array){
	$c = 0;
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 6 ){
			$res[] = $v;
			$c = 1;
		}	
	}
	if($c == 0){$res = null;}
	return $res;
}

function sunday_start($array){
	$c = 0;
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 7 ){
			$res[] = $v;
			$c = 1;
		}	
	}
	if($c == 0){$res = null;}
	return $res;
}

function queryToArray($query){
	$post_data = array();
	while ( $query->have_posts() ) {
		$query->the_post();
		$post_meta = get_post_meta(get_the_ID(), '', true);
		$post_data[] = array(
				'title'   	=> get_the_title(),
				'start_stamp'   => $post_meta['event_start_timestamp'][0],
				'end_stamp'     => $post_meta['event_end_timestamp'][0],
				'image'					=> get_the_post_thumbnail( get_the_ID(), 'medium' ),
				'place'					=> $post_meta['event_place'][0],
				'town'					=> $post_meta['event_town'][0],
				'price'					=> $post_meta['event_price'][0],
		);
	}
	return $post_data;
}

function display_events($event_array){
	$now = strtotime('now');
	echo '<ul>';
		foreach ($event_array as $post){
			echo '<li>';
				if($now >= $post['start_stamp'] && $now <= $post['end_stamp']){
					echo '<div class="popout"> Now </div>';
				}else{
					echo '<div class="popout">'. date('ga', $post['start_stamp']) .'</div>';
				}
				echo ($post['price'] == 0)?  '<div class="popout free">Free</div>' : null;
				echo ' <div class="event_image">';
				echo $post['image'];
				echo ' </div>';
				echo '<div class="description">';
				echo $post['title'];
				echo '<p>'. $post['place'].', '. $post['town'] .', Vic</p>';
				echo '</div>';
			echo '</li>';
		}
	echo '</ul>';
}

function get_events_today(){
	$now = time('now');
	$args = array (
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
	$post_data = queryToArray($query);
	$sorted = val_sort($post_data, 'start_stamp');
	if(!empty($sorted)){
		$early_start = early_start($sorted, $now );
		$current_day_start = current_day_start($sorted, $now );
		if($early_start != null){
			echo '<h4 class="date_heading">';
			echo 'Events starting from ' . date('l', $early_start[0]['start_stamp']) . ' and are on today';
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

	// $post_data = queryToArray($query);
	// echo '<h4 class="date_heading">';
	// 	echo date('l, F jS', $post_data[0]['start_stamp']);
	// echo '</h4>';
	// display_events($post_data);
}

function get_events_tomorow(){
	$tomorrow = strtotime('tomorrow');
	$args = array (
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
}

function get_events_this_weekend(){
	$today = strtotime('today');
	// echo $today. ' - Today <br/>';
	$fake = strtotime('last Friday 00:00');
	$d = date('N', $today);
	// echo $d. 'Hello';
	if($d == 1 || $d == 2 || $d == 3 || $d == 4){
		
		$friday = strtotime('last Friday 16:00');
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
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query	
		);
	} elseif($d == 5){ // Friday
		$now = time('now');
		$fake_friday = strtotime('last Friday 16:00');
		$sunday = strtotime('next Sunday 23:59');
		$meta_query = array(
			'relation' => 'OR',
			array( // Pre -> Now
				'relation' => 'AND',
				array(
					'key'     => 'event_end_timestamp',
					'compare' => '>=',
					'value'   => $fake_friday,
				),
				array(
					'key'     => 'event_start_timestamp',
					'compare' => '<=',
					'value'   => $sunday,
				),
			),
		);
		$args = array (
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query
				
		);
	} elseif($d == 6 || $d == 7){ // Saturday & Sunday
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
			'post_type' => 'event',
			'orderby' => 'meta_value',
    	'order' => 'ASC',
			'meta_query' => $meta_query	
		);
	}

	
	$query = new WP_Query( $args );
	// echo '<pre>';
	// var_dump($query);
	// echo '</pre>';

	
	if ( $query->have_posts() ) {
		$post_data = queryToArray($query);	
		
		$sorted = val_sort($post_data, 'start_stamp');
		
		if(!empty($sorted)) {
			$early_start = early_weekend_start($sorted);
			$friday_start = friday_start($sorted);
			$saturday_start = saturday_start($sorted);
			$sunday_start = sunday_start($sorted);

			if($early_start != null){
				echo '<h4 class="date_heading">';
				// echo 'Weekend Events Starting From: <br/>' . date('l, F jS', $early_start[0]['start_stamp']);
				echo 'Events starting from ' . date('l', $early_start[0]['start_stamp']) . ' and are on the weekend';
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
	}
}









function get_events(){




	$now = time('now');
	echo $now;
	$args = array (
    'post_type' => 'event',
	);

	$query = new WP_Query( $args );
	

	// echo '<pre>';
	// echo print_r($query);
	// echo '</pre>';

	while ( $query->have_posts() ) : $query->the_post();
		// echo '<pre>';
		// echo print_r($count);
		// echo print_r($query->the_post());
		
		// echo '</pre>';
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
       $title = 'Add Event Name';
  }

  return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );

