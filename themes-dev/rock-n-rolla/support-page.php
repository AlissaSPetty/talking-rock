<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Talking_Rock
 * @since Talking_Rock 1.0
 * Template Name: Support Page
 */

get_header(); ?>
<?php
while (have_posts()) : the_post();
?>
	<div class="header-container">
		<?php the_post_thumbnail('single-post-thumbnail', array('class' => 'single-post-thumbnail')); ?>
        <header class="entry-header" >
            <div class="black-overlay">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </div>
        </header><!-- .entry-header -->
    </div>
    <div class="container">
        <div id="primary" class="content-area">
            <div class="row">
                <div class="col-md-8">
                    <main id="main" class="site-main" role="main">
                        <div class="support-page">
                            <div class="amazon-us">
                              <h3>Support Talking Rock Through Amazon US</h3>
                              <a href="https://www.amazon.com/?&tag=marstrrad-20&camp=216797&creative=493973&linkCode=ur1&adid=168XSVWDTRWRV4J7AJ7K&">
                                <img src="http://talkingrock.net/wp-content/uploads/2017/12/amazon.png" alt="">
                              </a>
                            </div>
                            <div class="amazon-ca">
                              <h3>Support Talking Rock Through Amazon Canada</h3>
                              <a href="https://www.amazon.ca/?&tag=talkingmeta01-20&camp=217069&creative=411773&linkCode=ur1&adid=15EA5V5477905GCX4QFV">
                                <img src="http://talkingrock.net/wp-content/uploads/2017/12/Amazon-ca.jpg" alt="">
                              </a>
                            </div>
                            <div class="amazon-uk">
                              <h3>Support Talking Rock Through Amazon UK</h3>
                              <a href="https://www.amazon.co.uk/?tag=talkingmetal-21&camp=6&creative=1062&linkCode=ez">
                                <img src="http://talkingrock.net/wp-content/uploads/2017/12/amazon-co.jpg" alt="">
                              </a>
                            </div>
                        </div>
                    </main><!-- #main -->
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div><!--row-->
        </div><!-- #primary -->
    </div><!-- container -->
<?php
endwhile; // End of the loop.
?>

<?php
get_footer();

?>