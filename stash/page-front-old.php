<?php
/*
Template Name: Page Front
*/
get_header();
?>

<div id="page" class="site">
<section class="overlay">

  <section class="footer">
    <h4 class="footer_top">Services We Offer</h4>
    <div class="footer-menu">
      <div class="f1">
        <div class="contact_box">
          <a href="<?php echo site_url(); ?>/services/kitchen-design">Kitchen Design</a>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'design-menu',
            'menu_id'        => 'design-menu',
          ) );
          ?>
        </div>
      </div>
      <div class="f2">
        <div class="contact_box">
        <a href="<?php echo site_url(); ?>/services">Services</a>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'service-menu',
            'menu_id'        => 'service-menu',
          ) );
          ?>
        </div>
      </div>
      <div class="f3">
        <div class="contact_box">
        <a href="<?php echo site_url(); ?>/resources">Resources</a>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'resource-menu',
            'menu_id'        => 'resource-menu',
          ) );
          ?>
        </div>
      </div>
      <div class="f4">
        <div class="contact_box">
          <a href="<?php echo site_url(); ?>/contact-us">Contact Us</a>
          <ul>
            <li><a href="mailto:chris@kdandc.com" >chris @ kdandc.com</a></li>  
            <li><a href="tel:0428438348" >1800 123 456</a></li>    
            <li class="social"> 
              <a href="http://instagram.com/kdandc" target="blank">
                <div class="icon">
                  <svg class="svg_icon">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#instagram" />
                  </svg>
                </div>
              </a>
              <a href="http://facebook.com/kdandc" target="blank">
                <div class="icon">
                  <svg class="svg_icon">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#facebook" />
                  </svg>
                </div>
              </a>
              <a href="http://youtube.com/kdandc" target="blank">
                <div class="icon">
                  <svg class="svg_icon">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#youtube" />
                  </svg>
                </div>
              </a>
              <a href="http://medium.com/kdandc" target="blank">
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
  </section>
</section>
<section class="header">
  <div class="header_image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/kitchen.jpg)">
    <section id="navbar" class="nav">
        <ul> 
          <li id="toggle" onClick={toggle()} >
            <a href="#content">
              <div class="icon">
                <svg class="svg_icon">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons.svg#menu" />
                </svg>
              </div>
            </a>
          </li>
          <li><a href="<?php echo site_url(); ?>/"><img id="logo" src="<?php echo get_template_directory_uri(); ?>/images/kdcb.png"/></a></li>
          <li>
            <a href="<?php echo site_url(); ?>/services">Services</a>
            
            <a href="<?php echo site_url(); ?>/projects">Projects</a>
						<a href="<?php echo site_url(); ?>/ask-chris">#askChris</a>
						<a href="#work-with-us" class="top_button">Free Consultation</a>
          </li>
        </ul>
    </section>
  </div> <!-- End Header Image -->
  <section class="header_title">
    <h1>Kitchen Design<span class="no_break"><br/></span> & Construct</h1>
  </section>
  <section class="our_clients">
    <p>We proudly partner with the leading suppliers in the industry</p>
    <div class="client_logos">
      <ul>
        <li>
          <div class="client_logo">
            <img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/taylor.png)">
          </div>
        </li>
        <li>
          <div class="client_logo">
            <img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/rational.png)">
          </div>
        </li>
        <li>
          <div class="client_logo">
            <img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/winter.png)">
          </div>
        </li>
        <li>
          <div class="client_logo">
          <img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/gfe.png)">
          </div>
        </li>
        <li class="hide_logo">
          <div class="client_logo">
          <img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/henny.png)">
          </div>
        </li>
        <li class="hide_logo">
          <div class="client_logo">
          <img class="why_icon" src="<?php echo get_template_directory_uri(); ?>/images/skope.png)">
          </div>
        </li>
      </ul>
    </div>
  </section>
</div> <!-- End Header -->




<a href="#work-with-us">
  <section class="list inform">
    <div>
      <h3>
        You can buy equipment on the internet.. <br/>
        It takes experience to bring the equipment together
        to maximise the of profitably of your business 
      </h3>
      <!-- <p>Until then call us </p> -->
    </div>
  </section>
</a>

