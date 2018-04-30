<?php get_header(); ?>

<div class="page-container txt-center">
 
     <h1 class="site-title-visible">Moon & Monster</h1>
  <ul>
      <li class="character leia">
          <a href="<?php echo site_url(); ?>/comics">Read M&M!</a>
          <p>It's a fun packed rollercoaster ride! <br>Nah, I'm full of shit, it's a sci-fi drama.</p>
          <ul>
            
            <li class="nav-toggler"><span class="rotate-cw">&rsaquo;</span> Or skip to chapter <span class="rotate-cw">&rsaquo;</span>
                <ul>
                    <li><a href="<?php echo site_url(); ?>/comic/">Day One</a></li>
                    <li><a href="<?php echo site_url(); ?>/comic-day-two/">Day Two</a></li>
                    <li><a href="<?php echo site_url(); ?>/comic-day-three/">Day Three</a></li>
                    <li><a href="<?php echo site_url(); ?>/comic-day-four/">Day Four</a></li>
                    <li><a href="<?php echo site_url(); ?>/comic-day-five/">Day Five</a></li>
                    <li><a href="<?php echo site_url(); ?>/comic-day-six/">Day Six</a></li>
                    <li><a href="<?php echo site_url(); ?>/comic-day-seven/">Day Seven</a></li>
                </ul>
            </li>
          </ul>
      </li>
      <li class="character thurston">
          <a href="https://www.patreon.com/moonandmonster" target="_blank">Support M&M on Patreon!</a>
          <p>Show some love for the Moon <br>and make me feel appreciated! <br>You also get Moon&Monster in digital format</p>
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
  <p class="absolute right"><small><sup>&copy;</sup>2013-2017, Denis <span class="c">C</span>. all rights reserved. <a href="<?php echo site_url(); ?>/credits/">Credits</a></small></p>
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