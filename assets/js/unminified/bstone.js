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