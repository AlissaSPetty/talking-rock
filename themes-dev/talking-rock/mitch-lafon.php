
<?php
//Template Name: Mitch Lafon
get_header();
?>
	
<div class='mitch-lafon'>
  <h1>Mitch Lafon</h1>  
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