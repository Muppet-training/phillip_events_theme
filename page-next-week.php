<?php
/*
Template Name: Events - Next Week
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
      <li><a href="<?php echo home_url('events-next-week'); ?>" class="active">Next Week</a></li>
    </ul>
  </div>
  <div id="content" class="site-content body_push" onclick="menuCheck(event);">
    <section class="page_title">
      <h1>Events Next Week</h1>
    </section>
    <section class="events">
      <?php get_events_next_week(); ?>
    </section> 
  </div>

<?php
get_footer();