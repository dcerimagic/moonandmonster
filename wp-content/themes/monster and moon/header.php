<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory');?>/_sass/screen.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory');?>/_sass/swiper.min.css">
<link href='https://fonts.googleapis.com/css?family=Catamaran:400,700,300|Alegreya+Sans:400,700|Varela+Round|Maven+Pro:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/scripts.js"></script> 
<meta name="p:domain_verify" content="e57dcc4760f1c3440fd814333c617edb"/>
<meta name="comiccharts-site-verification" content="Re@lown3r" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		if ( is_page_template('page-patron') ) { 
     		get_template_part( 'template-parts/nav', 'patron' ); 
		} else {
     		get_template_part( 'template-parts/nav', 'support' ); 		
		};
	?>
<?php include_once("analyticstracking.php") ?>
