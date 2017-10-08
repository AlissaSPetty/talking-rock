<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<?php 
    get_header();
    if (have_posts()) :
      while (have_posts()) :
      the_post();
    the_content();
    endwhile;
    endif;
    get_sidebar();
    get_footer();
    ?>