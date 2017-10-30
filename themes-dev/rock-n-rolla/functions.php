<?php
/**
 * Talking Rock functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Talking_Rock
 * @since Talking_Rock 1.0
 */

if ( ! function_exists( 'talking_rock_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function talking_rock_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Talking Rock, use a find and replace
	 * to change 'talking-rock' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'talking-rock', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'talking-rock-featured-thumbnail',  700, 550 , true );
	add_image_size( 'talking-rock-mobile-post-thumbnail',  650, 650 , true );
	add_image_size( 'talking-rock-medium-thumbnail',  350, 350 , true );
	add_image_size( 'talking-rock-widget-post-thumb',  90, 90 , true );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'talking-rock' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'talking_rock_custom_background_args', array(
		'default-color' => '111111',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'talking_rock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function talking_rock_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'talking_rock_content_width', 640 );
}
add_action( 'after_setup_theme', 'talking_rock_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function talking_rock_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'talking-rock' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'talking-rock' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer One', 'talking-rock' ),
		'id' => 'footer-one-widget',
		'before_widget' => '<div class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Two', 'talking-rock' ),
		'id' => 'footer-two-widget',
		'before_widget' => '<div class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Three', 'talking-rock' ),
		'id' => 'footer-three-widget',
		'before_widget' => '<div class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'talking_rock_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function talking_rock_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() .'/assets/css/flexslider.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() .'/assets/css/prettyPhoto.css' );
	wp_enqueue_style('talking-rock-google-fonts', '//fonts.googleapis.com/css?family=Lato:400,300,700,400italic,900|Oswald:400,700');
	wp_enqueue_style( 'talking-rock-ie-style', get_stylesheet_directory_uri() . "/assets/css/ie.css", array()  );
	wp_style_add_data( 'talking-rock-ie-style', 'conditional', 'IE' );
	wp_enqueue_style( 'talking-rock-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery') );
	wp_enqueue_script( 'talking-rock-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'talking-rock-ie-responsive-js', get_template_directory_uri() . '/js/ie-responsive.min.js', array() );
	wp_script_add_data( 'talking-rock-ie-responsive-js', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'talking-rock-ie-shiv', get_template_directory_uri() . "/js/html5shiv.min.js");
	wp_script_add_data( 'talking-rock-ie-shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'talking-rock-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'talking-rock-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	$slider_speed = 6000;
	if ( get_theme_mod( 'talking_rock_slider_speed_setting' ) ) {
		$slider_speed = get_theme_mod( 'talking_rock_slider_speed_setting' ) ;
	}
	
	wp_localize_script( "talking-rock-custom-js", "slider_speed", array('vars' => $slider_speed) );
	
	$carousel_speed = 6000;
	if ( get_theme_mod( 'talking_rock_carousel_speed_setting' ) ) {
		$carousel_speed = get_theme_mod( 'talking_rock_carousel_speed_setting' ) ;
	}
	wp_localize_script( "talking-rock-custom-js", "carousel_speed", array('vars' => $carousel_speed) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'talking_rock_scripts' );

function talking_rock_catch_first_video() {
    global $post;
	
	preg_match_all('/(http|https).*(yout).*/i', $post->post_content, $matches);
    $url = isset($matches[0][0]) ? $matches[0][0]: '';
	
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match); 
	$id = isset($match[1]) ? $match[1]: '';
	//var_dump($id);

    return 'https://www.youtube.com/watch?v='.$id;
	
}
function talking_rock_audio() {
	$audioembed = wp_oembed_get(get_theme_mod( 'talking_rock_SC_embed_setting' ));
	if (strpos($audioembed, 'playlists') !== false) {
		$height = 350;
	}
	else{
		$height = 200;
	}
	$talkingrock_audioembed = wp_oembed_get(get_theme_mod( 'talking_rock_SC_embed_setting' ), array('width'=>1140, 'height'=>$height));
	$search = array('visual=true&','hide_cover=1');
	$newembed = str_replace( $search, 'autoplay=1&', $talkingrock_audioembed );
	return $newembed;
}

add_filter('wp_get_attachment_link', 'talking_rock_add_rel_attribute');
function talking_rock_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a rel="prettyPhoto[gallery1]" href', $link);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/widget.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
