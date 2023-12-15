
var Mazo = '';

(function($) {
	
	"use strict";


/**
/**
Core script to handle the entire theme and core functions
**/
Mazo = function(){
	/* Search Bar ============ */
	
	if(typeof mazo_js_data == 'undefined') {
		var siteUrl = '/';
	}else{
		var siteUrl = mazo_js_data.template_directory_uri+'/';	
	}
	
	var screenWidth = $( window ).width();
	
	var homeSearch = function() {
		'use strict';
		/* top search in header on click function */
		var quikSearch = jQuery("#quik-search-btn");
		var quikSearchRemove = jQuery("#quik-search-remove");
		
		quikSearch.on('click',function() {
			jQuery('.dz-quik-search').fadeIn(500);
			jQuery('.dz-quik-search').addClass('On');
		});
		
		quikSearchRemove.on('click',function() {
			jQuery('.dz-quik-search').fadeOut(500);
			jQuery('.dz-quik-search').removeClass('On');
		});	
		/* top search in header on click function End*/
	}
	
	/* One Page Layout ============ */
	var onePageLayout = function() {
		'use strict';
		var headerHeight =   parseInt(jQuery('.onepage').css('height'), 10);
		jQuery(".scroll").unbind().on('click',function(event) 
		{
			event.preventDefault();
			
			if (this.hash !== "") {
				var hash = this.hash;	
				hashToScroll(hash);
			}   
		});
		
		
		if(window.location.hash != ''){
			var pageHash = window.location.hash;
			hashToScroll(pageHash);
		}
		
		
		function hashToScroll(hash){
			var seactionPosition = jQuery(hash).offset().top;
			var headerHeight =   parseInt(jQuery('.header').css('height'), 10);
			
			
			jQuery('body').scrollspy({target: ".navbar", offset: headerHeight+2}); 
			
			var scrollTopPosition = seactionPosition - (headerHeight);
			
			jQuery('html, body').animate({
				scrollTop: scrollTopPosition
			}, 800, 'swing', function(){
				console.log(scrollTopPosition);
				console.log('test');
			});
		}
		
		
		//jQuery('body').scrollspy({target: ".navbar", offset: headerHeight + 2});  
		
		jQuery(window).on('load',function () {
			var checkActive = jQuery("#navbarNavDropdown ul.navbar-left li.menu-item").hasClass('active');
			if(!checkActive)
			{
				jQuery("#navbarNavDropdown ul.navbar-left li:first-child").addClass('active');	
			}
		});
		
		/* One Page Setup */
		if(jQuery('.navbar-nav-scroll').length > 0){
			
			jQuery(document).on("scroll", pageOnScroll);
			
			var headerFullHeight =   parseInt($('.main-bar').css('height'), 10);
			
			//smoothscroll
			jQuery('.navbar-nav-scroll a[href^="#"]').on('click', function (e) {
				e.preventDefault();
				jQuery(document).off("scroll");
				
				jQuery('.navbar-nav-scroll a').each(function () {
					
					jQuery(this).parent('li').removeClass('active');
				})				
				jQuery(this).parent('li').addClass('active');
				
				var target = this.hash,
				
					menu = target;
				var $target = $(target);
				
				if($target.length > 0){					
					jQuery('html, body').stop().animate({						
						'scrollTop': $target.offset().top - headerFullHeight
					}, 500, 'swing', function () {
						
						//window.location.hash = target;
						jQuery(document).on("scroll", pageOnScroll);
					});
				}
			});
		}
		
		
		
		
		
	}
	
	var pageOnScroll = function(event){
		
		var scrollPos = jQuery(document).scrollTop();
		jQuery('.navbar-nav-scroll a').each(function () {
			var elementLink = jQuery(this);
			var refElement = jQuery(elementLink.attr("href"));
			var headerFullHeight =   parseInt($('.main-bar').css('height'), 10);
			
			if (refElement.offset().top - headerFullHeight <= scrollPos && refElement.offset().top + refElement.height() > scrollPos) {
			
				jQuery('.navbar-nav-scroll a').parent('li').removeClass("active");
				elementLink.parent('li').addClass("active");
			}else{
				elementLink.parent('li').removeClass("active");
			}
		});
	} 
	
	/* Load File ============ */
	var dzTheme = function(){
		'use strict';
		var loadingImage = '<img src="images/loading.gif">';
		jQuery('.dzload').each(function(){
		var dzsrc =   siteUrl + $(this).attr('dzsrc');
		 	jQuery(this).hide(function(){
				jQuery(this).load(dzsrc, function(){
					jQuery(this).fadeIn('slow');
				}); 
			})
			
		});
		 
		
		if(screenWidth <= 991 ){
			jQuery('.navbar-nav > li > a, .sub-menu > li > a').unbind().on('click', function(e){
				
				if(jQuery(this).parent('li').has('ul').length > 0){e.preventDefault();}
				
				if(jQuery(this).parent().hasClass('open'))
				{
					jQuery(this).parent().removeClass('open');
				}else{
					if(jQuery(this).hasClass('sub-menu'))
					{
						jQuery(this).parent().addClass('open');
					}else{
						jQuery(this).parent().parent().find('li').removeClass('open');
						jQuery(this).parent().addClass('open');
					}
				}  
			});
			
		}
		
		
		if(screenWidth <= 991 ){
			jQuery('.navbar-nav > li > a, .sub-menu > li > a').unbind().on('click', function(e){				
				if(jQuery(this).parent('li').has('ul').length > 0){e.preventDefault();}					
					/* One Page Setup */
					if(jQuery('.navbar-nav-scroll').length > 0){						
						jQuery(document).on("scroll", pageOnScroll);					
						var headerFullHeight =   parseInt($('.main-bar').css('height'), 10);						
						//smoothscroll
						jQuery('.navbar-nav-scroll a[href^="#"]').on('click', function (e) {
							e.preventDefault();
							jQuery(document).off("scroll");							
							jQuery('.navbar-nav-scroll a').each(function () {								
								jQuery(this).parent('li').removeClass('active');
							})				
							jQuery(this).parent('li').addClass('active');							
							var target = this.hash,							
							menu = target;
							var $target = $(target);							
							if($target.length > 0){					
								jQuery('html, body').stop().animate({						
									'scrollTop': $target.offset().top - headerFullHeight
								}, 500, 'swing', function () {
									jQuery(document).on("scroll", pageOnScroll);
								});
							}
						});
					}		

					
					if(jQuery(this).closest('li').children('ul').length > 0 ){
						jQuery('.header-nav').removeClass('collapsed').addClass('collapse show');
					}else{
						jQuery('.navbar-toggler').removeClass('open').addClass('collapsed');
						jQuery('.header-nav').removeClass('show');
					}
				
				if(jQuery(this).parent().hasClass('open')){
					jQuery(this).parent().removeClass('open');
				}else{
					if(jQuery(this).hasClass('sub-menu')){
						jQuery(this).parent().addClass('open');
					}else{
						jQuery(this).parent().parent().find('li').removeClass('open');
						jQuery(this).parent().addClass('open');
					}
				}
			});			
		}
				
		jQuery('.menu-btn, .openbtn').unbind().on('click',function(){
			jQuery('.contact-sidebar').addClass('active');
		});
		jQuery('.menu-close').unbind().on('click',function(){
			jQuery('.contact-sidebar').removeClass('active');
			jQuery('.menu-btn').removeClass('open');
		});
		
		// Full sidebar
		jQuery('.full-sidenav .navbar-nav > li > a').next('.sub-menu').slideUp();
		jQuery('.full-sidenav .sub-menu > li > a').next('.sub-menu').slideUp();
			
		jQuery('.full-sidenav .navbar-nav > li > a, .full-sidenav .sub-menu > li > a').unbind().on('click', function(e){
			if(jQuery(this).hasClass('dz-open')){
				
				jQuery(this).removeClass('dz-open');
				jQuery(this).parent('li').children('.sub-menu').slideUp();
			}else{
				jQuery(this).addClass('dz-open');
				
				if(jQuery(this).parent('li').children('.sub-menu').length > 0){
					e.preventDefault();
					jQuery(this).next('.sub-menu').slideDown();
					jQuery(this).parent('li').siblings('li').children('.sub-menu').slideUp();
				}else{
					jQuery(this).next('.sub-menu').slideUp();
				}
			}
		});
		
		
		
		jQuery('.header-full .navbar-toggler').unbind().on('click',function(){
			if(jQuery('.header-full .navbar-toggler').hasClass('open')){
				jQuery('.header-full .navbar-toggler').addClass('open');
			}else{
				jQuery('.header-full .navbar-toggler').removeClass('open');
			} 
			
			jQuery('.full-sidenav').toggleClass('active');
		});
		jQuery('.menu-close').unbind().on('click',function(){
			jQuery('.menu-close,.full-sidenav').removeClass('active');
			jQuery('.header-full .navbar-toggler').removeClass('open');
		});
		
	}
	
	/* Magnific Popup ============ */
	var MagnificPopup = function(){
		'use strict';	
		
		if(jQuery('.mfp-gallery').length > 0)
		{
			/* magnificPopup function */
			jQuery('.mfp-gallery').magnificPopup({
				delegate: '.mfp-link',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						return item.el.attr('title') + '<small></small>';
					}
				}
			});
			/* magnificPopup function end */
		}
		
		if(jQuery('.mfp-video').length > 0)
		{
			/* magnificPopup for Play video function */		
			jQuery('.mfp-video').magnificPopup({
				type: 'iframe',
				iframe: {
					markup: '<div class="mfp-iframe-scaler">'+
							 '<div class="mfp-close"></div>'+
							 '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
							 '<div class="mfp-title">Some caption</div>'+
							 '</div>'
				},
				callbacks: {
					markupParse: function(template, values, item) {
						values.title = item.el.attr('title');
					}
				}
			});
			
		}

		if(jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').length > 0)
		{	
			/* magnificPopup for Play video function end */
			$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,

				fixedContentPos: false
			});
		
		}
		
	}
	
	/* Scroll To Top ============ */
	var scrollTop = function (){
		'use strict';
		var scrollTop = jQuery("button.scroltop");
		/* page scroll top on click function */	
		scrollTop.on('click',function() {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1000);
			return false;
		})

		jQuery(window).bind("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll > 900) {
				jQuery("button.scroltop").fadeIn(1000);
			} else {
				jQuery("button.scroltop").fadeOut(1000);
			}
		});
		/* page scroll top on click function end*/
	}
	
	/* Header Fixed ============ */
	var headerFix = function(){
		'use strict';
		/* Main navigation fixed on top  when scroll down function custom */		
		jQuery(window).on('scroll', function () {
			if(jQuery('.sticky-header').length > 0){
				var menu = jQuery('.sticky-header');
				if ($(window).scrollTop() > menu.offset().top) {
					menu.addClass('is-fixed');
					$('.site-header .container > .logo-header .logo').attr('src','images/logo.png');
					$('.site-header .container > .logo-header .logo-2').attr('src','images/logo-2.png');
					$('.site-header .container > .logo-header .logo-3').attr('src','images/logo-3.png');
				} else {
					menu.removeClass('is-fixed');
					$('.site-header .container > .logo-header .logo, .site-header .container > .logo-header .logo-2, .site-header .container > .logo-header .logo-3').attr('src','images/logo-white.png')
				}
			}
		});
		/* Main navigation fixed on top  when scroll down function custom end*/
	}
	
	/* Masonry Box ============ */
	var masonryBoxOld = function(){
		'use strict';
		/* masonry by  = bootstrap-select.min.js */
		if(jQuery('#masonry, .masonry').length > 0)
			{
			var self = jQuery("#masonry, .masonry");
	 
			if(jQuery('.card-container').length > 0)
			{
				var gutterEnable = self.data('gutter');
				
				var gutter = (self.data('gutter') === undefined)?0:self.data('gutter');
				gutter = parseInt(gutter);
				
				
				var columnWidthValue = (self.attr('data-column-width') === undefined)?'':self.attr('data-column-width');
				if(columnWidthValue != ''){columnWidthValue = parseInt(columnWidthValue);}
				
				 self.imagesLoaded(function () {
					self.masonry({
						gutter: gutter,
						columnWidth:columnWidthValue, 
						//gutterWidth: 15,
						isAnimated: true,
						itemSelector: ".card-container",
						percentPosition: true
					});
					
				}); 
			} 
		}
		if(jQuery('.filters').length)
		{
			jQuery(".filters li:first").addClass('active');
			
			jQuery(".filters").on("click", "li", function() {
				jQuery('.filters li').removeClass('active');
				jQuery(this).addClass('active');
				
				var filterValue = $(this).attr("data-filter");
				self.isotope({ filter: filterValue });
			});
		}
		/* masonry by  = bootstrap-select.min.js end */
	}
	
	
	/* Masonry Box ============ */
	var masonryBox = function(){
	
		if(jQuery('#masonry, .masonry').length > 0)
		{
		 var self = jQuery("#masonry, .masonry");
     
			if(jQuery('.card-container').length > 0)
		    {
				var gutterEnable = self.data('gutter');
				
				var gutter = (self.data('gutter') === undefined)?0:self.data('gutter');
				gutter = parseInt(gutter);
				
				
				var columnWidthValue = (self.attr('data-column-width') === undefined)?'':self.attr('data-column-width');
				if(columnWidthValue != ''){columnWidthValue = parseInt(columnWidthValue);}
		
				 self.imagesLoaded(function () {
					self.masonry({
						gutter: gutter,
						columnWidth:columnWidthValue, 
						gutterWidth: 100,
						isAnimated: true,
						itemSelector: ".card-container"
					});
					
				}); 
			} 
		}
		
		if(jQuery('.filters').length > 0)
		{
			var masonryContainer = jQuery("#masonry, .masonry");
			
			var $params = {
			  itemSelector: ".card-container",
			  filtersGroupSelector:".filters",
			  selectorType: "list"
			};

			setTimeout(function(){
				// Do masonry with filtering 
				masonryContainer.multipleFilterMasonry($params);
			
			}, 300);
			
			setTimeout(function(){
				jQuery(".filters li").removeClass('active');
				jQuery(".filters li:first").addClass('active');
			}, 800);
			
			
		}
	}
	
	/* Counter Number ============ */
	var counter = function(){
		if(jQuery('.counter').length)
		{
			jQuery('.counter').counterUp({
				delay: 10,
				time: 3000
			});	
		}
	}
	
	/* Video Popup ============ */
	var handleVideo = function(){
		/* Video responsive function */	
		jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
		jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');	
		/* Video responsive function end */
	}
	
	/* Gallery Filter ============ */
	var handleFilterMasonary = function(){
		/* gallery filter activation = jquery.mixitup.min.js */ 
		if (jQuery('#image-gallery-mix').length) {
			jQuery('.gallery-filter').find('li').each(function () {
				$(this).addClass('filter');
			});
			jQuery('#image-gallery-mix').mixItUp();
		};
		if(jQuery('.gallery-filter.masonary').length){
			jQuery('.gallery-filter.masonary').on('click','span', function(){
				var selector = $(this).parent().attr('data-filter');
				jQuery('.gallery-filter.masonary span').parent().removeClass('active');
				jQuery(this).parent().addClass('active');
				jQuery('#image-gallery-isotope').isotope({ filter: selector });
				return false;
			});
		}
		/* gallery filter activation = jquery.mixitup.min.js */
	}
	
	/* Resizebanner ============ */
	var handleBannerResize = function(){
		$(".full-height").css("height", $(window).height());
	}
	
	/* BGEFFECT ============ */
	var reposition = function (){
		'use strict';
		var modal = jQuery(this),
		dialog = modal.find('.modal-dialog');
		modal.css('display', 'block');
		
		/* Dividing by two centers the modal exactly, but dividing by three 
		 or four works better for larger screens.  */
		dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
	}
	
	var handelResize = function (){
		
		/* Reposition when the window is resized */
		jQuery(window).on('resize', function() {
			jQuery('.modal:visible').each(reposition);
		
			
		});
	}
	
		/* Countdown ============ */
	var handleCountDown = function(WebsiteLaunchDate){
		/* Time Countr Down Js */
		if($(".countdown").length)
		{
			var launchDate = jQuery('.countdown').data('date');
			
			if(launchDate != undefined && launchDate != '')
			{
				WebsiteLaunchDate = launchDate;
			}
			
			$('.countdown').countdown({date: WebsiteLaunchDate+' 23:5'}, function() {
				$('.countdown').text('we are live');
			});
		}
		/* Time Countr Down Js End */
	}
	
	/* Website Launch Date */ 
	var WebsiteLaunchDate = new Date();
	var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	WebsiteLaunchDate.setMonth(WebsiteLaunchDate.getMonth() + 1);
	WebsiteLaunchDate =  WebsiteLaunchDate.getDate() + " " + monthNames[WebsiteLaunchDate.getMonth()] + " " + WebsiteLaunchDate.getFullYear();
	/* Website Launch Date END */ 
	
	
	/* Light Gallery ============ */
	var lightGallery = function (){
		if(($('#lightgallery, .lightgallery').length > 0)){
			$('#lightgallery, .lightgallery').lightGallery({
				selector : '.lightimg',
				loop:true,
				thumbnail:true,
				exThumbImage: 'data-exthumbimage',
				download: false,
				share: false,
			});
		}
	}	

	var boxHover = function(){
		jQuery('.box-hover').on('mouseenter',function(){
			var selector = jQuery(this).parent().parent();
			selector.find('.box-hover').removeClass('active');
			jQuery(this).addClass('active');
		});
	}
	
	/* Header Height ============ */
	var setResizeMargin = function(){
		if(($('.setResizeMargin').length > 0) && screenWidth >= 1280){
			var containerSize = $('.container').width();
			var getMargin = (screenWidth - containerSize)/2;
			$('.setResizeMargin').css('margin-left',getMargin);
		}
	}
	
	var handleRadialProgress = function(){
		if(($('svg.radial-progress').length > 0)){
			// Remove svg.radial-progress .complete inline styling
			$('svg.radial-progress').each(function( index, value ) { 
				$(this).find($('circle.complete')).removeAttr( 'style' );
			});
			// Activate progress animation on scroll
			$(window).on('scroll',function(){
				$('svg.radial-progress').each(function( index, value ) { 
					// If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
					if ( 
						$(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
						$(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
					)
					{
						// Get percentage of progress
						var percent = $(value).data('percentage');
						// Get radius of the svg's circle.complete
						var radius = $(this).find($('circle.complete')).attr('r');
						// Get circumference (2πr)
						var circumference = 2 * Math.PI * radius;
						// Get stroke-dashoffset value based on the percentage of the circumference
						var strokeDashOffset = circumference - ((percent * circumference) / 100);
						// Transition progress for 1.25 seconds
						$(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
					}
				});
			}).trigger('scroll');
		}
	}
	
	var handleheartBlast = function (){
		$(".heart").on("click", function() {
			$(this).toggleClass("heart-blast");
		});
	}
	
	var bsSelect = function(){
		if (jQuery('select').length > 0 && $.fn.selectpicker) {
		     jQuery('select').selectpicker();
		}
	}
	
	
	
	var handleLazyLoading = function(){
		
		/* On Image Tag */
		jQuery('.dz-lazy').lazyload();
		
		/* On Background Image */
		jQuery('.dz-lazy-background').each(function(){
			var imgSrc = jQuery(this).data('src');
            if(imgSrc !== undefined) {
			
                var elementStyle = jQuery(this).attr('style');

                var elementStyle2 = elementStyle.replace('url('+siteUrl+'assets/images/loading.svg)', 'url('+imgSrc+')');
                jQuery(this).attr('style',elementStyle2);
            }
		});
	}
	
	/* Function ============ */
	return {
		init:function(){
			boxHover();
			onePageLayout();
			dzTheme();
			homeSearch();
			MagnificPopup();
			scrollTop();
			headerFix();
			handleVideo();
			handleFilterMasonary();
			handleCountDown(WebsiteLaunchDate);
			handleBannerResize();
			handelResize();
			lightGallery();
			setResizeMargin();
			bsSelect();
			jQuery('.modal').on('show.bs.modal', reposition);
			
			handleheartBlast();
		},
		
		load:function(){
				setTimeout(function(){
				handleLazyLoading();
			}, 1000);
			
			counter();
			masonryBox();
			handleRadialProgress();
		},
		
		resize:function(){
			screenWidth = $(window).width();
			dzTheme();			
		},
		
		masonryBox:function(){
			/* This is for Elementor Editor */
			masonryBox();			
		},
		
		
	}
	
}();

/* Document.ready Start */	
jQuery(document).ready(function() {
    'use strict';
	Mazo.init();
	
	$('a[data-toggle="tab"]').click(function(){
		// todo remove snippet on bootstrap v4
		$('a[data-toggle="tab"]').click(function() {
		  $($(this).attr('href')).show().addClass('show active').siblings().hide();
		})
	});
	
	jQuery('.navicon').on('click',function(){
		$(this).toggleClass('open');
	});

});
/* Document.ready END */

/* Window Load START */
jQuery(window).on('load',function () {
	'use strict'; 
	Mazo.load();
	
	setTimeout(function(){
		jQuery('#loading-area').remove();
		 AOS.init(); 
	}, 500);
	
});


/*  Window Load END */
/* Window Resize START */
jQuery(window).on('resize',function () {
	'use strict'; 
	Mazo.resize();
});
/*  Window Resize END */

})(window.jQuery);