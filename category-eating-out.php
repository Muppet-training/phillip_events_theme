<?php
/*
Template Name: Category
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
<div id="content" class="site-content body_push" onclick="menuCheck();">
  <section class="directory" id="directory">
    <section class="icon-list" id="icon-list">
      <?php get_category_icons();?>
    </section>
    <section id="dir-listings" class="dir-listings">
			<section class="page_title">
				<h1>Island Time <?php single_cat_title()?></h1>
				<span id='parent_cat_name' ><?php get_parent_cat_name()?></span>
				<span id='cat_name' ><?php single_cat_title()?></span>
      </section>
			
			<section class="page_listings">
				<ul>
					<?php
						// echo var_dump(get_the_category(get_the_ID()));
            // get_food_category_listings(get_category_by_slug(single_cat_title('',false))->cat_ID);
            $cat = clean(single_cat_title('',false));
						get_food_category_listings(get_category_by_slug($cat)->cat_ID);
					?>
				</ul>

			
			</section>
      <section class="icon-list">
        <?php // get_category_icons();?>
      </section>
    </section>
  </section>
</div>


<?php
get_footer();


