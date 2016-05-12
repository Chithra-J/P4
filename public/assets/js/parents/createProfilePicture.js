$(window).load(function() {
	$("div.input-group").addClass("input-group-sm");
});

$('#remove_profile_picture').click(function() {
    if( $('#remove_profile_picture:checked').length > 0 ) {
        $(".file-input.file-input-ajax-new").hide();
    } else {
        $(".file-input.file-input-ajax-new").show();
    }
});
$(document).ready(function() {
	$('#editProfile').addClass("active");
	
	$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	$("#images").fileinput({
		cache : false,
		uploadAsync : false,
		uploadUrl : "/parents/addProfilePicture",
		uploadExtraData : function() {
			return {
				user_id : $("#user_id").val()
			};
		},
		allowedFileExtensions : ['jpg', 'png', 'gif'],
		allowedFileTypes : ['image'],
		previewFileType : "image",
		overwriteInitial : true,
		maxFilesNum : 1,
		initialPreview : "<img style='height:160px' src='" + $('#preview_picture_location').val() + "'>"
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
 
