<div class="recipe-header">

	<div class="entry-header">
		<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'thumb-recipe-header' ) ); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="meta-omschrijving">
			<span class="meta-label">Geschreven door <span itemprop="author"><?php the_author(); ?></span></span>  <span class="meta-label"><?php the_date(); ?></span>
		</div>

		<div class="recipe-details">

			<!-- Moeilijkheidsgraad -->
			<?php if( get_field('moeilijkheidsgraad')) { ?>
			<div class="moeilijkheidsgraad">
				<?php if(get_field('moeilijkheidsgraad') == "1 ster") {
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
		title="Zeer lastig!"
		>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
	</div>';
};?>
</div>
<?php };?><!-- /Moeilijkheidsgraag -->

<!-- Bereidingstijd -->
<?php if( get_field('bereidingstijd')) { ?>
<div class="bereidingstijd">
	<i class="foundicon-clock"></i> 
	<?php the_field('bereidingstijd'); ?>
</div>
<?php }; ?><!-- /Bereidingstijd -->

<!-- Personen -->
<?php if( get_field('personen')) { ?>
<div class="personen">
	Voor <span itemprop="recipeYield"><?php the_field('personen'); ?> personen</span>
</div>
<?php }; ?><!-- /Personen -->
</div><!-- /recipe-details -->
</div><!-- .entry-header -->


<ul id="nav-recept" class="list-inline recipe-buttons">
	<li id="print-button">
		<span class="fa-stack fa-lg" title="follow me on Facebook">
			<i class="fa fa-circle facebook fa-stack-2x"></i>
			<i class="fa fa-print fa-stack-1x fa-inverse"></i>
		</span>
	</li>
	<li>
		<a 
		class="email-button"
		href="mailto:?subject=Zoetrecepten: <?php the_title(); ?>&amp;body=<?php the_permalink() ?>" 
		title="Verstuur dit recept per email!">
		<span class="fa-stack fa-lg" title="follow me on Facebook">
			<i class="fa fa-circle facebook fa-stack-2x"></i>
			<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
		</span>
	</a>
</li>
</ul>
</div>