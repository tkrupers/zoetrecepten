<?php
/**
 * @package zoetrecepten
 */
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
?>

<article id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Recipe">
	<?php the_title( '<h1 class="single-page-title" itemprop="name">', '</h1>' ); ?>
	<!-- Hero image -->
	<div class="single-hero-image">
		<?php the_post_thumbnail(array(800, 500), array( 'itemprop' => 'image')); ?>
	</div>

	<div class="single-page-article">

		<div class="entry-content" itemprop="description">

			<?php the_content(); ?>

			<!--<div class="pin-it-button-wrapper">
				<a data-pin-do="buttonBookmark" null href="//www.pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
			</div>-->

		</div><!-- .entry-content -->

	</div><!-- /single-page-article -->

	<?php if(is_singular('recepten')) : ?>
		<section class="recipe">
			<?php get_template_part('content', 'recept'); ?>
		</section>
	<?php endif; ?>
</article><!-- #post-## -->
