<li>
  <a href="<?php echo get_search_slug(get_the_ID());?>">
    <div class="event_image">
      <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class="description">
      <h3><?php the_title()?></h3>
      <p>See more</p>
    </div>
  </a>
</li>