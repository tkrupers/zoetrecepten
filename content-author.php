<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);

if ($tags) { ?>
<section id="author">
	<div class="text-center">

		<div class="relatedposts">
			<h2>Dit vind je misschien ook leuk</h2>

			<?php
			$tag_ids = array();
			foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			$args=array(
			'post_type' => array('recepten','blog'),
			'category__in' => $category_ids,
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>4, // Number of related posts to display.
			'caller_get_posts'=>1
			);

			$my_query = new wp_query( $args );

			while( $my_query->have_posts() ) {
			$my_query->the_post();
			?>

			<div class="relatedthumb hidden-xs hidden-sm">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(array(150,150)); ?>
					<div class="caption">
						<span class="title">
							<?php the_title(); ?>
						</span>   
					</div>
				</a>
			</div>
			<div class="relatedthumb visible-xs-block visible-sm-block">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(array(150,150)); ?>
					<div class="relatedthumb-caption-small">
						<span class="title">
							<?php the_title(); ?>
						</span>   
					</div>
				</a>
			</div>

			<?php } ?>
	</div>	
</section>
<?php 	
	}
	$post = $orig_post;
	wp_reset_query();
?>