<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zoetrecepten
 */

if ( ! function_exists( 'zoet__paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function zoet__paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'zoet_' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'zoet_' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'zoet_' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'zoet__post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function zoet__post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'zoet_' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '%title', 'Previous post link', 'zoet_' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title', 'Next post link',     'zoet_' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function zoet__categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'zoet__categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'zoet__categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so zoet__categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so zoet__categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in zoet__categorized_blog.
 */
function zoet__category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'zoet__categories' );
}
add_action( 'edit_category', 'zoet__category_transient_flusher' );
add_action( 'save_post',     'zoet__category_transient_flusher' );
