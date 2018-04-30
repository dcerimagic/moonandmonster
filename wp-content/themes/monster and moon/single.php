<?php
/**
 * The template for displaying all single posts.
 * @package smtp2go
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<header class="page-header">
  <div class="page-container">
    <?php the_title('<h1>', '</h1>'); ?>
    <ul class="page-header__meta">
      <li><?php the_time('F jS, Y') ?></li>
    </ul>
  </div>
</header>

<section class="single-content">
  <?php the_content(); ?>
</section>


<?php endwhile; // End of the loop. ?>

<section class="case-studies page-group blog-layout related-posts">
  <div class="page-container">
    <h3>Related stuff</h3>
    <?php
      $cat = get_the_category();
      $catOK = $cat[0]->cat_ID; //if multiple categories
      $postID = $post->ID;
      query_posts(
        array(
          'post__not_in' => array($postID)
          )
        );
      while (have_posts()) : the_post(); ?>

      <a class="study" href="<?php the_permalink(); ?>">
        <?php the_title(); ?>

        <figure class="post__figure">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
        </figure>
      </a>

    <?php endwhile; ?>
  </div>
</section>

<?php
get_footer();
