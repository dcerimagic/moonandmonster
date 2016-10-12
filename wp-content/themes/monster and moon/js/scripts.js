$(document).ready(function(){

//calculate and set slideshow dimensions
	var siteheight = $(window).height(),
        siteWidth = $(window).width();
    
    if(siteWidth > 980){
        siteheight < 1192 ? siteheight = 1192 : siteheight = siteheight;
        var	elwidth = siteheight*0.7069;

        $('.swiper-container').height(siteheight).width(elwidth);
        $('.daynav-container').width(elwidth+99).height(siteheight);
    }

//navigation toggler	
	var hamby = $('.hamby'),
		closer = $('.close'),
		siteNav = $('.navigation'),
		siteTitle = $('.site-title'),
		nav = $('nav');

	hamby.on('click', function(){
		$(this).fadeOut(100);
		closer.show();
		siteNav.fadeIn(300);
		siteTitle.fadeIn(300);
		nav.addClass('opened').height(siteheight);
	});
	closer.on('click', function(){
		$(this).hide();
		hamby.fadeIn(300);
		siteNav.hide();
		siteTitle.hide();
		nav.removeClass('opened').height(0);
	});

//toggle open list of chapters

var navToggler = $('.nav-toggler');
	navToggler.on('mouseover', function(){
		$(this).addClass('is-opened');
		var outerHeight = $(this).outerHeight();
		/*if(outerHeight > 20){
			$('body').addClass('overflow-hidden');
		};*/
		
	});
	navToggler.on('mouseout', function(){
		$(this).removeClass('is-opened');
		/*if(outerHeight < 20){
			$('body').removeClass('overflow-hidden')
		};*/
	});

//slideshow swiper initialization

    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        preventClicks: false,
        preventClicksPropagation: false,
        spaceBetween: 30,
        effect: 'fade'
    });
    
//if last slide is active
    $('.swiper-button-next, .swiper-button-prev').on('click', function(){
        if ($('.last-slide').hasClass('swiper-slide-active')){
            $('.swiper-container').css({'z-index':30});
            $('.swiper-button-prev').css({'left':'-3px'});
            $('.swiper-button-prev-page').css({'left':'30px'});
        }else{
            $('.swiper-container').css({'z-index':1});
            $('.swiper-button-prev').css({'left':'17px'});
            $('.swiper-button-prev-page').css({'left':'17px'});
        }
    });
  
// go fullscreen
  
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
  $('.fullscreen').click(function(){
	toggleFullScreen();
});
  
  //scroll to anchor
  $('[href^="#"]').click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 600);
	});

});