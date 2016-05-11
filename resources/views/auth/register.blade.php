@extends('layouts.master')
@section('title')
Clap Events - Come in to Clap!
@stop
@section('content')
<section>
	<div class="container">
		<div class=" col-md-offset-3 col-md-6 col-md-offset-3">
					<br><br><br>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">New Member Registration</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								@if(count($errors) > 0)
								<ul class='errors all_error'>
									@foreach ($errors->all() as $error)
									<li>
										<span>{{ $error }}</span>
									</li>
									@endforeach
								</ul>
								@endif
							</div>
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
									<label class="col-lg-3 control-label">Middle Initial:</label>
									<div class="col-lg-8">
										<!--<input class="form-control" type="text" name='lastname' value='{{ old('lastname') }}'>-->
										<input class="form-control" type="text" name='middle' value='MiddleName'>
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
										<input class="form-control" type="text" id="name" name='name' value='UserName'>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Gender:</label>
									<div class="col-md-8">
										<div class="radio">
											<label>
												<input type="radio" name="gender" value="Female">
												Female</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="gender" value="Male">
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
										<input class="form-control" type="password" id='password_confirmation' name='password_confirmation'  value='helloworld'>
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
										<input id="reset2" type="reset" class="btn btn-default" value="Reset">
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
			<!--			</div>
	
			</div>
					</div>-->
	</div>
</section>
@stop

@section('body')
<script>
	$(document).ready(function() {
		$('ul.nav.nav-pills.nav-stacked').hide();
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	}); 
</script>
@stop