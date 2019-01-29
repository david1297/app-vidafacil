function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i < ca.length; i++) {
	  var c = ca[i];
	  while (c.charAt(0) == ' ') {
		c = c.substring(1);
	  }
	  if (c.indexOf(name) == 0) {
		return c.substring(name.length, c.length);
	  }
	}
	return "";
  }
$(document).ready(function() {
	if(getCookie('MENU')=='INACTIVO'){
		$('body').addClass('layout-fullwidth');
		$('#boton').find(".fa").toggleClass('fa-angle-left fa-angle-right');

		$('#boton').css({
			left: "+=80px"
		});
	}
	// sidebar navigation
	$('#main-menu').metisMenu();
	

	// sidebar nav scrolling
	$('#left-sidebar .sidebar-scroll').slimScroll({
		height: '100%',
		wheelStep: 5,
		touchScrollStep: 50,
		color: '#cecece'
	});

	$('.btn-toggle-fullwidth').on('click', function() {
		if(!$('body').hasClass('layout-fullwidth')) {
			$('body').addClass('layout-fullwidth');
			$(this).find(".fa").toggleClass('fa-angle-left fa-angle-right');

			$(this).animate({
				left: "+=80px"
			}, 500);
			var d = new Date();
  		d.setTime(d.getTime() + (10*24*60*60*1000));
  		var expires = "expires="+ d.toUTCString();
  		document.cookie =  "MENU=INACTIVO;" + expires + ";path=/";

		} else {
			$('body').removeClass('layout-fullwidth');
			$(this).find(".fa").toggleClass('fa-angle-left fa-angle-right');

			$(this).animate({
				left: "-=80px"
			}, 500);
			var d = new Date();
  		d.setTime(d.getTime() + (10*24*60*60*1000));
  		var expires = "expires="+ d.toUTCString();
  		document.cookie =  "MENU=ACTIVO;" + expires + ";path=/";
		}
		

	});
	
	

	// off-canvas menu toggle
	$('.btn-toggle-offcanvas').on('click', function() {
		$('body').toggleClass('offcanvas-active');
	});

	$('#main-content').on('click', function() {
		$('body').removeClass('offcanvas-active');
	});

	// adding effect dropdown menu
	$('.dropdown').on('show.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).animate({
			top: '100%'
		}, 200);
	});

	$('.dropdown').on('hide.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).animate({
			top: '80%'
		}, 200);
	});

	// navbar search form
	$('.navbar-form.search-form input[type="text"]')
	.on('focus', function() {
		$(this).animate({
			width: '+=50px'
		}, 300);
	})
	.on('focusout', function() {
		$(this).animate({
			width: '-=50px'
		}, 300);
	});

	// Bootstrap tooltip init
	if($('[data-toggle="tooltip"]').length > 0) {
		$('[data-toggle="tooltip"]').tooltip();
	}

	if($('[data-toggle="popover"]').length > 0) {
		$('[data-toggle="popover"]').popover();
	}

	$(window).on('load', function() {
		// for shorter main content
		if($('#main-content').height() < $('#left-sidebar').height()) {
			$('#main-content').css('min-height', $('#left-sidebar').innerHeight() - $('footer').innerHeight());
		}
	});

	$(window).on('load resize', function() {
		if($(window).innerWidth() < 360) {
			$('.navbar-brand img.logo').attr('src', 'assets/img/logo-minimal.png');
		} else {
			$('.navbar-brand img.logo').attr('src', 'assets/img/logo.png');
		}
	});
	

});

// toggle function
$.fn.clickToggle = function( f1, f2 ) {
	return this.each( function() {
		var clicked = false;
		$(this).bind('click', function() {
			if(clicked) {
				clicked = false;
				return f2.apply(this, arguments);
			}

			clicked = true;
			return f1.apply(this, arguments);
		});
	});
	
};