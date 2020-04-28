/***********************************************************************
					MOBILE MENU FUNCTIONALITY
	************************************************************************/

$(document).ready(function() {
	$('.menu-icon').click(function() {
		$('.dashboard-navigation').toggleClass('menu-toggle');
		$('.menu-icon').toggleClass('icon-closed');
		$('.dashboard-header').toggleClass('menu-closed-header-style ');
	});

	/***********************************************************************
					ACCORDION FUNCTIONALITY
	************************************************************************/

	(function($) {
		var allPanels = $('.acc-user-info');
		allPanels.hide();

		$('.acc-user-dropdown').click(function() {
			var content = $(this).siblings();
			if(!content.is(':visible')){
				allPanels.slideUp();
				content.slideDown();
				var accordion = $(this).parent().parent().parent();

				if(accordion.hasClass('users-acc') == true){
					$('.overview-background-second').addClass('overview-bgd-moved');
				} else if (accordion.hasClass('users-acc') == false){
					$('.overview-background-second').removeClass('overview-bgd-moved');
				}
			}

		});
	})(jQuery);


	/***********************************************************************
					ACCORDION TABS CLICK FUNCTION
	************************************************************************/

	function tabClick(contentId, thisElement){
		thisElement.parent().siblings('.acc-content').not('.hidden').addClass('hidden');
		$(contentId).removeClass('hidden');
	}

	/***********************************************************************
					ACCORDION TABS CLICK EVENTLISTENERS
	************************************************************************/

	/*************** NEW UPLOADS ***************/
	$('.acc-new-uploads').click(function(event) {
		tabClick('#new-uploads', $(this));
		event.preventDefault();
	});

	/*************** PUBLISHED UPLOADS ***************/
	$('.acc-published-uploads').click(function(event) {
		tabClick('#published-uploads', $(this));
		event.preventDefault();
    });
	
	/*************** NEW USERS ***************/
    $('.acc-new-users').click(function(event) {
		tabClick('#pending-users', $(this));
		event.preventDefault();
	});

	/*************** REGISTERED USERS ***************/
	$('.acc-registered-users').click(function(event) {
		tabClick('#student-users', $(this));
		event.preventDefault();
	});

	/*************** TEACHERS ***************/
	$('.acc-teachers').click(function (event) {
		tabClick('#teacher-users', $(this));
		event.preventDefault();
	});

	/*************** ELDERS ***************/
	$('.acc-elders').click(function (event) {
		tabClick('#elder-users', $(this));
		event.preventDefault();
	});

	/*************** ADMINS ***************/
	$('.acc-admins').click(function (event) {
		tabClick('#admin-users', $(this));
		event.preventDefault();
	});


});
