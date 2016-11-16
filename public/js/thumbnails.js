$(document).ready(function() {
	$(".thumbnail").click(function(event) {
		var target = $(event.target);
		$("#img").attr('src', target.attr('src'));;
	});
});