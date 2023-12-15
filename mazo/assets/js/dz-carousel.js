function handleMainSlider() {
		// main-silder-swiper
	if(jQuery('.main-silder-swiper').length > 0){
		var swiper = new Swiper('.main-silder-swiper', {
			speed: 1500,
			parallax: true,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			navigation: {
				nextEl: '.swiper-button-next1',
				prevEl: '.swiper-button-prev1',
			},
		});
	}
	
	// main-silder-swiper
	if(jQuery('.main-silder-swiper-04').length > 0){
		var swiper = new Swiper('.main-silder-swiper-04', {
			speed: 1500,
			parallax: true,
			loop:true,
			autoplay:true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		});
	}
		

}


 function handlePortfolioSlider() {
		// Swiper Portfolio
	if(jQuery('.swiper-portfolio1').length > 0){
		var portfolioswiper1 = new Swiper('.swiper-portfolio1', {
			slidesPerView: 1,
			spaceBetween: 30,
			speed: 1500,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			breakpoints: {
				1280: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	
	if(jQuery('.project-carousel').length > 0){
		var swiper3 = new Swiper('.project-carousel', {
			speed: 1500,
			parallax: true,
			slidesPerView: 3,
			spaceBetween: 0,
			loop:true,
			navigation: {
				nextEl: '.project-prev',
				prevEl: '.project-next',
			},
			breakpoints: {
				1191: {
					slidesPerView: 3,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
}
	

function handleBlogSlider() {
		// Blog Swiper
	if(jQuery('.blog-swiper').length > 0){
		var blogswiper = new Swiper('.blog-swiper', {
			slidesPerView: 3,
			spaceBetween: 0,
			speed: 1500,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			breakpoints: {
				1280: {
					slidesPerView: 3,
				},
				991: {
					slidesPerView: 2,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
// Blog Swiper
if(jQuery('.blog-swiper-2').length > 0){
	var blogswiper = new Swiper('.blog-swiper-2', {
		slidesPerView: 3,
		spaceBetween: 20,
		speed: 1500,
		loop:true,
		autoplay: {
		delay: 3000,
		},
		breakpoints: {
			1600: {
				slidesPerView: 3,
			},
			991: {
				slidesPerView: 2,
			},
			691: {
				slidesPerView: 2,
			},
			320: {
				slidesPerView: 1,
			},
		}
	});
}
	
	if(jQuery('.blog-swiper3').length > 0){
		var blogswiper = new Swiper('.blog-swiper3', {
			slidesPerView: 3,
			spaceBetween: 30,
			speed: 1500,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			breakpoints: {
				1280: {
					slidesPerView: 3,
				},
				991: {
					slidesPerView: 3,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
}

/* Not Use */
function handlePostSlider() {
	// Blog Swiper
	if(jQuery('.post-swiper-two').length > 0){
		var swiper = new Swiper('.post-swiper-two', {
			loop: true,
			spaceBetween: 10,
			slidesPerView: 4,
			freeMode: true,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
		});
		var swiper2 = new Swiper('.post-swiper-2', {
			loop: true,
			spaceBetween: 10,
			navigation: {
			  nextEl: ".swiper-button-next",
			  prevEl: ".swiper-button-prev",
			},
			thumbs: {
			  swiper: swiper,
			},
		});
	}
}

// Blog Swiper
if(jQuery('.post-swiper').length > 0){
	var swiper2 = new Swiper('.post-swiper', {
		slidesPerView: 1,
		spaceBetween: 0,
		speed: 1500,
		loop:true,
		autoplay: {
		   delay: 3000,
		},
		navigation: {
			nextEl: '.prev-post-swiper-btn',
			prevEl: '.next-post-swiper-btn',
		},
	});
}



function handleTestimonialSlider() {
		// Testimonial Swiper 1
	if(jQuery('.testimonial-swiper1').length > 0){
		var testswiper1 = new Swiper('.testimonial-swiper1', {
			speed: 1500,
			slidesPerView: 1,
			spaceBetween: 30,
			autoplay: {
			   delay: 3000,
			},
		});
	}
	
	// Testimonial Swiper 2
	if(jQuery('.testimonial-swiper2').length > 0){
		var testswiper2 = new Swiper('.testimonial-swiper2', {
			speed: 1500,
			slidesPerView: 2,
			spaceBetween: 0,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			breakpoints:{
				1024: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			},
			pagination:{
				el: ".swiper-pagination",
			},
		});
	}
	
	
	// Testimonial Swiper 3
	if(jQuery('.testimonial-swiper3').length > 0){
		var testimonialswiper1 = new Swiper('.testimonial-swiper3', {
			speed: 1500,
			slidesPerView: 3,
			spaceBetween: 30,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			pagination: {
				el: '.swiper-pagination1',
				clickable: true,
				renderBullet: function (index, className) {
				  return '<span class="' + className + '">' + (index + 1) + '</span>';
				},
			},
			breakpoints: {
				1191: {
					slidesPerView: 3,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	// Testimonial Swiper 4
	if(jQuery('.testimonial-swiper4').length > 0){
		var swiper3 = new Swiper('.testimonial-swiper4', {
			speed: 1500,
			parallax: true,
			slidesPerView: 3,
			spaceBetween: 30,
			loop:true,
			pagination: {
			  el: ".swiper-pagination",
			  clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next3',
				prevEl: '.swiper-button-prev3',
			},
			breakpoints: {
				1191: {
					slidesPerView: 2,
				},
				691: {
					slidesPerView: 1,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	// Testimonial Swiper 5
	if(jQuery('.testimonial-swiper5').length > 0){
		var swiper3 = new Swiper('.testimonial-swiper5', {
			speed: 1500,
			parallax: true,
			slidesPerView: 3,
			spaceBetween: 30,
			loop:true,
			pagination: {
				el: '.swiper-pagination5',
				clickable: true,
				renderBullet: function (index, className) {
				  return '<span class="' + className + '">'+0 + (index + 1) + '</span>';
				},
			},
			navigation: {
				nextEl: '.swiper-button-next3',
				prevEl: '.swiper-button-prev3',
			},
			breakpoints: {
				1191: {
					slidesPerView: 2,
				},
				691: {
					slidesPerView: 1,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	
	// Testimonial Swiper 6
	if(jQuery('.testimonial-swiper6').length > 0){
		var testswiper2 = new Swiper('.testimonial-swiper6', {
			speed: 1500,
			slidesPerView: 2,
			spaceBetween: 30,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			breakpoints:{
				1024: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			},
		});
	}
	
	// Testimonial Swiper 7
	if(jQuery('.testimonial-swiper7').length > 0){
		var testimonialswiper1 = new Swiper('.testimonial-swiper7', {
			speed: 1500,
			slidesPerView: 3,
			spaceBetween: 30,
			autoplay: {
			   delay: 3000,
			},
			pagination: {
				el: '.swiper-pagination1',
				clickable: true,
				renderBullet: function (index, className) {
				  return '<span class="' + className + '">' + (index + 1) + '</span>';
				},
			},
			breakpoints: {
				1024: {
					slidesPerView: 2,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	// Testimonial Swiper 8
	if(jQuery('.testimonial-swiper8').length > 0){
		var testswiper1 = new Swiper('.testimonial-swiper8', {
			speed: 1500,
			slidesPerView: 1,
			spaceBetween: 30,
			autoplay: {
			   delay: 3000,
			},
			navigation: {
				nextEl: '.testimonial-prev8',
				prevEl: '.testimonial-next8',
			},
		});
	}

	// Testimonial Swiper 9
	if(jQuery('.testimonial-swiper9').length > 0){
		var swiper = new Swiper(".testimonial-swiper9-thumb", {
			spaceBetween: 5,
			slidesPerView: 7,
			freeMode: true,
			watchSlidesProgress: true,
			breakpoints: {
				1366:{
					slidesPerView: 7,
				},
				1191:{
					slidesPerView: 6,
				},
				991:{
					slidesPerView: 5,
				},
				767:{
					slidesPerView: 4,
				},
				591:{
					slidesPerView: 3,
				},
				320:{
					slidesPerView: 2,
				},
			}
		});
		var swiper2 = new Swiper(".testimonial-swiper9", {
			spaceBetween: 10,
			navigation: {
				nextEl: ".testimonial-next9",
				prevEl: ".testimonial-prev9",
			},
			thumbs: {
				swiper: swiper,
			},
			
		});
	}
}


function handleBlogCarousel2(){
    
    /*  Blog post Carousel function by = owl.carousel.js */
    if(jQuery('.blog-carousel-2').length > 0){
        jQuery('.blog-carousel-2').owlCarousel({
            loop:true,
            autoplaySpeed: 3000,
            navSpeed: 3000,
            paginationSpeed: 3000,
            slideSpeed: 3000,
            smartSpeed: 3000,
            autoplay: 3000,
            margin:30,
            nav:true,
            dots: false,
            navText: ['<i class="ti-arrow-left"></i>', '<i class="ti-arrow-right"></i>'],
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:2
                },			
                991:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        });
    }
    
}

	
function handleServiceSlider(){
    
    // Services Swiper
	if(jQuery('.services-swiper').length > 0){
		var swiper3 = new Swiper('.services-swiper', {
			speed: 1500,
			parallax: true,
			slidesPerView: 4,
			spaceBetween: 30,
			//loop:true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			breakpoints: {
				1191: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
				},
				691: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
    
}
	
	
function handleTeamSlider() {
		// Team Swiper 1
	if(jQuery('.team-swiper1').length > 0){
		var teamswiper1 = new Swiper('.team-swiper1', {
			speed: 1500,
			slidesPerView: 3,
			spaceBetween: 30,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			navigation: {
				nextEl: '.swiper-button-next2',
				prevEl: '.swiper-button-prev2',
			},
			breakpoints: {
				1191: {
					slidesPerView: 3,
				},
				991: {
					slidesPerView: 3,
				},
				591: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	// Team Swiper 2
	if(jQuery('.team-swiper2').length > 0){
		var teamswiper1 = new Swiper('.team-swiper2', {
			speed: 1500,
			slidesPerView: 4,
			spaceBetween: 30,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			pagination: {
				el: '.swiper-pagination-team-2',
				clickable: true,
				renderBullet: function (index, className) {
				  return '<span class="' + className + '">'+0 + (index + 1) + '</span>';
				},
			},
			navigation: {
				nextEl: '.swiper-button-next2',
				prevEl: '.swiper-button-prev2',
			},
			breakpoints: {
				1191: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
				},
				591: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	
	// Team Swiper
	if(jQuery('.team-swiper3').length > 0){
		var swiper4 = new Swiper('.team-swiper3', {
			speed: 1500,
			parallax: true,
			slidesPerView: 4,
			spaceBetween: 30,
			loop:true,
			navigation: {
				nextEl: '.swiper-button-next4',
				prevEl: '.swiper-button-prev4',
			},
			breakpoints: {
				1191: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
				},
				591: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	
	// Team Swiper 4
	if(jQuery('.team-swiper4').length > 0){
		var teamswiper4 = new Swiper('.team-swiper4', {
			speed: 1500,
			slidesPerView: 4,
			spaceBetween: 30,
			loop:true,
			centeredSlides: true,
			autoplay: {
			   delay: 3000,
			},
			navigation: {
				nextEl: '.team-next',
				prevEl: '.team-prev',
			},
			breakpoints: {
				1191: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
				},
				591: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
	
	// Team Swiper 5
	if(jQuery('.team-swiper5').length > 0){
		var teamswiper5 = new Swiper('.team-swiper5', {
			speed: 1500,
			spaceBetween: 30,
			slidesPerView: 4,
			loop:true,
			autoplay: {
			   delay: 3000,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			breakpoints: {
				1191: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
				},
				591: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}

	// Team Swiper 6
	if(jQuery('.team-swiper6').length > 0){
		var teamswiper5 = new Swiper('.team-swiper6', {
			speed: 1500,
			spaceBetween: 30,
			slidesPerView: 4,
			loop:true,
			centeredSlides: true,
			autoplay: {
			   delay: 3000,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			breakpoints: {
				1191: {
					slidesPerView: 3,
				},
				991: {
					slidesPerView: 3,
				},
				591: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
				},
			}
		});
	}
}
	
function handleClientSlider() {
		// Clients Swiper
	if(jQuery('.clients-swiper').length > 0){
		var swiper5 = new Swiper('.clients-swiper', {
			speed: 1500,
			parallax: true,
			slidesPerView: 4,
			spaceBetween: 30,
			autoplay: {
			   delay: 3000,
			},
			loop:true,
			navigation: {
				nextEl: '.swiper-button-next5',
				prevEl: '.swiper-button-prev5',
			},
			breakpoints: {
				1191: {
					slidesPerView: 6,
				},
				991: {
					slidesPerView: 5,
				},
				691: {
					slidesPerView: 4,
				},
				591: {
					slidesPerView: 3,
				},
				320: {
					slidesPerView: 2,
				},
			}
		});
	}

	// client swiper-2
	if(jQuery('.client-swiper-2').length > 0){
		var blogswiper = new Swiper('.client-swiper-2', {
			slidesPerView: 4,
			spaceBetween: 20,
			speed: 1500,
			loop:true,
			autoplay: {
				delay: 3000,
			},
			breakpoints: {
				1280: {
					slidesPerView: 5,
				},
				991: {
					slidesPerView: 4,
				},
				767: {
					slidesPerView: 3,
				},
				320: {
					slidesPerView: 2,
				},
			}
		});
	}
}	

/* Window Load START */
jQuery(window).on('load',function () {
	handleMainSlider();
	handlePortfolioSlider();
	handleBlogSlider();
	handlePostSlider();
	handleTestimonialSlider();
	handleTeamSlider();
	handleBlogCarousel2();
	handleServiceSlider();
	handleClientSlider();
	
});
/*  Window Load END */