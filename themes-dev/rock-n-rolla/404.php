<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Talking_Rock
 * @since Talking_Rock 1.0
 */

get_header(); ?>

	<div class="container">
        <div id="primary" class="content-area archive-template">
        	<div class="row>">
            	<div class="col-md-8">
                
                
                    <main id="main" class="site-main" role="main">
            
                        <section class="error-404 not-found">
                            <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'talking-rock' ); ?></h1>
                            </header><!-- .page-header -->
            
                            <div class="page-content">
                                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try searching for a post?', 'talking-rock' ); ?></p>
            
                                <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
            
                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->
            
                    </main><!-- #main -->
        
                    <?php the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => '<span class="fa fa-chevron-left"></span>',  
						'next_text' => '<span class="fa fa-chevron-right"></span>'
					) ); 
					?>
                </div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div><!-- #primary -->
    </div><!-- container -->

<?php
get_footer();
