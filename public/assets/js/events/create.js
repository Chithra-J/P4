$(window).load(function() {
	$("div.input-group").addClass("input-group-sm");
});

$(document).ready(function() {
	$('#datetimepicker').datetimepicker({
		viewMode: 'years',
		'allowInputToggle' : true,
            format: 'YYYY-MM-DD'
    	});
    $('#datetimepicker1').datetimepicker({
		viewMode: 'years',
		'allowInputToggle' : true,
            format: 'YYYY'
    	});
	$("ul.nav > li >").find(".active").removeClass("active");
	$('#editEvent').addClass("active");
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
