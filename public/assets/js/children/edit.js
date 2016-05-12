
$(window).load(function() {
	$("div.input-group").addClass("input-group-sm");
});
/* Needed for POST */
$.ajaxSetup({
	headers : {
		'X-CSRF-TOKEN' : '{{ csrf_token() }}'
	}
});
$(document).ready(function() {
	$("ul.nav > li >").find(".active").removeClass("active");
	$('#editChild').addClass("active");	
	$("#datetimepicker").datetimepicker({
	    showClear: true,
	    format: 'YYYY-MM-DD',
	    'allowInputToggle' : true
	});
	$("#datetimepicker").val($("#date_of_birth").val()).change();
	$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	$("#images").fileinput({
		initialPreview : "<img style='height:160px' src='" + $('#preview_picture_location').val() + "'>",
		cache : false,
		uploadAsync : false,
		uploadUrl : "/parents/editPicture",
		uploadExtraData : function() {
			return {
				user_id : $("#user_id").val()
			};
		},
		allowedFileExtensions : ['jpg', 'png', 'gif'],
		allowedFileTypes : ['image'],
		previewFileType : "image",
		overwriteInitial : true,
		maxFilesNum : 1
	});
	$('#images').on('filebatchuploadsuccess', function(event, data, previewId, index) {
		var response = data.response;
		$('#picture_location_to_store').val(response['uploaded'][1]);
	});

});
$('#sidebar').affix({
	offset : {
		top : 150
	}
});

$('#reset1').click(function() {
	$('#form1')[0].reset();
}); 
