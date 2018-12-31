<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package phillip_dir
 */

get_header();
?>
	<ul class="main_header" role="navigation">
    <li><a href="<?php echo home_url('/'); ?>"><h3>Phillip Island Time</h3></a></li>
    <li class="logo"><img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/small_star.png)"></li>
    <li class="search_button"><?php get_search_form()?><div id="dashicons-search" class="dashicons dashicons-search" onclick="search_now();"></div></li>
    <li class="nav_button" onclick="eventNavToggle(event);">What's On?</li>
  </ul>
  <div class="event_nav" id="event_nav">
    <ul>
      <li><a href="<?php echo home_url('events-today'); ?>">Today</a></li>
      <li><a href="<?php echo home_url('events-tomorrow'); ?>">Tomorrow</a></li>
      <li><a href="<?php echo home_url('events-this-weekend'); ?>">This Weekend</a></li>
      <li><a href="<?php echo home_url('events-this-week'); ?>">This Week</a></li>
      <li><a href="<?php echo home_url('events-next-week'); ?>">Next Week</a></li>
    </ul>
  </div>
	<div id="content" class="site-content body_push" onclick="menuCheck();">
		<section class="search_results">
			<section class="page_title">
				<h1>Events on Today</h1>
			</section>
			<h4 class="date_heading">Search Results..</h4>
			<?php if ( have_posts() ) : ?>
				<ul>
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
						get_template_part('content', 'search');
						endwhile;
					?>
				</ul>
			<?php
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</section>

<?php
get_footer();
