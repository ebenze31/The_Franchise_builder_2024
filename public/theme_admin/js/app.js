$(function () {
	"use strict";
	/* perfect scrol bar */
	new PerfectScrollbar('.header-message-list');
	new PerfectScrollbar('.header-notifications-list');
	// search bar
	$(".mobile-search-icon").on("click", function () {
		$(".search-bar").addClass("full-search-bar");
		$(".page-wrapper").addClass("search-overlay");
	});
	$(".search-close").on("click", function () {
		$(".search-bar").removeClass("full-search-bar");
		$(".page-wrapper").removeClass("search-overlay");
	});
	$(".mobile-toggle-menu").on("click", function () {
		$(".wrapper").addClass("toggled");
	});
	// toggle menu button
	$(".toggle-icon").click(function () {
		if ($(".wrapper").hasClass("toggled")) {
			$("#img_logo_sidebar").addClass("d-none");
			$("#icon_hide_sidebar").removeClass("d-none");
			// unpin sidebar when hovered
			$(".wrapper").removeClass("toggled");
			$(".sidebar-wrapper").unbind("hover");
		} else {
			$(".wrapper").addClass("toggled");
			$(".sidebar-wrapper").hover(function () {
				$(".wrapper").addClass("sidebar-hovered");
				$("#img_logo_sidebar").addClass("d-none");
				$("#icon_hide_sidebar").removeClass("d-none");
			}, function () {
				$(".wrapper").removeClass("sidebar-hovered");
				if ($(".wrapper").hasClass("toggled")) {
					$("#img_logo_sidebar").removeClass("d-none");
					$("#icon_hide_sidebar").addClass("d-none");
				}
			})
		}
	});
	/* Back To Top */
	$(document).ready(function () {
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 300) {
				$('.back-to-top').fadeIn();
			} else {
				$('.back-to-top').fadeOut();
			}
		});
		$('.back-to-top').on("click", function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});
	// === sidebar menu activation js
	// $(function () {
	// 	for (var i = window.location, o = $(".metismenu li a").filter(function () {
	// 		return this.href == i;
	// 	}).addClass("").parent().addClass("mm-active"); ;) {
	// 		if (!o.is("li")) break;
	// 		o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
	// 	}
	// });
	$(function () {
		for (var i = window.location.href.split('?')[0] , o = $(".metismenu li a").filter(function () {
			
			return this.href == i;
		}).addClass("").parent().addClass("mm-active");;) {
			if (!o.is("li")) break;
			o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
		}
	});

	// metismenu
	$(function () {
		$('#menu').metisMenu();
	});
	// chat toggle
	$(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled");
	});
	$(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled");
	});
	// email toggle
	$(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled");
	});
	$(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled");
	});
	// compose mail
	$(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show();
	});
	$(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide();
	});


	/*switcher*/
	$(".switcher-btn").on("click", function () {
		$(".switcher-wrapper").toggleClass("switcher-toggled");
	});
	$(".close-switcher").on("click", function () {
		$(".switcher-wrapper").removeClass("switcher-toggled");
	});


	// กำหนดการเปลี่ยน theme และบันทึกค่าใน localStorage
	$("#lighttheme").on("click", function () {
		$('html').attr('class', 'light-theme');
		localStorage.setItem('selectedTheme', 'light-theme');
	});

	$("#darktheme").on("click", function () {
		$('html').attr('class', 'dark-theme');
		localStorage.setItem('selectedTheme', 'dark-theme');
	});

	$("#semidark").on("click", function () {
		$('html').attr('class', 'semi-dark');
		localStorage.setItem('selectedTheme', 'semi-dark');
	});
	$("#minimaltheme").on("click", function () {
		$('html').attr('class', 'minimal-theme');
		localStorage.setItem('selectedTheme', 'minimal-theme');
	});


	$("#headercolor1").on("click", function () {
		$("html").addClass("color-header headercolor1");
		$("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor1');
	  });

	  $("#headercolor2").on("click", function () {
		$("html").addClass("color-header headercolor2");
		$("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor2');
	  });

	  $("#headercolor3").on("click", function () {
		$("html").addClass("color-header headercolor3");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor3');
	  });
	  $("#headercolor4").on("click", function () {
		$("html").addClass("color-header headercolor4");
		$("html").removeClass("headercolor2 headercolor3 headercolor1 headercolor5 headercolor6 headercolor7 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor4');
	  });

	  $("#headercolor5").on("click", function () {
		$("html").addClass("color-header headercolor5");
		$("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor2 headercolor6 headercolor7 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor5');
	  });

	  $("#headercolor6").on("click", function () {
		$("html").addClass("color-header headercolor6");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor3 headercolor7 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor6');
	  });
	  $("#headercolor7").on("click", function () {
		$("html").addClass("color-header headercolor7");
		$("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor1 headercolor8");
		localStorage.setItem('selectedHeaderColor', 'headercolor7');
	  });

	  $("#headercolor8").on("click", function () {
		$("html").addClass("color-header headercolor8");
		$("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor2");
		localStorage.setItem('selectedHeaderColor', 'headercolor8');
	  });

	// $("#headercolor1").on("click", function () {
	// 	$("html").addClass("color-header headercolor1");
	// 	$("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
	// });
	// $("#headercolor2").on("click", function () {
	// 	$("html").addClass("color-header headercolor2");
	// 	$("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
	// });
	// $("#headercolor3").on("click", function () {
	// 	$("html").addClass("color-header headercolor3");
	// 	$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
	// });
	// $("#headercolor4").on("click", function () {
	// 	$("html").addClass("color-header headercolor4");
	// 	$("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8");
	// });
	// $("#headercolor5").on("click", function () {
	// 	$("html").addClass("color-header headercolor5");
	// 	$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor3 headercolor6 headercolor7 headercolor8");
	// });
	// $("#headercolor6").on("click", function () {
	// 	$("html").addClass("color-header headercolor6");
	// 	$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor3 headercolor7 headercolor8");
	// });
	// $("#headercolor7").on("click", function () {
	// 	$("html").addClass("color-header headercolor7");
	// 	$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor3 headercolor8");
	// });
	// $("#headercolor8").on("click", function () {
	// 	$("html").addClass("color-header headercolor8");
	// 	$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor3");
	// });



	// sidebar colors


	// $('#sidebarcolor1').click(theme1);
	// $('#sidebarcolor2').click(theme2);
	// $('#sidebarcolor3').click(theme3);
	// $('#sidebarcolor4').click(theme4);
	// $('#sidebarcolor5').click(theme5);
	// $('#sidebarcolor6').click(theme6);
	// $('#sidebarcolor7').click(theme7);
	// $('#sidebarcolor8').click(theme8);

	// function theme1() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor1');
	// }

	// function theme2() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor2');
	// }

	// function theme3() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor3');
	// }

	// function theme4() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor4');
	// }

	// function theme5() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor5');
	// }

	// function theme6() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor6');
	// }

	// function theme7() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor7');
	// }

	// function theme8() {
	// 	$('html').attr('class', 'color-sidebar sidebarcolor8');
	// }


	$('#sidebarcolor1').click(theme1);
	$('#sidebarcolor2').click(theme2);
	$('#sidebarcolor3').click(theme3);
	$('#sidebarcolor4').click(theme4);
	$('#sidebarcolor5').click(theme5);
	$('#sidebarcolor6').click(theme6);
	$('#sidebarcolor7').click(theme7);
	$('#sidebarcolor8').click(theme8);

	function theme1() {
	  $('html').attr('class', 'color-sidebar sidebarcolor1');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor1');
	}

	function theme2() {
	  $('html').attr('class', 'color-sidebar sidebarcolor2');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor2');
	}

	function theme3() {
	  $('html').attr('class', 'color-sidebar sidebarcolor3');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor3');
	}

	function theme4() {
	  $('html').attr('class', 'color-sidebar sidebarcolor4');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor4');
	}

	function theme5() {
	  $('html').attr('class', 'color-sidebar sidebarcolor5');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor5');
	}

	function theme6() {
	  $('html').attr('class', 'color-sidebar sidebarcolor6');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor6');
	}

	function theme7() {
	  $('html').attr('class', 'color-sidebar sidebarcolor7');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor7');
	}

	function theme8() {
	  $('html').attr('class', 'color-sidebar sidebarcolor8');
	  localStorage.setItem('sideBar', 'color-sidebar sidebarcolor8');
	}


















});
