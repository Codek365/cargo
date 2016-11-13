jQuery(function($) {
	
	$('ul li:last-child').addClass('lastItem');
	$('ul li:first-child').addClass('firstItem');

	// Tips
	$('*[rel=tooltip], .hasTooltip').tooltip()
	$('*[rel=popover]').popover()
	$('.tip-bottom').tooltip({placement: "bottom"})

	// Modal Window
	$('[href="#modal"]').click(function(e){
		$('#modal').modal('toggle');
		e.preventDefault();
	});

	$('#modal button.modalClose').click(function(e){
		$('#modal').modal('hide');
		e.preventDefault();
	});

	$('.articleGalleryZoom').magnificPopup({
		type: 'image',
		mainClass: 'mfp-with-zoom',
	    zoom: {
        enabled: true,
        duration: 300,
        easing: 'ease-in-out',
        opener: function(openerElement) {
          return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
	    }
	});

	//Dropdown icons
	$('.dropdown-toggle').dropdown()
	var iconTest=/icon-/i;
	var iconReplace = "fa fa-";
	function iconSet(){
		$('[class*="icon-"]').each(function(){
			iconClass = $(this).attr('class');
			var newString = iconClass.replace(iconTest, iconReplace);
			$(this).addClass(newString);
		})
	}
	iconSet()

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	$('#back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 400);
		return false;
	});
	/*
	if($('.lightboxlink').length){
		var lightboxlink = ($('.lightboxlink').attr('onclick').split(';')[0]).replace(/javascript:MOOdalBox\.open\(/,'').split(',')[0].replace(/"/g,'')
		$('.lightboxlink').attr({href:'#'+lightboxlink,onclick:''}).magnificPopup({
			type: 'inline',
			preloader: false,
			closeBtnInside:false,
			mainClass: 'map-popup',
			callbacks: {
				open: function() {

				}
			}
		})
	}
	*/

	/*Pagination Active Button*/
	$('div.pagination ul li:not([class])').addClass('num');
	$('.modal.loginPopup').alwaysCenterIn(window);
	/*if (typeof $.ScrollToFixed == 'function') {
		$('#content-row [class*="span"]').each(function(){
			if($(this).outerHeight(true)<$(this).parent().height()){
				$(this).scrollToFixed({
					marginTop: function(){
						$(this).next().css({float:'left'})
						var marginTop = $('.sf-menu.sticky').parents('[id*="-row"]').outerHeight(true)
						return marginTop
					},
					limit : function(){
						var limit = $(this).parent().height()+$(this).parent().offset().top-$(this).outerHeight(true)
						return limit
					},
	        zIndex:1,
	        minWidth: 768
			  });
			}
		});
	}*/
});