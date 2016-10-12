<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>



<header class="page-header">
  <div class="page-container">
    <h1>Alternative Art <br><small></small></h1>
    <div class="single-content">
    <p>.. or if moon and monster was a different kind of comic</p>
    <p>Yeah, sometimes I imagine how someone else would have done it, or what if M&M was created in different time, or if it was a diffeent genre..</p> 
    <p>You can get your hands on hq files, or even signed prints by <a href="https://www.patreon.com/moonandmonster" target="_blank">supporting M&M on Patreon</a>. So head over there and show me some love!</p>    
    </div>
  </div>
</header>

<?php

// The Loop
while ( have_posts() ) : the_post(); ?>

<section class="single-content">
<h2><?php the_title(); ?></h2>


<?php the_content(); ?>


<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
</section>



<?php get_footer(); ?>