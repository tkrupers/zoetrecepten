<?php
/**
 * @package zoetrecepten
 */
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
?>

<article id="post-<?php the_ID(); ?>">
	<!-- Hero image -->
	<a href="<?php the_permalink(); ?>">
	<div class="new-post-image" >
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="new-post-home">
		<h1><?php the_title(); ?>	<small><?php the_date(); ?></small></h1>
	</a>
		<div class="entry-content">

				<?php echo get_excerpt(); ?>
		</div><!-- .entry-content -->
	</div><!-- /single-page-article -->
</article><!-- #post-## -->
