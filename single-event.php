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
  <div id="content" class="site-content events_page body_push" onclick="menuCheck(event);">

    <?php while ( have_posts() ) : the_post(); 
      $post_array = get_post();
      $post = postToArray($post_array);
      // echo print_r($post);
      if($post != 0){
    ?> 
      <section class="event_map" id="map" >
        Event Map
      </section>
      <section class="event_details">

      
        <h1 id="e_title"><?php echo $post['title'];?></h1>
        <p class="organiser" id="e_oname"><?php echo $post['name'];?></p>
        <p><?php echo date('g:ia - l, F jS ', $post['start_stamp'])?></p>
        <p><?php echo date('g:ia - l, F jS ', $post['end_stamp'])?></p>
        <?php if(isset($post['lat']) && isset($post['lat'])){ ?>
        <span id="event_lat"><?php echo $post['lat'];?></span>
        <span id="event_lng"><?php echo $post['lng'];?></span>
          
        <?php
        }

          if($post['price'] == 0) { 
            echo '<p class="free">Free</p>';
          }else{
            echo '<p class="price">From $'.$post['price'].'</p>';
          }


        if(isset($post['link'])){
        ?>
        
        <div id="contact" onclick="contact_event();">
          <section>
            <p><?php echo $post['link'];?></p>
            <p>Phone: <?php echo $post['number'];?></p>
            <p id="e_oemail">Email: <?php echo $post['email'];?></p>
            <p id="e_id"><?php echo $post['id'];?></p>
            <p id="serverResponse"></p>
          </section>
          <section>
            <a target="_blank" href="<?php echo $post['link'];?>">Book Now</a>
          </section>
        </div>
          <?php } ?>

        
      </section>
      <section class="event_image">
        <img width="100%" height="100%" src="<?php echo $post['image'];?>"/>
      </section>
      <section class="event_description">
        <?php echo apply_filters('meta_content',$post['description']);?>
      </section>

    <?php 
      }else{
        echo '<p>Event Details Are Not Complete..</p>';
      }
    endwhile; ?>
  </div>


<?php
get_footer();
