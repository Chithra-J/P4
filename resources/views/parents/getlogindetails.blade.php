@extends('layouts.master')

@section('title')
Clap Events
@stop

@section('content')
<div class="container">
	@if(Session::get('message') != null)
	<div class='flash_message'>
		{{ Session::get('message') }}
	</div>
	@endif
	<h1>Your Login Information</h1>

	<div class="row">
		<!-- left column -->
		<div class="col-md-5">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Already a member</h3>
				</div>
				<div class="panel-body">
					<form id="form1" class="form-horizontal" role="form" method='POST' action='/parents/existing'>
						<input type='hidden' name='_token' value='{{ csrf_token() }}'>
						<div class="form-group">
							<label class="col-md-5 control-label">* Username:</label>
							<div class="col-md-6">
								<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
								<input class="form-control" type="text" name='username' value='UserName'>
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

		<div class="col-md-7 personal-info">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">New Member</h3>
				</div>
				<div class="panel-body">
					<form id="form2" class="form-horizontal" role="form" method='POST' action='/parents/create'>
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
@stop
@section('body')
<script>
	$(document).ready(function() {
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	});
	$('#reset1').click(function() {
		$('#form1')[0].reset();
	});
	$('#reset2').click(function() {
		$('#form2')[0].reset();
	}); 
</script>
@stop