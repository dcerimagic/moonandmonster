<?php get_header(); ?>

<div class="page-container txt-center home">
 
     <h1 class="site-title-visible">Meta comics and such</h1>
  <ul>
      <li class="character leia">
          <a href="<?php echo site_url(); ?>/meta-home">Old Homepage comic</a>
          <p>Characters explaining you how to use a website(!) <br>With author appearing as one of them. <br>Gosh, this looks like a pussy: (!)</p>
      </li>
      <li class="character thurston">
          <a href="https://www.patreon.com/moonandmonster" target="_blank">Patreon meta comic</a>
          <p>With Leia and Junior Dissing <br>the shit out of Maisie</p>
      </li>
      <li class="character author">
          <a href="<?php echo site_url(); ?>/blog">Read the blog</a>
          <p>I post pictures mostly. Some text. <br>I don't write much outside the scenario :P</p>
      </li>
      <li class="character maisie">
          <a href="<?php echo site_url(); ?>/bonus">Extra stuff</a>
          <p>Comics about m&m, deleted scenes, <br>promo comics, that sorta stuff</p>
      </li>
      <li>
          <a class="twitter-follow-button" href="https://twitter.com/cherrorist" data-size="large">Follow @cherrorist</a>
         <p>Follow me on Twitter</p>
      </li>
      <li>
          <a href="mailto:cherrorist@gmail.com">contact me</a>
          <p></p>
      </li>
      <!--<li>
          <a href="<?php echo site_url(); ?>/credits">Credits</a>
          <p><sup>&copy;</sup>2013-2017, Denis <span class="c">C</span>. all rights reserved.</p>
      </li>-->
  </ul>
</div>

<!--<p class="txt-center">A puddle comes from the Moon, lands in Spain.<br>Dysfunctional American family on a trip to Europe.<br>Moon is pissed. </p>-->
<div class="full fixed-bottom">
  <!--<p class="txt-center"><img src="<?php bloginfo('template_url'); ?>/images/bottomguys.png" alt=""></p>-->
  <p class="absolute right"><small><sup>&copy;</sup>2013-2016, Denis <span class="c">C</span>. all rights reserved. <a href="<?php echo site_url(); ?>/credits/">Credits</a></small></p>
</div>


<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
<?php get_footer(); ?>