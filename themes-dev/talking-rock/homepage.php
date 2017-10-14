
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
    if ($postslist) {
      foreach ($postslist as $post) :
        setup_postdata($post);
      ?>
      <div class="latestPost">
        <div class="featured-image">
          <img src="<?php the_post_thumbnail_url('medium'); ?> " alt="">
          <div class="date"><?php the_date('M d'); ?></div>
        </div>
        <div class="postInfo">
          <div class="date-long">
            Date:<?php the_date('m d, YYYY'); ?>
          </div>
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