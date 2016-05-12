$(window).load(function() {
	$("div.input-group").addClass("input-group-sm");
});

$(document).ready(function() {
	$("ul.nav > li >").find(".active").removeClass("active");
	$('#editChild').addClass("active");		
	$('#datetimepicker').datetimepicker({
		viewMode: 'years',
		'allowInputToggle' : true,
            format: 'YYYY-MM-DD'
    	});
	$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	});

$('#sidebar').affix({
	offset : {
		top : 150
	}
});		 

$('#reset1').click(function() {
	$('#form1')[0].reset();
}); 