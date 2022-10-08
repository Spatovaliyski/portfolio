jQuery( document ).ready(function($) {
	"use strict";

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
	 $("#copy-chat-clipboard").click(function(event) {
		event.preventDefault();
		navigator.clipboard.writeText($(this).attr("href"));

		$('.copy-chat-popup').addClass('is-visible');

		setTimeout(() => {
			$('.copy-chat-popup').removeClass('is-visible');
		}, 1200);
	 });
	
});