<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package zoetrecepten
 */
?>

<?php if ( in_category('featured')) { ?>
	<article class="col-sm-12 basic-card featured">
<?php } else { ?>
	<article class="col-sm-12 basic-card">
<?php }	?>

		<div class="margin-wrapper">

			<header class="entry-header">
				<a href="<?php the_permalink(); ?>">
					<div class="card-image">
						<?php the_post_thumbnail('medium'); ?>
					</div>

			</header><!-- .entry-header -->

			<div class="card-entry">
				<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
				</a>
			</div><!-- .entry-content -->

		</div>
		</article><!-- #post-## -->
