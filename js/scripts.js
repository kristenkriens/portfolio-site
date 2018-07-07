$(function(){

	$('body').fadeIn(500);

	setTimeout(function(){
		$('.hero-text').addClass('animated fadeInUpBig');
	}, 250);

	$(window).on('scroll', function() {
		var scroll = $(window).scrollTop();

		if (scroll > 0) {
			$(".navigation-bar").addClass("solid");
	   } else {
	   	$(".front .navigation-bar").removeClass("solid");
	   }

	   var y = $(this).scrollTop();

	    $('nav li > a').each(function (event) {
	        if (y >= $($(this).attr('href')).offset().top - 73) {
	            $('nav li').not(this).removeClass('active');
	            $(this).parent().addClass('active');

						  var cssObj = {};
						  cssObj.left = $(this).position().left;
						  cssObj.width = $(this).outerWidth();
							$("#underline").css(cssObj);
	        }
	    });
	});

	$('a[href*="#"]:not([href="#"])').click(function() {
	  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	    var target = $(this.hash);
	    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	    if (target.length) {
	      $('html, body').animate({
	        scrollTop: target.offset().top - 73
	      }, 1000);
	      return false;
	    }
	  }
	});


	$('.mobile').on('click', function() {
		$('.navigation-bar ul').slideToggle();
		$('.navigation-bar').addClass('solid');
		if($('.mobile').hasClass('not-clicked')) {
			$('.mobile').removeClass('not-clicked').addClass('clicked');
			$('body').css('overflow-y', 'hidden');
		} else {
			$('.mobile').removeClass('clicked').addClass('not-clicked');
			$('body').css('overflow-y', 'visible');
		}
	});

	$('nav a').on('click', function(){
	  if($(window).width() < 768) {
	    $('nav ul').slideUp();
	    $('.mobile').removeClass('clicked').addClass('not-clicked');
	    $('body').css('overflow-y', 'visible');
	  }
	});


	function isVisible( row, container ){
	    var elementTop = $(row).offset().top,
	        elementHeight = $(row).height(),
	        containerTop = container.scrollTop(),
	        containerHeight = container.height();

	    return ((((elementTop - containerTop) + elementHeight) > 500) && ((elementTop - containerTop) < containerHeight));
	}

	$(window).scroll(function(){
		if($(window).width() > 768){
		   $('.subtitle, .about-text-top, .about-text-bottom, .about-image, .skills-icons, .button:not(.hero-button), h3, .contact-left, .contact-right, input[type="submit"]').each(function(){
		      if(isVisible($(this), $(window))){
		      	$(this).addClass('animated fadeInUp');
		      }
		   });

			 $('.portfolio-item:nth-of-type(odd), .blog-post:nth-of-type(odd)').each(function(){
		      if(isVisible($(this), $(window))){
		      	$(this).addClass('animated fadeInLeft');
		      }
		   });

			 $('.portfolio-item:nth-of-type(even), .blog-post:nth-of-type(even)').each(function(){
		      if(isVisible($(this), $(window))){
		      	$(this).addClass('animated fadeInRight');
		      }
		   });
		}
	});

});
