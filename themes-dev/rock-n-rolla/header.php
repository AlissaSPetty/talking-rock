<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Talking_Rock
 * @since Talking_Rock 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108611471-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108611471-1');
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'talking-rock' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
    	<div class="search-form-wrapper">
        	<div class="container">
                <div class="search-form-coantainer">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
        
    	<div class="header-wrapper">
            <div class="header-top">
            	<?php if ( has_header_image() ) { ?>
                    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" class="header-image" />
                <?php } ?>
            
                <div class="container">
                	
                    <div class="row">
                    	<div class="col-md-6">
                            <div class="site-branding">
                                <p style="font-weight: 600; margin: 0; text-transform: uppercase">Mark Strigl's</p>
						   		<?php 
									if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									}
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p>
                                
                            </div><!-- .site-branding -->
                        </div>
                        <div class="col-md-6">
                        	<ul id="mobile-icon" class="social-media">
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
                                <li>
                                    <div class="search-icon-wrapper">
                                        <span id="search-icon"><i class="fa fa-search"></i></span>
                                    </div>
                                </li>                                                  
                            </ul>
                            <div id="show-icons">
                                <i class="fa fa-angle-down"></i>
                                <i class="fa fa-angle-up hide-icons"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="header-bottom">
                <div class="container">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
	</header><!-- #masthead -->

	<?php if(is_home() || is_front_page()){ 
		get_template_part( 'template-parts/slider' ) ;
		get_template_part( 'template-parts/featured-articles' ) ;
    } ?>	
    
	<div id="content" class="site-content">