jQuery(document).ready(function($) {

	$(".headroom").headroom({
		"tolerance": 20,
		"offset": 50,
		"classes": {
			"initial": "animated",
			"pinned": "slideDown",
			"unpinned": "slideUp"
		}
	});

});
function softScroll(target) {
	var scrollDuration = 500;
	var scrollOffset = $(target).offset().top;
	$("html, body").animate({
		scrollTop: scrollOffset
	}, scrollDuration);
}
$(".soft-scroll-link").on("click", function(event) {
	event.preventDefault();
	softScroll($(this).attr("href"));
});