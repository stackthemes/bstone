/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button_container, button, menu, links, i, len;

	container = document.getElementById( 'bst-site-navigation' );
	if ( ! container ) {
		return;
	}

	button_container = document.getElementById( 'bst-mobile-menu-button' );
	if ( ! button_container ) {
		return;
	}

	button = button_container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {

					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );

	/**
	 * Toggle Submenu function
	 */
	function bst_toggleSubMenu() {
		var clicked_button = this;

		if ( ! clicked_button.classList.contains( 'bst-submenu-toggled-btn' ) ) {

			clicked_button.classList.add( 'bst-submenu-toggled-btn' );

			clicked_button.parentElement.classList.add( 'focus' );
		} else {

			clicked_button.classList.remove( 'bst-submenu-toggled-btn' );
			
			clicked_button.parentElement.classList.remove( 'focus' );
		}
	}

	/**
	 * Add sub menu open buttons for responsive menu
	 */
	var bstone_breakpoint = bstone.break_point;

	var parentList = container.querySelectorAll( '.menu-item-has-children, .page_item_has_children' );

	for ( i = 0; i < parentList.length; ++i ) {
		if ( null != parentList[i].querySelector( '.sub-menu, .children' ) ) {

			// Insert Toggle Button.
			var  toggleButton = document.createElement("BUTTON");        // Create a <button> element
				toggleButton.setAttribute("role", "button");
				toggleButton.setAttribute("class", "bst-sub-menu-toggle");
				toggleButton.setAttribute("aria-expanded", "false");
				toggleButton.innerHTML="<i class='bst-submenu-toggle-icon'></i><span class='screen-reader-text'>Menu Toggle</span>";
			parentList[i].insertBefore( toggleButton, parentList[i].childNodes[1] );

			toggleButton.addEventListener( 'click', bst_toggleSubMenu, true );

		};
	}

	/**
	 * Toggle responsive menu class
	 */
	function bst_add_responsive_menu_class() {
		var bst_page_body = document.getElementsByTagName('body')[0];

		if( bstone_breakpoint < bst_page_body.clientWidth ) {
			bst_page_body.classList.remove( 'bst-responsive-menu' );

			if ( bst_page_body.classList.contains( 'menu-toggled' ) ) {
				button.click();
			}
		} else {
			bst_page_body.classList.add( 'bst-responsive-menu' );
		}
	}

	bst_add_responsive_menu_class();

	window.addEventListener("resize", bst_add_responsive_menu_class);

} )();
