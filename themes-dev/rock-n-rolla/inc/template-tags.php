<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Talking_Rock
 * @since Talking_Rock 1.0
 */

if ( ! function_exists( 'talking_rock_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function talking_rock_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'talking-rock' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-clock-o"></i> ' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'talking-rock' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on"> ' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	?><?php 
	if( comments_open() ) { ?>
		<span class="meta-info-comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php echo __('Leave a Comment', 'talking-rock') ?></a></span><?php 
	} else{?>
		<span class="meta-info-comment"><i class="fa fa-comments"></i> <?php echo __('Comment is Closed', 'talking-rock') ?></a></span>
	<?php }
}
endif;

if ( ! function_exists( 'talking_rock_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function talking_rock_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'talking-rock' ) );
		if ( $categories_list && talking_rock_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'talking-rock' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'talking-rock' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'talking-rock' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'talking-rock' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'talking-rock' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function talking_rock_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'talking_rock_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'talking_rock_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so talking_rock_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so talking_rock_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in talking_rock_categorized_blog.
 */
function talking_rock_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'talking_rock_categories' );
}
add_action( 'edit_category', 'talking_rock_category_transient_flusher' );
add_action( 'save_post',     'talking_rock_category_transient_flusher' );

function talking_rock_gallery_atts( $out, $pairs, $atts ) {
    $atts = shortcode_atts( array(
      'size' => 'medium',
    ), $atts );
 
    $out['size'] = $atts['size'];

    return $out;
 
}
add_filter( 'shortcode_atts_gallery', 'talking_rock_gallery_atts', 10, 3 );