<?php
/**
 * Monster Theme functions and definitions
 *
 * @package Monster
 * @since Monster 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Monster 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 683; /* Default content width, primary sidebar active */


if ( ! function_exists( 'monster_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Monster 1.0
 */
function monster_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Monster Theme, use a find and replace
	 * to change 'monster' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'monster', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );


	/* Add support for custom backgrounds */
	$args = array(
		'default-color' => '000000',
		'default-image' => get_template_directory_uri() . '/images/swirlybackground.png',
	);
	add_theme_support( 'custom-background', $args );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'monster' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // monster_setup
add_action( 'after_setup_theme', 'monster_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Monster 1.0
 */
function monster_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'monster' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'monster_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function monster_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'monster-griffy', "$protocol://fonts.googleapis.com/css?family=Griffy" );
	wp_enqueue_style( 'monster-puritan', "$protocol://fonts.googleapis.com/css?family=Puritan:400,700,400italic,700italic" );
	wp_enqueue_style( 'monster-ranchers', "$protocol://fonts.googleapis.com/css?family=Spicy+Rice" );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if ( is_singular() && wp_attachment_is_image() )
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}
add_action( 'wp_enqueue_scripts', 'monster_scripts' );

/**
 * Enqueue fonts for custom header admin
 */
function monster_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'monster-griffy', "$protocol://fonts.googleapis.com/css?family=Griffy" );
	wp_enqueue_style( 'monster-puritan', "$protocol://fonts.googleapis.com/css?family=Puritan:400,700,400italic,700italic" );
}
add_action( 'admin_enqueue_scripts', 'monster_admin_scripts' );


/**
 * Enqueue styles for theme options
 */

function monster_theme_options_styles( $hook_suffix ) {

	if ( 'appearance_page_theme_options' != $hook_suffix )
		return;
	?>
	<style type="text/css">
		.description {
			float: left;
			margin: 0 20px 20px 20px;
			text-align: center;
			width: 140px;
		}
		.admin-monster {
			background: url(<?php echo get_template_directory_uri(); ?>/images/sprite.png) rgb(239,237,234) no-repeat;
			border: 10px solid #333;
			border-radius: 130px;
			box-shadow: 0 2px 5px 0 rgba(0,0,0,.1);
			clear: both;
			margin: 0 auto 10px auto;
			position: relative;
			width: 130px;
			height: 130px;
		}
		#vampire.admin-monster {
			background-position: -173px -432px;
		}
		#spider.admin-monster {
			background-position: -468px -453px;
		}
		#frankie.admin-monster {
			background-position: -336px -427px;
		}
		#jack.admin-monster {
			background-position: -17px -436px;
		}
		#demon.admin-monster {
			background-position: -115px -284px;
		}
		#skull.admin-monster {
			background-position: -290px -285px;
		}
		#themebeast.admin-monster {
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/themebeast.png);
			background-position: 50% 50%;
		}
		#eyes.admin-monster {
			background-color: #000;
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/eyes.png);
			background-position: 45% 50%;
		}
		#zombie.admin-monster {
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/zombie.png);
			background-position: 48% 50%;
		}

		@media 	only screen and (-moz-min-device-pixel-ratio: 1.5),
		only screen and (-o-min-device-pixel-ratio: 32),
		only screen and (-webkit-min-device-pixel-ratio: 1.5),
		only screen and (min-device-pixel-ratio: 1.5) {

			.admin-monster {
				background-image: url(<?php echo get_template_directory_uri(); ?>/images/sprite-2x.png);
				background-size: 600px auto;
			}
			#themebeast.admin-monster {
				background-image: url(<?php echo get_template_directory_uri(); ?>/images/themebeast-2x.png);
				background-size: 100px auto;
			}
			#eyes.admin-monster {
				background-image: url(<?php echo get_template_directory_uri(); ?>/images/eyes-2x.png);
				background-size: 102px auto;
			}
			#zombie.admin-monster {
				background-image: url(<?php echo get_template_directory_uri(); ?>/images/zombie-2x.png);
				background-size: 89px auto;
			}

		}

	</style>
<?php
}
add_action( 'admin_enqueue_scripts', 'monster_theme_options_styles' );

/**
 * Adjusts content_width value for full width page templates.
 */
function monster_content_width() {
	if ( is_page_template( 'page-nosidebar.php' ) ) {
		global $content_width;
		$content_width = 936;
	}
}
add_action( 'template_redirect', 'monster_content_width' );

/**
 * Return the number of daily posts in the last week
 */
function monster_daily_posts_in_last_week() {
	global $wpdb;

	$querystr = $wpdb->prepare(
		"SELECT COUNT( DISTINCT ( SUBSTRING( post_date, 1, 10 ) ) ) FROM $wpdb->posts WHERE post_date > %s AND post_type = 'post'",
		date( 'Y-m-d h:i:s', strtotime( '-1 weeks' ) )
	);

	return (int) $wpdb->get_var( $querystr );
}

/**
 * Return true if user has made a post on Oct. 31 (any year)
 */
function monster_halloween_post_date() {
	$query = new WP_Query( array(
		'posts_per_page' => 1,
		'monthnum'       => '10', //October
		'day'            => '31', //31st
	) );

	return ( $query->post_count > 0 );
}


/**
 * Implement the Custom Header feature
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates
 */
require get_template_directory() . '/inc/tweaks.php';

/**
 * Custom Theme Options
 */
require get_template_directory() . '/inc/theme-options/theme-options.php';


/**
 * Infinite Scroll Support
 *
 * Theme Name: Monster
 */

/**
 * Add theme support for Infinite Scroll. The check for this is in ../infinity.php in settings_api_init().
 */
function monster_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', 'content' );
}
add_action( 'init', 'monster_infinite_scroll_init' );

/**
 * This is the IS loop. That is to say if this were, hypothetically, called by get_template_part() it would most likely be housed in a file
 * named content-infinite-scroll.php or loop-infinite-scroll.php.
 *
 * For older themes, adjustments will most likely need to be made so that there is consistency between
 * the primary loop in either home.php or index.php and the following loop, which should adhere to current
 * standards of themeing (e.g. hiding comments).
 */
function monster_infinite_scroll_render() {
	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
	endwhile;
}
add_action( 'infinite_scroll_render', 'monster_infinite_scroll_render' );

/**
 * All IS-specific style overrides for individual themes will be in a CSS file named, appropriately, using the theme slug.
 */
function monster_infinite_scroll_enqueue_styles() {
	wp_enqueue_style( 'infinity-monster', plugins_url( 'monster.css', __FILE__ ), array(), '20121002' );
}
add_action( 'template_redirect', 'monster_infinite_scroll_enqueue_styles', 25 );

/**
 * infinite_scroll_has_footer_widgets() checks whether or not footer widgets are present. If they are present, then a button to
 * 'Load more posts' will be displayed and IS will not be triggered unless a user manually clicks on that button.
 *
 * Monster does not support footer widgets, so we always return false, UNLESS we're viewing the responsive version and the sidebar is dropped.
 */
function infinite_scroll_has_footer_widgets() {

	if ( jetpack_is_mobile( '', true ) && is_active_sidebar( 'sidebar-1' ) )
		return true;

	return false;
}
