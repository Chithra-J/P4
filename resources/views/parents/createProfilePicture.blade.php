@extends('layouts.master')

@section('title')
Clap Events - Editing my profile picture
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
			<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/parents/showProfilePicture'>
				{{ csrf_field() }}
				<div class="col-md-offset-1 col-md-9">
					<div class="fixed-panel panel">
						<div class="panel-heading">
							<h3 class="panel-title">Add or Edit Profile Picture</h3>
						</div>
						<div class="panel-body">							
							<input type="hidden" id="user_id" name="user_id" value={{ $parent->	id }}>
							<div class="alert alert-info alert-dismissable">
								<a class="panel-close close" data-dismiss="alert">×</a>
								<i class="fa fa-coffee"></i>
									<strong>Note:</strong><br>
									1. Make sure to <strong>"Click Upload"</strong> after you select a new file. <br>
									2. Image size should be <strong>"&lt;2 MB"</strong>.
							</div>
							<input type="hidden" id="picture_location_to_store" name="picture_location_to_store" value="" />						
							@if(($parent -> picture_location) != "/assets/images/avatar.png")								
								<input type="hidden" id="preview_picture_location" name="preview_picture_location" value={{ URL::to('/') }}{{ $parent->picture_location }} >
								<div class="checkbox">
								<label for='remember'>
									<input type="checkbox" name='remove_profile_picture' id='remove_profile_picture'>
									Remove profile picture </label>
								</div>								
							@else
								<input type="hidden" id="preview_picture_location" name="preview_picture_location" value="/assets/images/avatar.png">							
							@endif
							
							<input id="images" name="images[]" type="file" data-min-file-count="1" >
							<br><div class="form-group">
							<div class="col-md-11 center-text">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<!--<a href='{{ Config::get('app.url').'/parents/create'}}' class="btn btn-primary" id="btn-next">Cancel</a>-->
								<a href='{{ url('/parents/create') }}' class="btn btn-default" id="btn-next">Cancel</a>
							</div>							
							</div>
						</div>
					</div>
				</div>	
			</form>
			</div>
</section>
<hr class="hr-style">

@stop
@section('body')
<script>
	$(window).load(function() {
		$("div.input-group").addClass("input-group-sm");
		/*$("div.kv-upload-progress").removeClass("hide");*/
	});
	$.ajaxSetup({
		headers : {
			'X-CSRF-TOKEN' : '{{ csrf_token() }}'
		}
	});
	$('#remove_profile_picture').click(function() {
	    if( $('#remove_profile_picture:checked').length > 0 ) {
	        $(".file-input.file-input-ajax-new").hide();
	    } else {
	        $(".file-input.file-input-ajax-new").show();
	    }
	});
	$(document).ready(function() {
		/*$("ul.nav > li >").find(".active").removeClass("active");*/
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

	$('#reset1').click(function() {
		$('#form1')[0].reset();
	}); 
</script>
@stop