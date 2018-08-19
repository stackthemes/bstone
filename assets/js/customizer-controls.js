/**
 * Customizer controls
 *
 * @package Bstone 
 */

( function( $ ) {
	
	/* Internal shorthand */
	var api = wp.customize;
	
	/**
	 * Helper class for the main Customizer interface.
	 *
	 * @since 1.0.0
	 * @class Bstone_Customizer
	 */
	
	Bstone_Customizer = {

		controls	: {},

		/**
		 * Initializes our custom logic for the Customizer.
		 *
		 * @since 1.0.0
		 * @method init
		 */
		init: function()
		{
			Bstone_Customizer._initToggles();
		},

		/**
		 * Initializes the logic for showing and hiding controls
		 * when a setting changes.
		 *
		 * @since 1.0.0
		 * @access private
		 * @method _initToggles
		 */
		_initToggles: function()
		{			
			// Loop through each setting. - Customizer Controls Toggle
			$.each( BstoneCustomizerToggles, function( settingId, toggles ) {
				
				// Get the setting object.
				api( settingId, function( setting ) {

					// Loop though the toggles for the setting.
					$.each( toggles, function( i, toggle ) {

						// Loop through the controls for the toggle.
						$.each( toggle.controls, function( k, controlId ) {

							// Get the control object.
							api.control( controlId, function( control ) {
								
								// Define the visibility callback.
								var visibility = function( to ) {
									control.container.toggle( toggle.callback( to ) );
								};

								// Init visibility.
								visibility( setting.get() );

								// Bind the visibility callback to the setting.
								setting.bind( visibility );
							});
						});
					});
				});
				
			}); // End Bstone Customizer Control Toggles

			// Loop through each setting. - Shop Customizer Controls Toggle
			if( BstoneShopCustomizerToggles ) {
				$.each( BstoneShopCustomizerToggles, function( settingId, toggles ) {
					
					// Get the setting object.
					api( settingId, function( setting ) {

						// Loop though the toggles for the setting.
						$.each( toggles, function( i, toggle ) {

							// Loop through the controls for the toggle.
							$.each( toggle.controls, function( k, controlId ) {

								// Get the control object.
								api.control( controlId, function( control ) {
									
									// Define the visibility callback.
									var visibility = function( to ) {
										control.container.toggle( toggle.callback( to ) );
									};

									// Init visibility.
									visibility( setting.get() );

									// Bind the visibility callback to the setting.
									setting.bind( visibility );
								});
							});
						});
					});
					
				}); // End Bstone Shop Customizer Control Toggles
			}
			
		}
		
	};
	
	$( function() { Bstone_Customizer.init(); } );
	
	// Toggle Customizer Sections
	
	api.bind('ready', function () {
		
		// Customizer Controls (On change show / hide sections)
		
		var BstoneControls = [			
			[
				'bstone-settings[footer-adv]',
				[
					'section-color-footer',
					'section-spacing-footer',
					'section-footer-typo-settings'
				],
				false,
				[
					'disabled'
				]
			],
			
			[
				'bstone-settings[footer-sml-layout]',
				[
					'section-color-footer-bar',
					'section-footer-bar-typo-settings',
					'section-spacing-footer-bar'
				],
				false,
				[
					'disabled'
				]
			],
        ];
		
		// Update Customizer Sections Status on Load
		
		ToggleSectionsOnLoad(api, BstoneControls);
		
		// Toggle Sections
		
		function ToggleSectionsOnLoad( api, BstoneControls ) {
			$.each( BstoneControls, function( index, controls ) {
				
				var sections 		= controls[1];
				var condition 		= controls[2];
				var condition_check = controls[3];
				
				api( controls[0], function( setting ) {
					
					var setupControl = function( control ) {
						var setActiveState, isDisplayed;
						isDisplayed = function() {
							if(condition===true) {
								return condition_check.includes(setting.get());
							}
							else {
								if(condition_check.includes(setting.get())===true) {
									return false;
								}
								else {
									return true;
								}
							}
						};
						setActiveState = function() {
							control.active.set( isDisplayed() );
						};
						setActiveState();
						setting.bind( setActiveState );
					};
					
					$.each( sections, function( i, sec_name ) {
						api.section( sec_name, setupControl );
					});					
					
				});
			});
		}
		
		// Add CSS Class to Text Transform Control
		var stpfx = 'customize-control-bstone-settings-';
		var text_transform_ctrls = [
			stpfx+'body-text-transform',
			stpfx+'default-body-text-transform',
			stpfx+'h1-text-transform',
			stpfx+'h2-text-transform',
			stpfx+'h3-text-transform',
			stpfx+'h4-text-transform',
			stpfx+'h5-text-transform',
			stpfx+'h6-text-transform',
			stpfx+'header-typo-text-transform',
			stpfx+'logo-typo-text-transform',
			stpfx+'tagline-typo-text-transform',
			stpfx+'nav-typo-text-transform',
			stpfx+'sidebar-typo-title-transform',
			stpfx+'sidebar-typo-text-transform',
			stpfx+'footer-typo-title-transform',
			stpfx+'footer-typo-text-transform',
			stpfx+'footer-bar-typo-title-transform',
			stpfx+'footer-bar-typo-text-transform',
			stpfx+'blog-typo-title-transform',
			stpfx+'blog-typo-entry-transform',
			stpfx+'single-typo-title-transform',
			stpfx+'btn-typo-text-transform',
			stpfx+'pagination-text-transform'
		];

		$.each( text_transform_ctrls, function( i, item_id ) {
			if ($('#'+item_id).length){
				$( "#" + item_id ).addClass("transform-ctrl");
			}
		});
		
	});
	
})( jQuery );