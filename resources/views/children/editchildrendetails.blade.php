@extends('layouts.master')

@section('title')
Clap Events
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<h1>Your Profile</h1>
		<div class="row">
			<!-- left column -->
			<div class="col-sm-2">
				<ul id="sidebar" class="nav nav-pills nav-stacked">
					<li>
						<a href="/">Home</a>
					</li>
					<li>
						<a id="editProfile" href="/parents/create">Profile</a>
					</li>
					<li>
						<a id="editChild" href="/children">Children</a>
					</li>
					
					<li>
						<a id="events" href="/events">Events</a>
					</li>
					<li>
						<a id="reports" href="/reports">Reports</a>
					</li>
				</ul>
			</div>

			<!-- edit form column -->
			<div class="col-md-6 personal-info">
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

						<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/parents/create'>
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>

							<div class="form-group">
								<label class="col-lg-3 control-label">* First name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='firstname'  value='{{ old('firstname') }}'>-->
									<input class="form-control" type="text" name='firstname'  value='first'>
									<div class='error'>
										{{ $errors->first('firstname') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Last name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='lastname' value='{{ old('lastname') }}'>-->
									<input class="form-control" type="text" name='lastname' value='LastName'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">* Email:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text"  name='email'  value='{{ old('email') }}'>-->
									<input class="form-control" type="text"  name='email'  value='ema'>
									<div class='error'>
										{{ $errors->first('email') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Username:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
									<input class="form-control" type="text" name='username' value='UserName'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Gender:</label>
								<div class="col-md-8">
									<div class="radio">
										<label>
											<input type="radio" name="optradio">
											Female</label>
									</div>
									<div class="radio disabled">
										<label>
											<input type="radio" name="optradio">
											Male</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">* Password:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="password"  name='password'  value='{{ old('password') }}'>-->
									<input class="form-control" type="password"  name='password'  value='helloworld'>
									<div class='error'>
										{{ $errors->first('password') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">* Confirm password:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="password"  name='confirm_password'  value='{{ old('confirm_password') }}'>-->
									<input class="form-control" type="password"  name='confirm_password'  value='helloworld'>
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
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Profile Picture</h3>
					</div>

					<div class="panel-body fixed-panel">
						<form enctype="multipart/form-data">
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<label class="control-label">Profile Picture</label>
							<input id="images" name="images[]" type="file" data-min-file-count="1">
						</form>
					</div>
				</div>
			</div>
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
	$(document).ready(function() {
		$("ul.nav > li >").find(".active").removeClass("active");
		$('#editProfile').addClass("active");
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");

		/*$(document).on("ready", function() {*/
		$("#images").fileinput({
			uploadAsync : false,
			uploadUrl : "/assets/php/upload.php",
			allowedFileExtensions : ['jpg', 'png', 'gif'],
			overwriteInitial : true,
			maxFilesNum : 1
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