<div class="angle"></div>
<section class="topic marketing">
  <div class="design_section">
    <div class="design_text">
      <h3>Kitchen Design</h3>
      <p>Time is money.  If your kitchen or bar generates 100% of your profit, wouldn’t it be worth consulting with a professional kitchen designer to maximise productivity?</p>
      <ul class="text">
        <li>Get the job done, on schedule, with full compliance and to the expected quality </li>
        <li>Work with a team of experts you can rely on</li>
        <li>Our service is ongoing, it doesn’t stop when the job is delivered</li>
      </ul>
    </div>
    <div class="design_image">
      <img src="<?php echo get_template_directory_uri(); ?>/images/design.png)"/>
    </div>
  </div>
</section>
<div id="our-team"></div>
<section class="team">
  <a href="<?php echo site_url(); ?>/services">
    <h3>Services</h3>
  </a>
  <hr/>
  <?php get_promo_circle_services_posts() ?>
</section>

<section class="list inform">
  <div>
    <h3>We bring out team of experts together to get the job done, on schedule, with full compliance and to the expected quality </h3>
  </div>
</section>

<section id="articles" class="callout callout_2">
  <a href="<?php echo site_url(); ?>/our-team">
    <div class="wrapper">
      <h1>Projects</h1>
      <h2>Inspiration & ideas to get the creative juices flowing</h2>
      <p>W We are incredibly proud of our previous projects, and we work hard to maintain a high standard across every project we touch</p>
    </div>
  </a>
</section>

<?php echo get_promo_projects_posts(); ?>

<section class="team client">
  <h3>What Our Clients Say </h3>
  <p>We’re delighted to have formed long-term partnerships with our clients, and to see their businesses grow. Below, they kindly share their experiences working with KD&C</p>
  <hr/>
  <div class="comments">
    <div class="comment_img">
      <img src="<?php echo get_template_directory_uri(); ?>/images/kevin.jpeg)"/>
    </div>
    <div class="comment_text">
      <p>The first people I’d call would be the team at Kitchen Design & Construct to make sure the kitchen is right and it has my exact requirements and designs. It takes a lot off your mind when it just happens, it’s in right and there are no problems.</p>
      <p class="name">Lana Troung</p>
      <p class="business">Top Paddock</p>
    </div>
  </div>
  <div class="comments middle_comment">
    <div class="comment_text">
      <p>The first people I’d call would be the team at Kitchen Design & Construct to make sure the kitchen is right and it has my exact requirements and designs. It takes a lot off your mind when it just happens, it’s in right and there are no problems.</p>
      <p class="name">Peter Innes</p>
      <p class="business">Top Paddock</p>
    </div>
    <div class="comment_img">
      <img src="<?php echo get_template_directory_uri(); ?>/images/kevin.jpeg)"/>
    </div>
  </div>
  <div class="comments">
    <div class="comment_img">
      <img src="<?php echo get_template_directory_uri(); ?>/images/kevin.jpeg)"/>
    </div>
    <div class="comment_text">
      <p>The first people I’d call would be the team at Kitchen Design & Construct to make sure the kitchen is right and it has my exact requirements and designs. It takes a lot off your mind when it just happens, it’s in right and there are no problems.</p>
      <p class="name">Djin Siauw</p> 
      <p class="business">Tosaria Restaurant Mulgrave </p>
    </div>
  </div>
</section>


  <!-- <section class="list inform">
    <div>
      <h3>We know we have been successful when our customers repurchase or recommends us.</h3>
    </div>
  </section> -->

  <section id="articles" class="callout callout_2">
    <a href="<?php echo site_url(); ?>/ask-chris">
      <div class="wrapper ask">
        <h1>Our Hindsight Advice</h1>
        <h2>#askChris so you can learn from his experience, and avoid the mistakes he has seen over the years.</h2>
      </div>
    </a>
	</section>

  <?php echo get_promo_askchris_posts(); ?>

  <section class="inform">
    <div class="scroll">
      <h3>Keep Scrolling..</h3>
      <p>Clearly you are interested in maximising the opportunity infront of you. The quickest way to achieve this is to Contact Us or click here to download our free start up guide.</p>
    </div>
  </section>


<?php
get_footer();
