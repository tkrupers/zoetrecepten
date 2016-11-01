<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package zoetrecepten
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/img/favicon.ico">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>

</head>

  <body>
    <header class="top-header">
      <div class="container zoet-container">
            <div class="page-header">
              <div class="suikerbusje">
                <a href="<?php bloginfo( 'url' ); ?>">
                 <img src="<?php bloginfo('template_directory'); ?>/assets/img/suikerbusje.svg" alt="Zoetrecepten" />
               </div>
               <div class="page-logo">
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-zoet.svg" alt="Zoetrecepten" />
              </a>
            </div>

            <div class="social-icons <?php if(!is_front_page()) : ?> single <?php endif; ?>">
              <a href="http://www.facebook.com/zoetrecepten" target="_blank">
                <span class="fa-stack fa-lg" title="follow me on Facebook">
                  <i class="fa fa-circle facebook fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
              <a href="http://www.twitter.com/zoetrecepten" target="_blank">
                <span class="fa-stack fa-lg" title="follow me on Twitter">
                  <i class="fa fa-circle twitter fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
              <a href="http://www.pinterest.com/zoetrecepten" target="_blank">
                <span class="fa-stack fa-lg" title="follow me on Pinterest">
                  <i class="fa fa-circle pinterest fa-stack-2x"></i>
                  <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                </span>
              </a>
              <a href="http://www.instagram.com/zoetrecepten" target="_blank">
                <span class="fa-stack fa-lg" title="follow me on Instagram">
                  <i class="fa fa-circle instagram fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
              </a>
              <a href="https://www.youtube.com/channel/UCMsedoOOkOpiAsA5Aoo0amA" target="_blank">
                <span class="fa-stack fa-lg" title="follow me on Instagram">
                  <i class="fa fa-circle youtube fa-stack-2x"></i>
                  <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                </span>
              </a>
              <span class="fa-stack fa-lg" title="follow me on Snapchat">
                <i class="fa fa-circle snapchat fa-stack-2x"></i>
                <i class="fa fa-snapchat-ghost fa-stack-1x fa-inverse"></i>
              </span>
            </div>

          <div class="menu-header">
            <div class="menu-content">

              <div class="col-sm-9">
                <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#zoetrecepten-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <!-- <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a> -->

                    </div>
                    <?php
                    wp_nav_menu( array(
                      'menu'              => 'primary',
                      'theme_location'    => 'primary',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'collapse navbar-collapse',
                      'container_id'      => 'zoetrecepten-nav',
                      'menu_class'        => 'nav navbar-nav',
                      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                      'walker'            => new wp_bootstrap_navwalker()
                      ));
                      ?>
                    </div>
                  </nav>
                </div>
              <div class="col-sm-3 search-container">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>

              <!-- Zoetrecepten/billboard+mobile -->
              <div id='adf-billboard' style='text-align:center; margin:auto;'>
              </div>

              <?php if(is_front_page()) { ?>
                <div id="header-content" class="content-area container">
                  <div class="new-post-single col-sm-8">
                    <?php
                    $query = new WP_Query(
                      array(
                        'post_type'      => ['recepten', 'blog'],
                        'posts_per_page' => 1,
                        ) );

                    if ( $query->have_posts() ) :
        // The Loop
                      while ( $query->have_posts() ) : $query->the_post();
                    ?>

                    <?php get_template_part( 'content', 'new-post-home' ); ?>

                    <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                  </div><!-- /new-post-single -->
                  <div class="col-sm-4 home-sidebar hidden-xs hidden-sm">
                   <div class="home-author col-xs-12">
                     <div class="col-lg-6">
                       <div class="author-image"></div>
                     </div>
                     <div class="col-lg-6">
                       <div class="author-bio">
                         <h3>Late night baking,</h3>cheesecake, niet moeilijk doen, foodstyling, <strong>zoete inspiratie</strong> en HEERLIJKE recepten!
                         Liefde voor alles dat zoet is. <br>Geniet jij mee?<br>X <strong>Mariette</strong>
                       </div>
                     </div>
                   </div>

<h1>Nieuwsbrief</h1>

<div class="newsletter">
  <div class="newsletter-wrapper">
    <p><strong>Schrijf je in</strong> en ontvang een mailtje bij elke nieuwe zoete post     <span class="fa fa-heart"></span></p>

    <div class="input-group">
    <?php echo do_shortcode('[wysija_form id="1"]') ?>
    </div>
  </div>
</div>

</div><!-- /home-sidebar -->
      </div> <!-- /#header-content -->
    </div><!-- /header -->
  </div><!-- /container -->
</header>
<?php }; ?>

<!-- meetpixels Hero Jam 1 campagne -->
<div style="display:none;"><img src="http://pubads.g.doubleclick.net/gampad/ad?iu=/4045/Blogads/188898404&sz=1x1&t=campaign%3D188898404_429692164_1" /></div>

<!-- meetpixels Hero Jam 2 campagne -->
<div style="display:none;"><img src="http://pubads.g.doubleclick.net/gampad/ad?iu=/4045/Blogads/188898404&sz=1x1&t=campaign%3D188898404_429692164_2" /></div>
