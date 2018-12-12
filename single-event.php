<?php
/*
 * Template Name: Full-width page layout
 * Template Post Type: event
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package base
 */

get_header();
?>
  <ul class="main_header" role="navigation">
    <li><a href="<?php echo home_url('/'); ?>"><h3>Phillip Island Time</h3></a></li>
    <li class="logo"><img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/small_star.png)"></li>
    <li class="search_button"><div class="dashicons dashicons-search"></div></li>
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
  <div id="content" class="site-content events_page body_push" onclick="menuCheck(event);">

    <?php while ( have_posts() ) : the_post(); 
      $post_array = get_post();
      $post = postToArray($post_array);
      // echo print_r($post);
    ?> 
    <section class="event_map">
      Event Map
    </section>
    <section class="event_details">
      <h1><?php echo $post['title'];?></h1>
      <p class="organiser">By Clip & Climb</p>
      <p><?php echo date('ga - l, F jS ', $post['start_stamp'])?></p>
      <p><?php echo date('ga - l, F jS ', $post['end_stamp'])?></p>
      <?php
        if($post['price'] == 0) { 
          echo '<p class="free">Free</p>';
        }else{
          echo '<p class="price">From $'.$post['price'].'</p>';
        }
      ?>
      

      <div>
        <section>
          <p>www.climpandclimb.com.au</p>
          <p>Phone: 0453 3.. ...</p>
          <p>Email: info@clipan...</p>
        </section>
        <section>
          <a href="##">Book Now</a>
        </section>
      </div>
      
    </section>
    <section class="event_image">
      <?php echo $post['image'];?>
    </section>
    <section class="event_description">
      <?php echo apply_filters('meta_content',$post['description']);?>
    </section>

    <?php endwhile; ?>
  </div>


<?php
get_footer();
