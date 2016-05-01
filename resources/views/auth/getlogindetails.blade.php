@extends('layouts.master')

@section('title')
Come in to Clap!
@stop

@section('content')
<section>
	<div class="container">
		@if(Session::get('message') != null)
		<div class='flash_message'>
			{{ Session::get('message') }}
		</div>
		@endif
		<h1>Your Login Information</h1>

		<div class="row">
			<!-- left column -->
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Already a member</h3>
					</div>
					<div class="panel-body">
						<form id="form1" class="form-horizontal" role="form" method='POST' action='/login'>
							{!! csrf_field() !!}
							<div class="form-group">
								<label class="col-md-5 control-label">* Email Address:</label>
								<div class="col-md-6">
									<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
									<input class="form-control" type="text" name='email' value='chit@w.com'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">* Password:</label>
								<div class="col-md-6">
									<!--<input class="form-control" type="password"  name='password'  value='{{ old('password') }}'>-->
									<input class="form-control" type="password"  name='password'  value='helloworld'>
									<div class='error'>
										{{ $errors->first('password') }}
									</div>
								</div>
							</div>
							<div class='form-group'>
								<input type='checkbox' name='remember' id='remember'>
								<label for='remember' class='checkboxLabel'>Remember me</label>
							</div>
							<!--
							<div class="form-group">
							<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" />
							<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
							</div>
							</div>-->

							<div class="form-group">
								<label class="col-md-5 control-label"></label>
								<div class="col-md-6">
									<input type="submit" class="btn btn-primary" value="Login">
									<span></span>
									<input id="reset1" type="reset" class="btn btn-default" value="Cancel">
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

			<div class="col-md-6 personal-info">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">New Member</h3>
					</div>
					<div class="panel-body">
						<form id="form2" class="form-horizontal" role="form" method='POST' action='/register'>
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<div class="form-group">
								<label class="col-lg-3 control-label">* First name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='firstname'  value='{{ old('firstname') }}'>-->
									<input class="form-control" id='firstname' type="text" name='firstname'  value='first'>
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
									<input class="form-control" type="text"  id='email' name='email'  value='chit@w.com'>
									<div class='error'>
										{{ $errors->first('email') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Username:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
									<input class="form-control" type="text" id="name" name='username' value='UserName'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Gender:</label>
								<div class="col-md-8">
									<div class="radio">
										<label>
											<input type="radio" name="Female">
											Female</label>
									</div>
									<div class="radio disabled">
										<label>
											<input type="radio" name="Male">
											Male</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">* Password:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="password"  name='password'  value='{{ old('password') }}'>-->
									<input class="form-control" type="password"  id="password" name='password'  value='helloworld'>
									<div class='error'>
										{{ $errors->first('password') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">* Confirm password:</label>
								<div class="col-md-8">
									<!--<input class="form-control" type="password"  name='confirm_password'  value='{{ old('confirm_password') }}'>-->
									<input class="form-control" type="password" id='password_confirmation' name='confirm_password'  value='helloworld'>
									<div class='error'>
										{{ $errors->first('confirm_password') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-8">
									<input type="submit" class="btn btn-primary" value="SignUp">
									<span></span>
									<input id="reset2" type="reset" class="btn btn-default" value="Cancel">
								</div>
							</div>
							@if(count($errors) > 0)
							<div class='all_error'>
								Please correct the errors above and try again.
							</div>
							@endif
					</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<hr class="hr-style">
	</div>
</section>
@stop
@section('body')
<script>
	$(document).ready(function() {
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
		/*$('ul.nav.nav-pills.nav-stacked').hide();*/
		/*
		 $(function() {
		 $('#datetimepicker1').datetimepicker();
		 });*/

	});
	$('#reset1').click(function() {
		$('#form1')[0].reset();
	});
	$('#reset2').click(function() {
		$('#form2')[0].reset();
	});

</script>
@stop