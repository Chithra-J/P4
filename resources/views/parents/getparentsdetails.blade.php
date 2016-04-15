@extends('layouts.master')

@section('title')
Clap Events
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
			
			<h3>Personal info</h3>

			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-lg-3 control-label">First name:</label>
					<div class="col-lg-8">
						<input class="form-control" type="text" value="Jill">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Last name:</label>
					<div class="col-lg-8">
						<input class="form-control" type="text" value="Jack">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-8">
						<input class="form-control" type="text" value="jill@harvard.edu">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Username:</label>
					<div class="col-md-8">
						<input class="form-control" type="text" value="Jill">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Password:</label>
					<div class="col-md-8">
						<input class="form-control" type="password" value="helloworld">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Confirm password:</label>
					<div class="col-md-8">
						<input class="form-control" type="password" value="helloworld">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
						<input type="button" class="btn btn-primary" value="Save Changes">
						<span></span>
						<input type="reset" class="btn btn-default" value="Cancel">
					</div>
				</div>
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
	
</script>
@stop