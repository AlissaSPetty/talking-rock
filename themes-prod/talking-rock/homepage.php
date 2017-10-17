
<?php
//Template Name: Homepage
get_header();
?>
	
<div class='homepage'>
  <h1>Latest News</h1>  
  <?php $postslist = get_posts(array(
    'posts_per_page' => 3,
    'order' => 'ASC',
    'orderby' => 'title'
  ));
  ?>
  <div class='swiper'>
    <!-- Slider main container -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
      <div class="swiper-slide">Slide 10</div>
      </div>

      <div class="swiper-pagination"></div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
    <?php if ($postslist) {
      foreach ($postslist as $post) :
        setup_postdata($post);
      ?>
      <div class="latestPost">
        <div class="featured-image">
          <img src="<?php the_post_thumbnail_url('medium'); ?> " alt="">
          <div class="date"><?php the_date('M d'); ?></div>
        </div>
        <div class="postInfo">
          <div class="date">Date: <?php the_date(); ?></div>
          <h3><?php the_title(); ?></h3>
          <p><?php the_excerpt(); ?></p>
          <div class='ctaBtn'><a href="<?php echo get_permalink($post->ID); ?>">Read More</a></div>
        </div>
      </div>
      <?php
      endforeach;
      wp_reset_postdata();
    } ?>
</div>