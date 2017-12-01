<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Talking_Rock
 * @since Talking_Rock 1.0
 */

?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="footer-widget-container">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-one-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-two-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-three-widget'); ?>
                    </div>
				</div>
			</div>
        </div>
        
        <div class="copy-right">
            <div class="container">
            	<div class="row">
                	
                    <div class="col-md-6 col-md-push-6">
                    	<ul class="social-media">
							<?php if ( get_theme_mod( 'talking_rock_facebook_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_facebook_setting' ) ); ?>" title="<?php esc_attr_e('Facebook', 'talking-rock'); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_twitter_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_twitter_setting' ) ); ?>" title="<?php esc_attr_e('Twitter', 'talking-rock'); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if (get_theme_mod('talking_rock_snapchat_setting')) { ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('talking_rock_snapchat_setting')); ?>" title="<?php esc_attr_e('Snapchat', 'talking-rock'); ?>"><i class="fa fa-snapchat"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_google_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_google_setting' ) ); ?>" title="<?php esc_attr_e('Google Plus', 'talking-rock'); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_pinterest_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_pinterest_setting' ) ); ?>" title="<?php esc_attr_e('Pinterest', 'talking-rock'); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_linkedin_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_linkedin_setting' ) ); ?>" title="<?php esc_attr_e('Linkedin', 'talking-rock'); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_youtube_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_youtube_setting' ) ); ?>" title="<?php esc_attr_e('Youtube', 'talking-rock'); ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_tumblr_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_tumblr_setting' ) ); ?>" title="<?php esc_attr_e('Tumbler', 'talking-rock'); ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_instagram_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_instagram_setting' ) ); ?>" title="<?php esc_attr_e('Instagram', 'talking-rock'); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_flickr_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_flickr_setting' ) ); ?>" title="<?php esc_attr_e('Flicker', 'talking-rock'); ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_vimeo_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_vimeo_setting' ) ); ?>" title="<?php esc_attr_e('Vimeo', 'talking-rock'); ?>"><i class="fa fa-vimeo-square"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'talking_rock_rss_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'talking_rock_rss_setting' ) ); ?>" title="<?php esc_attr_e('RSS', 'talking-rock'); ?>"><i class="fa fa-rss"></i></a></li>
                            <?php } ?>  
                            <?php if ( get_theme_mod( 'talking_rock_email_setting' ) ) : ?>
                                <li><a href="<?php esc_attr_e('mailto:', 'talking-rock'); echo sanitize_email( get_theme_mod( 'talking_rock_email_setting' ) ); ?>"  title="<?php esc_attr_e('Email', 'talking-rock'); ?>"><i class="fa fa-envelope"></i></a></li>
                        <?php endif; ?>   
                                                                        
                        </ul>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <div class="site-info">
                            <?php if(is_home() && !is_paged()){ $theme = wp_get_theme();?>
                                <a href="<?php echo $theme['Author URI'] ?>"><?php _e('© Talking Rock 2017', 'talking-rock'); ?></a>
                            <?php } else{
                                echo '&copy; ' . esc_attr( get_bloginfo( 'name') ); 	
                            }?>
                        </div><!-- .site-info -->
                    </div>
                    
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
