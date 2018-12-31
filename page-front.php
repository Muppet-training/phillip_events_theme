<?php
/*
Template Name: Homepage
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
  
  <section class="event_selector">
    <ul>
      <li>
        <a href="<?php echo home_url('events-today'); ?>">
          <div class="event_image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/beer.jpg)" alt="Listing Icon"/>
          </div>
          <div class="event_title">
            <h3>Today</h3>
            <p><?php echo date('jS M', strtotime('today'))?></p>
          </div>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('events-Tomorrow'); ?>">
          <div class="event_image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/surf.png)" alt="Listing Icon"/>
          </div>
          <div class="event_title">
            <h3>Tomorrow</h3>
            <p><?php echo date('jS M', strtotime('tomorrow'))?></p>
          </div>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('events-this-weekend'); ?>">
          <div class="event_image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/event.png)" alt="Listing Icon"/>
          </div>
          <div class="event_title">
            <h3>This Weekend</h3>
            <p><?php get_events_dates_this_weekend(); ?></p>
          </div>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('events-this-week'); ?>">
          <div class="event_image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/spark.png)" alt="Listing Icon"/>
          </div>
          <div class="event_title">
            <h3>This Week</h3>
            <p><?php get_events_dates_this_week(); ?></p>
          </div>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('events-next-week'); ?>">
          <div class="event_image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/dance.png)" alt="Listing Icon"/>
          </div>
          <div class="event_title">
            <h3>Next Week</h3>
            <p><?php get_events_dates_next_week(); ?></p>
          </div>
        </a>
      </li>
    </ul>
  </section>
  <section class="white_title home_title">
    <h1>
      You are on <br/>
      <span class="">Phillip Island Time</span>
      <span>Now</span>
    </h1>
    <img src="<?php echo get_template_directory_uri(); ?>/images/reLax-website.png)" alt="Listing Icon"/>
  </section>
  <section class="listings">
    <ul>
      <li>
        <a href="<?php echo home_url('category/food-drink/bars'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#cheers"></use>
          </svg>
          <h2>Eating Out</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('events-this-week'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#guitar"></use>
          </svg>
          <h2>Events</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('category/tourism/beaches'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#penguin"></use>
          </svg>
          <h2>Tourism</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
      <!-- <li>
        <a href="<?php echo home_url('category/accomodation/cheap'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#home"></use>
          </svg>
          <h2>Accommodation</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li> -->
      <li>
        <a href="<?php echo home_url('local-directory'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#contact-information"></use>
          </svg>
          <h2>Local Directory</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('category/gallery/public-art'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#paint-palette-and-brush"></use>
          </svg>
          <h2>Gallery</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('category/transport/taxi-uber'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#bus-stop"></use>
          </svg>
          <h2>Transport</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?php echo home_url('category/community/social-clubs'); ?>">
          <svg class="icon" shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#chat"></use>
          </svg>
          <h2>Community Groups</h2>
          <svg shape-rendering="geometricPrecision">
            <use xlink:href="<?php echo is_customize_preview() ? esc_url( get_template_directory_uri() . '/images/sprite.svg' ) : '' ; ?>#search"></use>
          </svg>
        </a>
      </li>
    </ul>
  </section>


  <div id="work-with-us"></div>
  <div class="query_form">              
    <h4>Phillip Island Time <span>Please Add More..</span></h4>
    <form method="POST">
      <div class="form_company">
        <Label>What would you like to see more of?<span>*</span></Label>
        <input id="company" name="company" type="text" onBlur="checkInput(this)" required/>
      </div>
      <div class="form_email">
        <Label>Contact email, to follow up with your request<span>*</span></Label>
        <input id="email" name="email" type="text" onBlur="checkInput(this)" required/> 
      </div>
      <div class="form_button">
        <button type="submit" name="submit" >Send Enquiry</button>
      </div>
    </form>
  </div>
  <footer class="footer">
    <h6>Thanks for scrolling to the bottom <span>this list is just some of what we offer</span><span>- Launched 25th  Dec 2018 -</span></h6>
      <div class="footer-menu">
        <div class="f1">
          <div class="contact_box">
            <a href="<?php echo home_url('events-this-week'); ?>">Events</a>
            <?php
            wp_nav_menu( array(
              'theme_location' => 'event-menu',
              'menu_id'        => 'event-menu',
            ) );
            ?>
          </div>
        </div>
        <div class="f2">
          <div class="contact_box">
            <a href="<?php echo home_url('local-directory'); ?>">Local Directory</a>
            <?php
            wp_nav_menu( array(
              'theme_location' => 'dir-menu',
              'menu_id'        => 'dir-menu',
            ) );
            ?>
          </div>
        </div>
        <div class="f3">
          <div class="contact_box">
            <a href="<?php echo home_url('/'); ?>">Join Our Website</a>
            <?php
            wp_nav_menu( array(
              'theme_location' => 'quick-menu',
              'menu_id'        => 'quick-menu',
            ) );
            ?>
          </div>
        </div>
        <div class="f4">
          <div class="contact_box">
            <a href="<?php echo home_url('/'); ?>">Contact Us</a>
            <ul>
              <li><a href="mailto:jonathan@phillipislandtime.com.au" >Jonathan @ phillipislandtime.com.au</a></li>  
              <li><a href="tel:0427857233" >0427 857 233</a></li>    
              <li class="social"> 
                <a href="http://instagram.com/reciperevenue" target="blank">
                  <div class="icon">
                    <svg class="svg_icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#instagram" />
                    </svg>
                  </div>
                </a>
                <a href="http://facebook.com/reciperevenue" target="blank">
                  <div class="icon">
                    <svg class="svg_icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#facebook" />
                    </svg>
                  </div>
                </a>
                <a href="http://youtube.com/reciperevenue" target="blank">
                  <div class="icon">
                    <svg class="svg_icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#youtube" />
                    </svg>
                  </div>
                </a>
                <a href="http://medium.com/reciperevenue" target="blank">
                  <div class="icon">
                    <svg class="svg_icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#medium" />
                    </svg>
                  </div>
                </a>
              </li>  
            </ul>
          </div>
        </div>
      </div>
    <a class="builtby" href="http://www.xenus.com.au">Built By Tom From Xenus 2018</a>
  </footer>

<?php
get_footer();
