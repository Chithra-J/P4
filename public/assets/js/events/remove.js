$(document).ready(function() {
	$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	$("ul.nav > li >").find(".active").removeClass("active");
	$('#editEvent').addClass("active");
});
$('#sidebar').affix({
	offset : {
		top : 100
	}
});