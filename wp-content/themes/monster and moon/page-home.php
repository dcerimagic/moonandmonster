<?php get_header(); ?>

<div class="page-container txt-center">
 
     <h1 class="site-title-visible"><span class="tight">Moon &</span><br>Monster</h1>
  <ul>
      <li>
          <a href="<?php echo site_url(); ?>/comic">Read M&M for free!</a>
          <p>You can currently read up to day four. <br>Day Five will be released for free <br>after day 7 is a wrap</p>
      </li>
      <li>
          <a href="https://www.patreon.com/moonandmonster" target="_blank">Support M&M on Patreon and get it all!</a>
          <p>Current Patrons release: Completed Day Six <br>That's because Patrons are awesome, and <br>they get to read it the moment it's made! <br></p>
      </li>
      <li>
          <a href="<?php echo site_url(); ?>/comic"></a>
          <p></p>
      </li>
      <li>
          <a href="<?php echo site_url(); ?>/comic"></a>
          <p></p>
      </li>
      <li>
          <a href=""></a>
          <p></p>
      </li>
      <li>
          <a href="<?php echo site_url(); ?>/comic"></a>
          <p></p>
      </li>
      <li>
          <a href="<?php echo site_url(); ?>/credits"></a>
          <p></p>
      </li>
  </ul>
</div>

<!--<p class="txt-center">A puddle comes from the Moon, lands in Spain.<br>Dysfunctional American family on a trip to Europe.<br>Moon is pissed. </p>-->
<div class="full fixed-bottom">
  <p class="txt-center"><img src="<?php bloginfo('template_url'); ?>/images/bottomguys.png" alt=""></p>
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