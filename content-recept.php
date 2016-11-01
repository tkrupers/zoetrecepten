<?php 
$key_1_value = get_post_meta( get_the_ID(), 'Ingrediënten', true );
$bereiding = get_post_meta( get_the_ID(), 'Bereidingswijze', true);
$foto = get_post_meta( get_the_ID(), 'Fotorecept', true);


if( get_field('ingredientenlijst')  || !empty($key_1_value) ) : ?>


<div id="recipe" class="col-xs-12">

		<?php get_template_part('sidebar', 'nav-recept'); ?>

	<div class="col-xs-12 col-sm-4 benodigdheden" itemprop="ingredients">
		<h3>Benodigdheden</h3>

		<ul>
			<?php	
			if( ! empty( $key_1_value ) ) { 
				echo $key_1_value; 
			}
			?>
		</ul>

		<?php
		the_field('ingredientenlijst');
		?>
	</div>
	<div class="col-sm-8">
		<?php if( ! empty( $bereiding ) ) { ?>
		<h3>Zo maak je <?php echo the_title(); ?>:</h3>
		<div itemprop="recipeInstructions">
		<ol>
			<?php 
			echo $bereiding;
			?>
		</ol>
		</div>
		<?php } 
		$bereidingswijze2 = the_field('bereidingswijze2') ?>
		<?php if( ! empty( $bereidingswijze2 ) ) { ?>
		<p>
			<strong>Zo maak je <?php echo the_title(); ?></strong>
		</p>
		<?php
		echo $bereidingswijze2;
		}
		?>

	</div>

		<?php if( ! empty( $foto ) ) { ?>
		<img src="<?php echo $foto; ?>"/>
		<?php } 
		endif;?>

</div>