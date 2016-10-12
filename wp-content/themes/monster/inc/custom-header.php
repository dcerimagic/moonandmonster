<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 *
 * @package Monster
 * @since Monster 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses monster_header_style()
 * @uses monster_admin_header_style()
 * @uses monster_admin_header_image()
 *
 * @package Monster
 */
function monster_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'monster_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'a5cb56',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'monster_header_style',
		'admin-head-callback'    => 'monster_admin_header_style',
		'admin-preview-callback' => 'monster_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'monster_custom_header_setup' );

if ( ! function_exists( 'monster_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see monster_custom_header_setup().
 *
 * @since Monster 1.0
 */
function monster_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
		#masthead hgroup {
			min-height: inherit;
			padding-bottom: 0;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // monster_header_style

if ( ! function_exists( 'monster_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see monster_custom_header_setup().
 *
 * @since Monster 1.0
 */
function monster_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
		font-family: Griffy, script;
		font-size: 48px;
		font-weight: normal;
		line-height: 1.5;
		margin: 0;
		text-align: center;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#desc {
		font-family: Puritan, Arial, Helvetica, sans-serif;
		font-size: 20px;
		font-weight: normal;
		margin: 0;
		text-align: center;
	}
	#headimg img {
		margin: 0 auto 10px;
	}
	</style>
<?php
}
endif; // monster_admin_header_style

if ( ! function_exists( 'monster_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see monster_custom_header_setup().
 *
 * @since Monster 1.0
 */
function monster_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
	</div>
<?php }
endif; // monster_admin_header_image