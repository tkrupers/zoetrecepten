<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zoetrecepten
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">

			<div class="col-md-8 single-content-left">
				
            <!-- Start loop blog index -->
            <?php if( have_rows('zoet_categorieen', 2318) ): ?>

                <ul class="list-inline categorie-index">

                <?php while( have_rows('zoet_categorieen', 2318) ): the_row(); 

                    // vars
                    $titel = get_sub_field('recepten_categorie_titel');
                    $image = get_sub_field('recepten_categorie_foto');
                    $link = get_sub_field('recepten_categorie_link');

                    ?>

                    <li class="slide">

                        <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                        <?php endif; ?>

                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" width="300" height="300"/>

                        <?php if( $link ): ?>
                            </a>
                        <?php endif; ?>

                        <h3> <?php echo $titel; ?> </h3>
                    </li>

                <?php endwhile; ?>

                </ul>

            <?php endif; ?>
            <!-- Einde loop blog index -->

            </div><!-- /single-content-left -->

            <div class="col-md-4 single-content-right">
                <?php get_sidebar(); ?>
            </div><!-- /single-content-right -->
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_footer(); ?>
