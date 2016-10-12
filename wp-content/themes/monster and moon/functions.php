<?php

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter('show_admin_bar', '__return_false');

add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 600, 250, true );

//add template-specific class to a page
add_filter( 'body_class','add_body_class' );
function add_body_class( $classes ) {
	$template=pathinfo(get_page_template());
 
    if ( 'page-comic.php' == $template['basename'] || 'page-comic-day-two.php' == $template['basename'] || 'page-comic-day-three.php' == $template['basename'] || 'page-comic-day-four.php' == $template['basename'] || 'page-comic-day-five.php' == $template['basename'] || 'page-comic-day-six.php' == $template['basename'] || 'page-comic-day-seven.php' == $template['basename'] || 'page-comic-day-eight.php' == $template['basename'] || 'page-comic-day-nine.php' == $template['basename'] || 'page-comic-day-ten.php' == $template['basename'] ) { 
        $classes[] = 'comic';
    } elseif ( 'page-home.php' == $template['basename'] ) {
    	$classes[] = 'home';
    } else {
    	$classes[] = 'generic';
    }
     
    return $classes;
     
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
?>