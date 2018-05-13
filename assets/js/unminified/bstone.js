/*
  Bstone Js
*/

// Menu Toggle

var bstone_menu_toggle  	 = document.querySelector('.main-header-menu-toggle');
var bstone_body  			 = document.querySelector('body');

bstone_menu_toggle.addEventListener( 'click', function ( event ) {
	event.preventDefault();
	
	bstone_menu_toggle.classList.toggle("toggled");
	bstone_body.classList.toggle("menu-toggled");
});

// Masonry Blog Posts
var masonary_required  = document.querySelector('.bst-masonry-posts');
var masonary_container = document.querySelector('.bst-posts-cnt');
var masonary_element   = document.querySelector('article');

if( null !== masonary_required && null !== masonary_container && null !== masonary_element ) {
	var elem = document.querySelector('.bst-masonry-posts .bst-posts-cnt');
	var msnry = new Masonry( elem, {
	    itemSelector: 'article',
		columnWidth: '.masonry-grid-sizer',
		isAnimated: true
	});
}

// Scroll to Top
var sctop_element   = document.querySelector('#bstone-scroll-top');

if( null !== sctop_element ) {
  document.getElementById("bstone-scroll-top").addEventListener("click", function(event) {

    event.preventDefault();

    var scrollDuration = 500;

    var scrollStep = -window.scrollY / (scrollDuration / 15),
      scrollInterval = setInterval(function(){
      if ( window.scrollY != 0 ) {
        window.scrollBy( 0, scrollStep );
      }
      else clearInterval(scrollInterval);
    },15);
  });

  window.onscroll = function() {
    toggle_bstone_sctop();
  };

  function toggle_bstone_sctop() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      document.getElementById("bstone-scroll-top").className = "sctop-enabled";
    } else {
      document.getElementById("bstone-scroll-top").className = "";
    }
  }
}