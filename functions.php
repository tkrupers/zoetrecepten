<?php
ob_start();
/**
 * zoetrecepten functions and definitions
 *
 * @package zoetrecepten
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'zoet__setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zoet__setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on zoetrecepten, use a find and replace
	 * to change 'zoet_' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zoet_', get_template_directory() . '/languages' );

		// Add custom post types to RSS feed
 	function myfeed_request($qv) {
  	if (isset($qv['feed']))
  		$qv['post_type'] = get_post_types();
  	return $qv;
  }
  add_filter('request', 'myfeed_request');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zoet_' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'zoet__custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Create custom post type: Recepten
			$labels = array(
				'name' => 'Recepten',
				'singular_name' => 'Recepten',
				'add_new' => 'Nieuw Recept',
				'add_new_item' => 'Voeg Nieuw Recept Toe',
				'edit_item' => 'Bewerk Recept',
				'new_item' => 'Nieuw Recept',
				'view_item' => 'Bekijk Recept',
				'search_items' => 'Zoek Recept',
				'not_found' =>  'Geen Recept Gevonden',
				'not_found_in_trash' => 'Geen Recepten Gevonden In De Prullenbak',
				);
			$args = array(
				'labels' => $labels,
				'menu_position' =>  5,
				'has_archive' => true,
				'public' => true,
				'hierarchical' => true,
				'taxonomies' => array('category', 'post_tag'),
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'custom-fields',
					'thumbnail',
					'page-attributes',
					'comments'
					)
				);
			register_post_type( 'recepten', $args );

	// Create custom post type: Blog
			$labels = array(
				'name' => 'Blog',
				'singular_name' => 'Blog',
				'add_new' => 'Nieuw Bericht',
				'add_new_item' => 'Voeg Nieuw Bericht Toe',
				'edit_item' => 'Bewerk Bericht',
				'new_item' => 'Nieuw Bericht',
				'view_item' => 'Bekijk Bericht',
				'search_items' => 'Zoek Bericht',
				'not_found' =>  'Geen Bericht Gevonden',
				'not_found_in_trash' => 'Geen Bericht Gevonden In De Prullenbak',
				);
			$args = array(
				'labels' => $labels,
				'menu_position' =>  6,
				'has_archive' => true,
				'public' => true,
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'custom-fields',
					'thumbnail',
					'page-attributes',
					'comments'
					),
				'taxonomies' => array('category', 'post_tag'),
				);
			register_post_type( 'blog', $args );
}
endif; // zoet__setup
add_action( 'after_setup_theme', 'zoet__setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function zoet__widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'zoet_' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'zoet__widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zoet__scripts() {
	wp_enqueue_style( 'zoet_-style', get_stylesheet_uri() );

	/* Font Awesome */
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css');

	/* Add Custom CSS */
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/public/css/custom.min.css' );

	/* Add Bootstrap JS */
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/public/js/script.min.js', array('jquery'), '', true );

	/* Add JS for specific Bootstrap JS Calls */
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/public/js/theme.min.js', array('jquery', 'script-js'), '', true );

	wp_enqueue_script('adf-script', '//s3.eu-central-1.amazonaws.com/onstuimig-tag-manager/base/adf-tm-base-min.js');

	wp_enqueue_script('pin-it', '//assets.pinterest.com/js/pinit.js');

	//wp_enqueue_script( 'zoet_-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'zoet_-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zoet__scripts' );

/**
* Async scripts loading
**/
add_filter( 'script_loader_tag', 'wsds_async_scripts', 10, 3 );
function wsds_async_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to async
	$async_scripts = array(
		'pin-it',
		'adf-script',
		'disqus',
	);

    if ( in_array( $handle, $async_scripts ) ) {
        return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}

//Add a Favicon
add_action( 'wp_head', 'zoetrecepten_add_favicon' );
function zoetrecepten_add_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
}

// AJAX CALLS
function more_post_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'cat' => 1,
        'offset' => $offset,
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) { $loop->the_post();
       the_content();
    }

    exit;
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

