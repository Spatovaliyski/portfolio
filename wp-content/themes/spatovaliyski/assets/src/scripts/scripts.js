jQuery( document ).ready(function($) {
	"use strict";

	$('body').addClass("loaded load-reveal");

	setTimeout(() => {
		$('body').removeClass('load-reveal');
	}, 1000);

	/**
	 * HEADROOM INIT
	 */
	let hrConfig = {
		offset : 20,
	};

	let headerHeadroom = document.querySelector(".headroom-snap");
	let headroom  = new Headroom(headerHeadroom, hrConfig);
	headroom.init();

	/**
	 * Copy to clipboard for the second "Chat" button
	 */
	$("#copy-chat-clipboard").click( function(event) {
		event.preventDefault();
		navigator.clipboard.writeText($(this).attr("href"));

		$('.copy-chat-popup').addClass('is-visible');

		setTimeout(() => {
			$('.copy-chat-popup').removeClass('is-visible');
		}, 1200);
	});
	
	/**
	 * Handle the menu switching animation (section scroll to) with timeouts
	 */
	$('.menu-item:not(".redirect")').click( function(e) {
		e.preventDefault();
		if ($('body').hasClass('is-animation-ongoing')) {
			return false;
		}

		function clearState() {
			$('.section').removeClass('hide-section, show-section');
		}
		clearState();

		$('body').addClass('is-animation-ongoing');
		$('.section').addClass('hide-section');
		
		let link = $(this).find('a').attr('href');
		setTimeout(() => {
			$('.section').removeClass('hide-section');
			$('.section').addClass('show-section');

			$('html, body').animate({
				scrollTop: $(link).offset().top - 120
			}, 0);
		}, 1000);

		setTimeout(() => {
			$('body').removeClass('is-animation-ongoing');
			clearState();
		}, 2000);
	});

	// Simple check: if we aren't on the homepage, we remove the nav direction buttons
	if (! $('body').hasClass('page-template-template-homepage')) {
		$('.home-tab').remove();
	}

	// Paste link to this classname based on the Resume button
	function copyResumeLink() {
		let link = $('.menu-item.cv a').attr('href');

		$('.applicaiton-link').attr('href', link);
	}
	copyResumeLink();

	// To get the homepage animation going we need to copy the data attribute and strip its markup
	function setHomepageAnimationContent(item) {
		$(item).attr('data-context', item.innerText);
		console.log(item);
	}

	const dataContextBoxes = $('[data-context]');
	Array.from(dataContextBoxes).forEach(setHomepageAnimationContent);

});