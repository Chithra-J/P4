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
			<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/parents/edit'>
				<!-- edit form column -->
				<div class="col-md-offset-1 col-md-8 personal-info">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Profile</h3>
						</div>

						<div class="panel-body">
							<!--
							<div class="alert alert-info alert-dismissable">
							<a class="panel-close close" data-dismiss="alert">×</a>
							<i class="fa fa-coffee"></i>
							This is an <strong>.alert</strong>. Use this to show important messages to the user.
							</div>-->

							<!--<h3>Personal info</h3>-->

							<!--<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/parents/create'>-->
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<input type="hidden" id="user_id" name="user_id" value={{ $parent->
							id }}>
							<input type="hidden" id="email" name="email" value={{ $parent->
							email }}>
							
							<div class="form-group">
								@if ( (!empty($parent -> picture_location)) and ($parent -> picture_location != "") and ($parent -> picture_location != NULL) and (!empty($parent -> picture_location)))
									<!--<label class="col-lg-3 control-label">Your profile picture</label>-->
									<a id="editprofilepicture" class="col-lg-3" href="/parents/addProfilePicture">Edit Profile Picture</a>
									<div class="col-lg-8">									
										<img alt="User Picture" src={{ URL::to('/') }}{{ $parent->picture_location }} class="img-circle img-responsive">	
																		
									</div>
								@else 
									<a id="editprofilepicture" class="col-lg-offset-3 col-lg-5" href="/parents/addProfilePicture">Add Profile Picture</a>
								@endif
							</div>
							
							<div class="form-group">
								<label class="col-lg-3 control-label">* First name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='firstname'  value='{{ old('firstname') }}'>-->
									<input class="form-control" type="text" name='firstname'  value={{ $parent->
									firstname }}>
									<div class='error'>
										{{ $errors->first('firstname') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Last name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='lastname' value='{{ old('lastname') }}'>-->
									<input class="form-control" type="text" name='lastname' value={{ $parent->
									lastname }}>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Middle:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text"  name='email'  value='{{ old('email') }}'>-->
									<input class="form-control" type="text" name='middle'  value={{ $parent->
									middle }}>
									<div class='error'>
										{{ $errors->first('middle') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Username:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
									<input class="form-control" type="text" name='username' value={{ $parent->
									name }}>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Gender:</label>
								<div class="col-md-8">  									 
									<div class="radio">
										<label>
											<input type="radio" name="gender" value="female" @if(old('gender',$parent->gender)=='female') checked @endif > Female
											</label>
									</div>
									<div class="radio">										
										<label>
											<input type="radio" name="gender" value="male"  @if(old('gender',$parent->gender)=='male') checked @endif > Male											
											</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Password:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="password"  name='password'  value='{{ old('password') }}'>-->
									<input class="form-control" type="password"  name='password'  value=''>
									<div class='error'>
										{{ $errors->first('password') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Confirm password:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="password"  name='confirm_password'  value='{{ old('confirm_password') }}'>-->
									<input class="form-control" type="password"  name='confirm_password'  value=''>
									<div class='error'>
										{{ $errors->first('confirm_password') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-8">
									<input type="submit" class="btn btn-primary" value="Submit">
									<span></span>
									<input id="reset1" type="reset" class="btn btn-default" value="Reset">
								</div>
							</div>
							<!--
							<div class="form-group">
							<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" />
							<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
							</div>
							</div>-->

							@if(count($errors) > 0)
							<div class='all_error'>
								Please correct the errors above and try again.
							</div>
							@endif
							<!--</form>-->
						</div>
					</div>
				</div>
				<!--
				<div class="col-md-4">
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Add or Edit Profile Picture</h3>
										</div>
										<div class="panel-body fixed-panel">
											<input type='hidden' name='_token' value='{{ csrf_token() }}'>
											<input type="hidden" id="picture_location_to_store" name="picture_location_to_store"
											value="" />
				
											<input type="hidden" id="preview_picture_location" name="preview_picture_location"
												@if ( (!empty($parent -> picture_location)) and ($parent -> picture_location != "") 
													and ($parent -> picture_location != NULL) 
													and (!empty($parent -> picture_location)))
														value={{ URL::to('/') }}{{ Auth::user()->picture_location }} >
												@else
													value="">
												@endif
											
											<input id="images" name="images[]" type="file" data-min-file-count="1" >
											<div class="checkbox">
														<label for='remember' >
															<input type="checkbox" name='remember' id='remember'>
															Remove profile picture </label>
													</div>
										</div>
									</div>
								</div>-->
				
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