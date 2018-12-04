jQuery(document).ready(function($) {
	"use strict";

	if( 'undefined' == typeof hootData )
		window.hootData = {};

	/*** Init lightslider ***/

	if( 'undefined' == typeof hootData.lightSlider || 'enable' == hootData.lightSlider ) {
		if (typeof $.fn.lightSlider != 'undefined') {
			$(".lightSlider").each(function(i){
				var self = $(this),
					settings = {
						item: 1,
						slideMove: 1, // https://github.com/sachinchoolur/lightslider/issues/118
						slideMargin: 0,
						mode: "slide",
						auto: true,
						loop: true,
						slideEndAnimatoin: false,
						slideEndAnimation: false,
						pause: 5000,
						adaptiveHeight: true,
						},
					selfData = self.data(),
					responsiveitem = (parseInt(selfData.responsiveitem)) ? parseInt(selfData.responsiveitem) : 2,
					breakpoint = (parseInt(selfData.breakpoint)) ? parseInt(selfData.breakpoint) : 960,
					customs = {
						item: selfData.item,
						slideMove: selfData.slidemove,
						slideMargin: selfData.slidemargin,
						mode: selfData.mode,
						auto: selfData.auto,
						loop: selfData.loop,
						slideEndAnimatoin: selfData.slideendanimation,
						slideEndAnimation: selfData.slideendanimation,
						pause: selfData.pause,
						adaptiveHeight: selfData.adaptiveheight,
						};
				$.extend(settings,customs);
				if( settings.item >= 2 ) { /* Its a carousel */
					settings.responsive =  [ {	breakpoint: breakpoint,
												settings: {
													item: responsiveitem,
													}
												}, ];
				}
				self.lightSlider(settings);
			});
		}
	}

	/*** Ticker ***/

	function tickeranim(currentItem, settings) {
		var visiblewidth = parseInt(currentItem.outerWidth(true)),
			moved = parseInt(currentItem.css('marginLeft')),
			distance = visiblewidth - moved, // since marginLeft is negative
			speed = (parseFloat(settings.speed)) ? parseFloat(settings.speed) : 0.035,
			duration = visiblewidth / speed;
		currentItem.animate({ marginLeft: -distance }, duration, 'linear', function() {
			currentItem.appendTo(currentItem.parent()).css('marginLeft', 0);
			tickeranim(currentItem.parent().children(':first'),settings);
		}); 
	};
	$('.ticker-msg-box').each(function(){
		var self = $(this),
			list = self.children('.ticker-msgs'),
			msgs = list.children('.ticker-msg'),
			settings = self.data(),
			listwidth = 0;
		if ( msgs.length ) {
			msgs.each(function() { listwidth += $(this).outerWidth( true ); });
			if ( listwidth > list.width() ) {
				self.css( 'width', self.width() );
				self.css( 'height', self.height() );
				msgs.clone().appendTo(list);
				tickeranim(list.children(':first'),settings);
				self.hover(
					function() { list.children().stop(); },
					function() { tickeranim(list.children(':first'),settings); }
				);
			}
		}
	});

	/*** Number Boxes ***/

	if (typeof $.fn.circliful != 'undefined') {

		var hootCircliful = function( $el ) {
			$el.find(".number-block-circle").each(function(i){
				var $self = $(this),
				settings = {
					animation: 1,
					foregroundBorderWidth: 10,
					percent: 100,
					},
				selfData = $self.data(),
				customs = {};
				if ( selfData.foregroundcolor ) customs.foregroundColor             = selfData.foregroundcolor;
				if ( selfData.backgroundcolor ) customs.backgroundColor             = selfData.backgroundcolor;
				if ( selfData.fillcolor ) customs.fillColor                         = selfData.fillcolor;
				if ( selfData.foregroundborderwidth ) customs.foregroundBorderWidth = selfData.foregroundborderwidth;
				if ( selfData.backgroundborderwidth ) customs.backgroundBorderWidth = selfData.backgroundborderwidth;
				if ( selfData.fontcolor ) customs.fontColor                         = selfData.fontcolor;
				if ( selfData.percent ) customs.percent                             = selfData.percent;
				if ( selfData.animation ) customs.animation                         = selfData.animation;
				if ( selfData.animationstep ) customs.animationStep                 = selfData.animationstep;
				if ( selfData.icon ) customs.icon                                   = selfData.icon;
				if ( selfData.iconsize ) customs.iconSize                           = selfData.iconsize;
				if ( selfData.iconcolor ) customs.iconColor                         = selfData.iconcolor;
				if ( selfData.iconposition ) customs.iconPosition                   = selfData.iconposition;
				if ( selfData.percentagetextsize ) customs.percentageTextSize       = selfData.percentagetextsize;
				if ( selfData.textadditionalcss ) customs.textAdditionalCss         = selfData.textadditionalcss;
				if ( selfData.targetpercent ) customs.targetPercent                 = selfData.targetpercent;
				if ( selfData.targettextsize ) customs.targetTextSize               = selfData.targettextsize;
				if ( selfData.targetcolor ) customs.targetColor                     = selfData.targetcolor;
				if ( selfData.text ) customs.text                                   = selfData.text;
				if ( selfData.textstyle ) customs.textStyle                         = selfData.textstyle;
				if ( selfData.textcolor ) customs.textColor                         = selfData.textcolor;
				// WPHOOT MOD Values
				if ( selfData.percentsign ) customs.percentSign                     = selfData.percentsign;
				if ( selfData.displayprefix ) customs.displayPrefix                 = selfData.displayprefix;
				if ( selfData.displaysuffix ) customs.displaySuffix                 = selfData.displaysuffix;
				if ( selfData.display ) customs.display                             = selfData.display;
				// WPHOOT MOD Values end
				$.extend(settings,customs);
				$self.circliful(settings);
			});
		};

		if( 'undefined' == typeof hootData.circliful || 'enable' == hootData.circliful ) {
			// Hootkit does not load Waypoints. It is upto the theme to deploy waypoints.
			if (typeof Waypoint === "function" && ( 'undefined' == typeof hootData.nbwaypoint || 'enable' == hootData.nbwaypoint )) {
				var offset = 75;
				if( 'undefined' != typeof hootData.numberblockOffset )
					offset = hootData.numberblockOffset;
				var nbwaypoints = $('.number-blocks-widget').waypoint(function(direction) {
					if(direction=='down') {
						hootCircliful( $(this.element) );
						this.destroy();
					}
					},{offset: offset + '%'});
			} else {
				$('.number-blocks-widget').each( function(){
					hootCircliful($(this));
				});
			}
		}

	}

	/*** Toggles ***/

	if( 'undefined' == typeof hootData.toggle || 'enable' == hootData.toggle ) {
		$('.hootkit-toggle').each( function() {
			var self = $(this),
				onlyone = self.is('.toggle-onlyone'),
				$units = self.find( '.hootkit-toggle-unit' ),
				$heads = self.find( '.hootkit-toggle-head' ),
				$boxes = self.find( '.hootkit-toggle-box' );
			$heads.click( function() {
				var $head = $(this),
					$box = $head.siblings( '.hootkit-toggle-box' ),
					$unit = $head.parent('.hootkit-toggle-unit');
				if ( onlyone ) {
					if ( $unit.is( '.hootkit-toggle-active' ) ) $box.addClass('currentClick');
					$units.removeClass( 'hootkit-toggle-active' );
					$boxes.not('.currentClick').slideUp('fast');
				}
				$unit.toggleClass( 'hootkit-toggle-active' );
				$box.not('.currentClick').slideToggle( 'fast' );
				$box.removeClass('currentClick');
			});
		});
	}

	/*** Tabs ***/

	if( 'undefined' == typeof hootData.tabs || 'enable' == hootData.tabs ) {
		$('.hootkit-tabs').each(function(i){
			var self    = $(this),
				nav     = self.find('.hootkit-tabhead'),
				tabs    = self.find('.hootkit-tabbox');

			nav.click( function() {
				var navself = $(this),
					tabid   = navself.data('tabcount'),
					tabself = tabs.filter('[data-tabcount="'+tabid+'"]');

				tabs.removeClass('current-tabbox');
				tabself.addClass('current-tabbox');
				nav.removeClass('current-tabhead');
				navself.addClass('current-tabhead');
			});
		});
	}

	/*** Scroller (Divider) ***/

	if( 'undefined' == typeof hootData.scroller || 'enable' == hootData.scroller ) {
		$('.hootkit-divider > a').on('click', function(e) {
			e.preventDefault();
			var target = $(this).attr('href');
			var destin = $(target).offset().top;
			if( target != '#page-wrapper')
				destin -= 50;
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destin}, 500 );
		});
	}

});