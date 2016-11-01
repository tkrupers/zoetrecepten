<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package zoetrecepten
 */
?>

<?php	if (get_post_type() == 'recepten') { ?>
	<article class="col-xs-12 card card-recept clearfix">

<?php }	elseif (get_post_type() == 'blog') { ?>
	<article class="col-xs-12 card card-blog clearfix">

<?php } else { ?>
	<article class="col-xs-12 card clearfix">

<?php }	?>
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>">
				<div class="card-image">
					<div class="bekijk-recept">
						Bekijk
					</div>
					<?php the_post_thumbnail(array(350, 250)); ?>
				</div>
				<div class="caption">
					<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
				</div>
				<div class="displayMoment">
					<?php echo human_time_diff_nl( get_the_time('U'), current_time('timestamp') ) . ' geleden'; ?>
				</div>
			</a>
		</header><!-- .entry-header -->

		<div class="card-entry">
			<div class="difficulty">
				<?php if( get_field('moeilijkheidsgraad')) { ?>
			<?php

			if(get_field('moeilijkheidsgraad') == "1 ster") {
				echo '<i class="fa fa-star-o"
				data-toggle="tooltip"
				data-placement="top"
				title="Zeer makkelijk!"></i>';
			};

			if(get_field('moeilijkheidsgraad') == "2 sterren") {
				echo '
				<div
				data-toggle="tooltip"
				data-placement="top"
				title="Gemakkelijk">
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</div>';
			};

			if(get_field('moeilijkheidsgraad') == "3 sterren") {
				echo '
				<div
				data-toggle="tooltip"
				data-placement="top"
				title="Ietwat lastig">
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</div>';
			};

			if(get_field('moeilijkheidsgraad') == "4 sterren") {
				echo '
				<div
				data-toggle="tooltip"
				data-placement="top"
				title="Lastig">
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</div>';
			};

			if(get_field('moeilijkheidsgraad') == "5 sterren") {
				echo '
				<div
				data-toggle="tooltip"
				data-placement="top"
				title="Zeer lastig!">
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</div>';
			};
			};
			?>
		</div>
	</div><!-- .entry-content -->
	<footer class="card-footer">
		<?php if( get_post_type() == 'recepten' ) { ?>
		<span class="label label-primary">Recept</span>

		<?php } elseif( get_post_type() == 'blog' ) { ?>
		<span class="label label-default">Zoete praatjes</span>
		<?php } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
