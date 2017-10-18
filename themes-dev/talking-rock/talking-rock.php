
<?php
//Template Name: Talking Rock
get_header();
?>
	
<h1 class="header">Talking Rock</h1>  
<div class='category talking-rock'>

  <?php $catquery = new WP_Query('cat=9&posts_per_page=100'); ?>
  <ul>
  
  <?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
  
  <li>
    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('large'); ?> " alt="<?php the_title(); ?>"></a>
    <div class="date">Date: <?php the_date(); ?></div>
    <div class='author'>Written By: <?php the_author(); ?></div>
    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
    <p><?php the_excerpt(); ?></p>
  </li>
  <?php endwhile;
  wp_reset_postdata();
  ?>
  </ul>
<?php
get_footer();
?>