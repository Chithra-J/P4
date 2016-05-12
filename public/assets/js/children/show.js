$(document).ready(function() {
	$("ul.nav > li >").find(".active").removeClass("active");
	$('#editChild').addClass("active");	
	$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
});
$('#sidebar').affix({
	offset : {
		top : 100
	}
});
