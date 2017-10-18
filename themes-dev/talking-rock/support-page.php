
<?php
//Template Name: Support Page
get_header();
?>
	
<h1 class="header">Support Page</h1>  
<div class='support-page'>
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