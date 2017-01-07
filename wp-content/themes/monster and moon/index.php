<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package smtp2go
 */

get_header(); ?>




<section class="page-container blog-layout">
  <div class="preview-list">
    <?php while ( have_posts() ) : the_post(); ?>
    <a class="permalink" href="<?php the_permalink(); ?>">
      <figure>
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
        </figure>
      <?php the_content(); ?>
    </a>
    <?php endwhile; ?>
  </div>
</section>


<?php
get_footer();
