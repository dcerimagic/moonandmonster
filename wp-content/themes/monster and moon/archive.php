<?php
/**
 * The template for displaying archive pages.
 * @package smtp2go
 */

get_header(); ?>

<?php
if ( have_posts() ) : ?>

  <header class="page-header">
    <?php
      the_archive_title( '<h1 class="page-header__title">', '</h1>' );
      the_archive_description( '<div class="page-header__lead">', '</div>' );
    ?>
  </header>

  <?php
  /* Start the Loop */
  while ( have_posts() ) : the_post();

    // Include the Post-Format-specific template for the content.
    get_template_part( 'template-parts/content', get_post_format() );

  endwhile;

  the_posts_navigation();

else :

  get_template_part( 'template-parts/content', 'none' );

endif; ?>

<?php
get_sidebar();
get_footer();
