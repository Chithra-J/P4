@extends('layouts.master')

@section('title')
Clap Events
@stop
@section('header')

@stop
@section('content')
<div class="container">
	<h1>Your Profile</h1>
	<hr class="hr-style">
	<div class="row">
		<!-- left column -->
		<div class="col-md-3">
			<div class="text-center">
				<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
				<h6>Upload a different photo...</h6>

				<input type="file" class="form-control">
			</div>
		</div>

		<!-- edit form column -->
		<div class="col-md-9 personal-info">
			<!--
			<div class="alert alert-info alert-dismissable">
			<a class="panel-close close" data-dismiss="alert">×</a>
			<i class="fa fa-coffee"></i>
			This is an <strong>.alert</strong>. Use this to show important messages to the user.
			</div>-->

			<!--<h3>Personal info</h3>-->

			<form id="form1" class="form-horizontal" role="form" method='POST' action='/parents/create'>
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
				@if(count($errors) > 0)
				<div class='all_error'>
					Please correct the errors above and try again.
				</div>
				@endif
			</form>
		</div>
	</div>
</div>
<hr class="hr-style">
</div>
@stop
@section('body')
<script>
	$(document).ready(function() {
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	});
	$('#reset1').click(function() {
		$('#form1')[0].reset();
	});

</script>
@stop