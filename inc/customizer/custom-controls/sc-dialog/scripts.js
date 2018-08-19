jQuery( document ).ready( function( $ ) {

	var api = wp.customize;
	var tippyOptions = {
		zIndex: 99999999,
		theme: 'light',
		arrow: true
	};

	/**
	 * Open the parent dialog and show the tabs.
	 *
	 * @since 1.1.6
	 */
	$( document ).on( 'click', '.sc-dialog-button', function() {

		if ( $( this ).prop( 'disabled' ) ) {
			return;
		}

		$( this ).addClass( 'active' );

		var id = $( this ).data( 'dialog' );
		var title = $( this ).text() + ' Settings';

		$( '#' + id ).dialog( {
			title: title,
			dialogClass: 'sc-dialog sc-dialog-parent ' + id + '-dialog',
			width: 420,
			height: 550,
			resizable: false,
			position: {
				my: 'left+50 top+48',
				at: 'left top',
			},
			create: function() {
				var dialog = $( this );

				// Buttons.
				var closeBtn = $( '<button/>', {
					class: 'sc-close',
					html: '<span class="dashicons"></span>',
					click: function() {
						dialog.dialog( 'close' );
					}
				} );

				var resetBtn = $( '<button/>', {
					class: 'sc-reset',
					title: 'loading',
					html: '<span class="dashicons"></span>',
					click: function() {
						var activeTab = $( '.ui-tabs-nav .ui-state-active' );
						var reset = activeTab.attr( 'aria-controls' );

						$( document.body ).trigger( 'sc-dialog:reset', [ reset, $( this ) ] );
					}
				} );

				// Add reset button in titlebar.
				$( this ).parent().find( '.ui-dialog-titlebar' ).append( [ closeBtn, resetBtn ] );
			},
			open: function() {
				// Disable the buttons to prevent multiple dialogs.
				$( '.sc-dialog-button:not(".active")' ).prop( 'disabled', true );

				tippy('.sc-reset', {
					zIndex: 99999999,
					theme: 'light',
					arrow: true,
					onShow: function () {
						var activeTab = $( '.ui-tabs-nav .ui-state-active:visible' );
						var text = activeTab.text().trim();
						var content = this.querySelector('.tippy-tooltip-content');

						content.innerHTML = 'Reset settings of <strong>' + text + ' tab</strong> to defaults';
					},
				});

				// Build the tabs and their contents.
				scBuildTabs( $( this ), id );
			},
			beforeClose: function() {
				// Enable the buttons to allow a dialog.
				$( '.sc-dialog-button' ).removeClass( 'active' ).prop( 'disabled', false );
			}
		} );

	} ); // End of parent dialog.

	/**
	 * Open child dialog inside its parent dialog.
	 *
	 * @since 1.1.6
	 */
	$( document ).on( 'click', '.sc-child-dialog-button', function() {

		var id = $( this ).data( 'dialog' );
		var title = $( this ).data( 'title' );

		$( '#' + id + '-dialog' ).dialog({
			title: title,
			dialogClass: 'sc-dialog sc-dialog-child',
			width: 369,
			height: 480,
			resizable: false,
			position: { 
				my: 'left+25 top+35', 
				at: 'left top', 
				of: '.sc-dialog-parent:visible' 
			},
			create: function() {
				var dialog = $( this ),
					dialogId = dialog.attr( 'id' ).replace( '-dialog', '' ),
					dialogParams = api.section( dialogId ).params;

				// Buttons.
				var closeBtn = $( '<button/>', {
					class: 'sc-close',
					html: '<span class="dashicons dashicons-no"></span>',
					click: function() {
						dialog.dialog( 'close' );
					}
				} );

				var resetBtn = $( '<button/>', {
					class: 'sc-reset',
					title: 'Reset settings of <strong>this dialog</strong> to defaults',
					html: '<span class="dashicons dashicons-backup"></span>',
					click: function() {
						$( document.body ).trigger( 'sc-dialog:reset', [ dialogParams.scReset, $( this ) ] );
					}
				} );

				// Add reset button in titlebar.
				$( this ).parent().find( '.ui-dialog-titlebar' ).append( [ closeBtn, resetBtn ] );
			},
			open: function() {
				var content = $( this );

				$( '.sc-dialog-parent:visible' ).addClass( 'sc-dialog-child-open' );

				if ( $( 'ul', content ).length ) {
					return;
				}

				tippy('.sc-reset', tippyOptions);

				content.append( scLoadSettings( id ) );
			},
			close: function() {
				$( '.sc-dialog-parent:visible' ).removeClass( 'sc-dialog-child-open' );
			},
			drag: function() {
				// Move the parent dialog according to child dialog.
				$( '.sc-dialog-parent:visible' ).position({
					my: 'center center-30', 
					of: $( this ),
					collision: 'fit',
					// collision: 'none'
				});

				// Close open color picker.
				// $( '.sc-color-picker-holder input' ).spectrum( 'hide' );
			}
		});

	} ); // End of child dialog.

	/**
	 * When customizer is ready.
	 *
	 * @since 1.1.6
	 */
	api.bind( 'ready', function() {

		// Add 'Styles' button at top of Widgets section.
		$( '#sub-accordion-panel-widgets .panel-meta .accordion-section-title' ).append( '<button type="button" class="button sc-dialog-button sc-widgets-styles" data-dialog="sc_w_s_dialog">Styles</button>' );

	});

	/**
	 * Reset part of the dialogs settings. If the customizer is dirty, it saves
	 * then reset the settings.
	 *
	 * @since 1.1.6
	 */
	$( document.body ).on( 'sc-dialog:reset', function( event, reset, button ) {
		if ( typeof reset === 'undefined' ) {
			return;
		}

		var userConfirm = confirm( 'Are you sure to reset the settings to default?' );

		if ( ! userConfirm ) {
			return false;
		}

		button.addClass( 'sc-resetting' );

		// If Customizer has unsaved state, save first then reset.
		if ( ! api.state( 'saved' ).get() ) {
			api.previewer.save();

			api.bind( 'saved', function() {
				ScAjaxReset( reset );
			} );

			return false;
		}

		ScAjaxReset( reset );

		return false;
	} );

	/**
	 * Build the tabs inside the parent dialog and append settings.
	 *
	 * @since 1.1.6
	 * @param string content   Main content of the dialog.
	 * @param string dialogId The parent dialog section id.
	 * @return mixed           Necessary markup.
	 */
	function scBuildTabs( content, dialogId ) {

		// Return if the dialog opened once.
		if ( content.find( 'ul' ).length ) {
			return;
		}

		var dialogs = {};
		var tabs;
		var tabsId = dialogId + '-tabs';

		// Filter sections for dialogs.
		api.section.each( function( section ) {

			// Check if type of the section is dialog.
			if ( section.params.type !== 'sc-dialog' ) {
				return;
			}

			// Return if tab parameter is false.
			if ( section.params.scTab === false ) {
				return;
			}

			// Return if section doesn't belong to this dialog.
			if ( section.params.scBelong !== dialogId ) {
				return;
			}

			dialogs[ section.id ] = section.params;

		});

		// Sort based on priority.
		var dialogs = _.sortBy( dialogs, 'priority' );

		// Group dialogs based on tabs.
		tabs = _.groupBy( dialogs, function ( dialog ) { 
			return dialog.scTab['id'] + ':' + dialog.scTab['text'];
		} );

		// Create tabs markup.
		content.append( '<div id="' + tabsId + '">\
			<ul></ul>\
		</div>' );
		
		_.each( tabs, function( tab, index ) {

			// Tabs nav.
			var tab_nav = index.split( ':' );

			$( '#' + tabsId + ' > ul' ).append( '<li>\
				<a href="#' + tab_nav[0] + '">' + tab_nav[1] + '</a>\
			</li>' );
			
			$( '#' + tabsId ).append( '<div id="' + tab_nav[0] + '"></div>' );

			// Tabs content.
			_.each( tab, function( element, index ) {

				var tabId = element.scTab['id'];

				if ( element.scChild === false ) {
					return content.find( '#' + tabId ).append( scLoadSettings( element.id ) );
				}

				if ( ! $( '#' + tabId, '#' + tabsId ).find( 'ul' ).length ) {
					$( '#' + tabId, '#' + tabsId ).append( '<ul class="sc-row bst-sc-styles-cnt"></ul>' );
				}

				return $( '#' + tabId + ' > ul', '#' + tabsId ).append( '<li class="sc-col-5 textright"><span class="sc-style-title">' + element.title + '</span></li>\
					<li class="sc-col-7">\
						<button type="button" class="button sc-child-dialog-button" data-dialog="' + element.id + '" data-title="' + element.title + '">\
							<span class="dashicons dashicons-admin-generic"></span> Customize\
						</button>\
						<div id="' + element.id + '-dialog"></div>\
					</li>' );
			});

		} );
		// Initialte the tabs.
		$( "#" + tabsId ).tabs();

	}

	/**
	 * Load a section of settings from Customizer.
	 *
	 * @since 1.1.6
	 * @param  string sectionId ID of the section.
	 * @return object           An object contains of necessary markup.
	 */
	function scLoadSettings( sectionId ) {
		var settings = '';

		if ( typeof api.section( sectionId ) === 'undefined' ) {
			return 'Invalid section ID.';
		}

		settings = api.section( sectionId ).contentContainer;

		// Remove meta section which is useless.
		settings.children().remove( '.section-meta' );

		// Remove all the class then add necessary class. 
		settings.removeClass().addClass( 'sc-row' );

		return settings[0];
	}

	/**
	 * Send an Ajax request to reset the settings.
	 *
	 * @since 1.1.6
	 * @param string reset ID of the reset section.
	 */
	function ScAjaxReset( reset ) {
		setTimeout( function () {
			wp.ajax.send( 'sc_customizer_reset', {
				data: {
					nonce: sc_cz.nonce,
					reset : reset,
				},
				success: function( response ) {
					window.location.reload( true );
				}
			});
		}, 1000 );
	}

} ); // End of ready function.