//Add custom post type Recepten to search query
add_filter('pre_get_posts', 'zoetrecepten_filter_search');
function zoetrecepten_filter_search($query) {
	if ($query->is_search) {
		$query->set('post_type', array('blog', 'recepten'));
	};
	return $query;
};

//Redirects search to single post when only 1 result
add_action('template_redirect', 'zoetrecepten_single_result');
function zoetrecepten_single_result() {
	if (is_search()) {
		global $wp_query;
		if ($wp_query->post_count == 1) {
			wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
		}
	}
}

// Human time
function human_time_diff_nl( $from, $to = '' ) {
	if ( empty( $to ) ) {
		$to = time();
	}

	$diff = (int) abs( $to - $from );

	if ( $diff < HOUR_IN_SECONDS ) {
		$mins = round( $diff / MINUTE_IN_SECONDS );
		if ( $mins <= 1 )
			$mins = 1;
		/* translators: min=minute */
		$since = sprintf( _n( '%s minuut', '%s minuten', $mins ), $mins );
	} elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
		$hours = round( $diff / HOUR_IN_SECONDS );
		if ( $hours <= 1 )
			$hours = 1;
		$since = sprintf( _n( '%s uur', '%s uren', $hours ), $hours );
	} elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
		$days = round( $diff / DAY_IN_SECONDS );
		if ( $days <= 1 )
			$days = 1;
		$since = sprintf( _n( '%s dag', '%s dagen', $days ), $days );
	} elseif ( $diff < 30 * DAY_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
		$weeks = round( $diff / WEEK_IN_SECONDS );
		if ( $weeks <= 1 )
			$weeks = 1;
		$since = sprintf( _n( '%s week', '%s weken', $weeks ), $weeks );
	} elseif ( $diff < YEAR_IN_SECONDS && $diff >= 30 * DAY_IN_SECONDS ) {
		$months = round( $diff / ( 30 * DAY_IN_SECONDS ) );
		if ( $months <= 1 )
			$months = 1;
		$since = sprintf( _n( '%s maand', '%s maanden', $months ), $months );
	} elseif ( $diff >= YEAR_IN_SECONDS ) {
		$years = round( $diff / YEAR_IN_SECONDS );
		if ( $years <= 1 )
			$years = 1;
		$since = sprintf( _n( '%s jaar', '%s jaren', $years ), $years );
	}

	/**
	 * Filter the human readable difference between two timestamps.
	 *
	 * @since 4.0.0
	 *
	 * @param string $since The difference in human readable text.
	 * @param int    $diff  The difference in seconds.
	 * @param int    $from  Unix timestamp from which the difference begins.
	 * @param int    $to    Unix timestamp to end the time difference.
	 */
	return apply_filters( 'human_time_diff_nl', $since, $diff, $from, $to );
}

//Custom excerpt
	function get_excerpt(){
		$excerpt = get_the_content();
		$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, 300);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$link = get_the_permalink();
		$button = "<a href='". $link ."' class='text-link'>Verder lezen</a>";
		$excerpt = $excerpt.'... <br/><br/>'. $button;
		return $excerpt;
	}

//Remove post from admin
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
    remove_menu_page('edit.php');
}

//Add custom post type to taxonomies
add_filter( 'pre_get_posts', 'zoetrecepten_add_custom_types_to_tax' );
function zoetrecepten_add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Get all your post types
		$post_types = get_post_types();

		$query->set( 'post_type', $post_types );
		return $query;
	}
}

//Add taxonomies of categorieen aan de custom post type recepten
add_action('init','add_categories_to_cpt');
function add_categories_to_cpt(){
    register_taxonomy_for_object_type('category', 'recepten');
    register_taxonomy_for_object_type('post_tag', 'recepten');
    register_taxonomy_for_object_type('category', 'blog');
    register_taxonomy_for_object_type('post_tag', 'blog');
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom functions
 */

//Add Google Analytics to footer
add_action('wp_footer', 'zoetrecepten_add_googleanalytics');
	function zoetrecepten_add_googleanalytics() { ?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-40838792-1', 'zoetrecepten.nl');
	ga('send', 'pageview');

	</script>
	<?php
}

// Add Bootstrap's IE conditional html5 shiv and respond.js to header
function conditional_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'conditional_js' );


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
