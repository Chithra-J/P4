@extends('layouts.master')

@section('title')
Clap Events - Editing My Profile
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<div class="col-md-offset-1 col-md-9">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Making changes to my profile</h3>
				</div>
				<div class="panel-body">										
					<div class="form-group">								
						<div class="col-lg-12">									
							<img alt="User Picture" src={{ URL::to('/') }}{{ $parent->picture_location }} class="img-circle img-responsive sized-small ">																		
						</div>
						<br>
						<a class="col-lg-12 align-with-form" href="/parents/addProfilePicture">
							<button type="button" class="btn btn-primary btn-sm ">Edit my profile picture</button></a>	
					</div>
					<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/parents/edit'>
						{{ csrf_field() }}
						<input type="hidden" id="user_id" name="user_id" value={{ $parent->id }}>
						<div class="form-group">
							<label class="col-lg-3 control-label">* First name:</label>
							<div class="col-lg-8">
								<!--<input class="form-control" type="text" name='firstname'  value='{{ old('firstname') }}'>-->
								<input class="form-control" type="text" name='firstname'  value={{ $parent->firstname }}>
								<div class='error'>
									{{ $errors->first('firstname') }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Last name:</label>
							<div class="col-lg-8">
								<!--<input class="form-control" type="text" name='lastname' value='{{ old('lastname') }}'>-->
								<input class="form-control" type="text" name='lastname' value={{ $parent->lastname }}>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Middle:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" name='middle'  value={{ $parent->middle }}>
								<div class='error'>
									{{ $errors->first('middle') }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Username:</label>
							<div class="col-md-8">
								<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
								<input class="form-control" type="text" name='username' value={{ $parent->name }}>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Gender:</label>
							<div class="col-md-8">  									 
								<div class="radio">
									<label>
										<input type="radio" name="gender" value="Female" @if(old('gender',$parent->gender)=='Female') checked @endif > Female
										</label>
								</div>
								<div class="radio">										
									<label>
										<input type="radio" name="gender" value="Male"  @if(old('gender',$parent->gender)=='Male') checked @endif > Male											
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
							<div class="col-md-11 center-text">
								<input type="submit" class="btn btn-primary" value="Save Changes">
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
</section>

@stop
@section('body')
<script>
	$(window).load(function() {
		$("div.input-group").addClass("input-group-sm");
	});
	
	$(document).ready(function() {
		$("ul.nav > li >").find(".active").removeClass("active");
		$('#editProfile').addClass("active");		
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");	
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