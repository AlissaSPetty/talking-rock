
<?php
//Template Name: Talking Rock
get_header();
?>
	
<div class='talking-rock'>
  <h1>Talking Rock</h1>  
  <?php $postslist = get_posts(array(
    'posts_per_page' => 3,
    'order' => 'ASC',
    'orderby' => 'title'
  ));
    if ($postslist) {
      foreach ($postslist as $post) :
        setup_postdata($post);
      ?>
      
      <?php
      endforeach;
      wp_reset_poçstdata();
    } ?>
</div>
<?php
get_footer();
?>