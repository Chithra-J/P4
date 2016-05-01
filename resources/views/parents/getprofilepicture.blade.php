@extends('layouts.master')

@section('title')
Clap Events
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<div class="row">
			<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/parents/showProfilePicture'>
				<!-- edit form column -->
				<div class="col-md-offset-1 col-md-5 personal-info">

					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Add or Edit Profile Picture</h3>
						</div>
						<div class="panel-body">
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<input type="hidden" id="user_id" name="user_id" value={{ $parent->
							id }}>
							<input type="hidden" id="email" name="email" value={{ $parent->
							email }}>
							<input type="hidden" id="picture_location_to_store" name="picture_location_to_store"
							value="" />

							<input type="hidden" id="preview_picture_location" name="preview_picture_location"
							@if ( (!empty($parent ->
									picture_location)) and ($parent -> picture_location != "")
									and ($parent -> picture_location != NULL)
									and (!empty($parent -> picture_location)))
										value={{ URL::to('/') }}{{ $parent->picture_location }} >
							@else
								value="">
							@endif

							<input id="images" name="images[]" type="file" data-min-file-count="1" >
							<br>
							<div class="checkbox">
								<label for='remember' >
									<input type="checkbox" name='remove_profile_picture' id='remove_profile_picture'>
									Remove profile picture </label>
							</div>
							<br>
							<br>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-8">
									<input type="submit" class="btn btn-primary" value="Submit">
									<span></span>
									<input id="reset1" type="reset" class="btn btn-default" value="Cancel">
								</div>
							</div>
						</div>
					</div>

			</form>
		</div>

</section>
<hr class="hr-style">
</div>
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
	$(document).ready(function() {
		/*$("ul.nav > li >").find(".active").removeClass("active");*/
		$('#editProfile').addClass("active");
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");

		/*$(document).on("ready", function() {*/

		$("#images").fileinput({
			initialPreview : "<img style='height:160px' src='" + $('#preview_picture_location').val() + "'>",
			cache : false,
			uploadAsync : false,
			uploadUrl : "/parents/createProfilePicture",
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

		/*});

		 $(function() {
		 $('#datetimepicker1').datetimepicker();
		 });*/

	});

	/*$("div.kv-upload-progress").find(".hide").addClass("show");*/
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