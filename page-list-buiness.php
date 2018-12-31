<?php
/*
Template Name: List Business
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
      <li><a href="<?php echo home_url('events-today'); ?>" class="active">Today</a></li>
      <li><a href="<?php echo home_url('events-tomorrow'); ?>">Tomorrow</a></li>
      <li><a href="<?php echo home_url('events-this-weekend'); ?>">This Weekend</a></li>
      <li><a href="<?php echo home_url('events-this-week'); ?>">This Week</a></li>
      <li><a href="<?php echo home_url('events-next-week'); ?>">Next Week</a></li>
    </ul>
  </div>
  <div id="content" class="site-content body_push" onclick="menuCheck(event);">
    <section class="page_title">
      <h1>List Your Business</h1>
    </section>
    <section class="list_link">
      <ul>
        <li>
          <a href="https://goo.gl/forms/IMlTq5CupDtYYGMh1" target="_blank">List Your Service</a>
        </li>
        <li>
          <a href="https://goo.gl/forms/M2cH778a6Y1jGDh43" target="_blank">List Your Venue</a>
        </li>
        <li>
          <a href="https://goo.gl/forms/5dMCYPYsdhVJgq502" target="_blank">List Your Accommodation</a>
        </li>
        <li>
          <a href="https://goo.gl/forms/vsziIYL1kaVHN2ag2" target="_blank">List Your Transportation Service</a>
        </li>
        <li>
          <a href="https://goo.gl/forms/Z4vnWdC4Hb3O4dhl2" target="_blank">List Your Community Group</a>
        </li>
      </ul>
    </section>
  </div>
<?php
get_footer();