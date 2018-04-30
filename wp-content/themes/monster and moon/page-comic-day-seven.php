<?php get_header(); ?>
<div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="http://www.moonandmonster.com/wp-content/uploads/2017/02/mm_127_day7.jpg" alt="Moon and Monster - online indie comic by Denis Ć. Day 7"></div>
            <div class="swiper-slide"><img src="http://www.moonandmonster.com/wp-content/uploads/2017/02/mm_128_day7.jpg" alt="Moon and Monster - online indie comic by Denis Ć. Day 7"></div>
            <?php get_template_part( 'template-parts/slide-last' ); ?>
        </div>
    </div>
    <div class="daynav-container">
        <a class="swiper-button-next" title="NEXT PAGE">&gt;</a>
        <a class="swiper-button-prev" title="PREVIOUS PAGE">&lt;</a>
        <a class="swiper-button-prev-page" href="<?php echo site_url(); ?>/comic-day-six/" title="PREVIOUS DAY">&lt;</a>
        <!--<a class="swiper-button-next-page" href="<?php echo site_url(); ?>/comic-day-seven/" title="NEXT DAY">&gt;</a>-->
    </div>
<?php get_footer(); ?>
