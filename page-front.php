<?php
/*
Template Name: Homepage
*/
get_header();
?>

<div id="page" class="site">
  <section class="event_selector">
    <ul>
      <li>Today</li>
      <li>Tomorrow</li>
      <li>This Weekend</li>
      <li>This Week</li>
      <li>Next Week</li>
    </ul>
  </section>
  <section class="white_title">
    <h1>
      You are on 🏝<br/>
      <span class="indent">Phillip Island Time Now</span>
    </h1>
  </section>
  <section class="listings">
    <ul>
      <li>
        <img src="<?php echo get_template_directory_uri(); ?>/images/cheers.png)" alt="Listing Icon"/>
        <h3>Food & Drink</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/images/search.png)" alt="Search Icon"/>
      </li>
      <li>
        <img src="<?php echo get_template_directory_uri(); ?>/images/guitar.png)" alt="Listing Icon"/>
        <h3>Events</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/images/search.png)" alt="Search Icon"/>
      </li>
      <li>
        <img src="<?php echo get_template_directory_uri(); ?>/images/home.png)" alt="Listing Icon"/>
        <h3>Accomodation</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/images/search.png)" alt="Search Icon"/>
      </li>
      <li>
        <img src="<?php echo get_template_directory_uri(); ?>/images/contact.png)" alt="Listing Icon"/>
        <h3>Local Directory</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/images/search.png)" alt="Search Icon"/>
      </li>
      <li>
        <img src="<?php echo get_template_directory_uri(); ?>/images/paint.png)" alt="Listing Icon"/>
        <h3>Gallery</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/images/search.png)" alt="Search Icon"/>
      </li>
      <li>
        <img src="<?php echo get_template_directory_uri(); ?>/images/bus.png)" alt="Listing Icon"/>
        <h3>Transport</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/images/search.png)" alt="Search Icon"/>
      </li>
    </ul>
  </section>


<?php
get_footer();
