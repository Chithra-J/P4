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
			<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/children/create'>
				<!-- edit form column -->
				<div class="col-md-offset-1 col-md-8 personal-info">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Add Child Profile</h3>
						</div>

						<div class="panel-body">
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<input type="hidden" id="user_id" name="user_id" value={{ $parent->
							id }}>
							<input type="hidden" id="email" name="email" value={{ $parent->
							email }}>
							
							<!--
							<div class="form-group">
								@if ( (!empty($parent -> picture_location)) and ($parent -> picture_location != "") and ($parent -> picture_location != NULL) and (!empty($parent -> picture_location)))
									<a id="editprofilepicture" class="col-lg-3" href="/parents/addProfilePicture">Edit Profile Picture</a>
									<div class="col-lg-8">									
										<img alt="User Picture" src={{ URL::to('/') }}{{ $parent->picture_location }} class="img-circle img-responsive">	
																		
									</div>
								@else 
									<a id="editprofilepicture" class="col-lg-offset-3 col-lg-5" href="/parents/addProfilePicture">Add Profile Picture</a>
								@endif
							</div>-->
							
							
							<div class="form-group">
								<label class="col-lg-3 control-label">* First name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='firstname'  value='{{ old('firstname') }}'>-->
									<input class="form-control" type="text" name='firstname'  value="">
									<div class='error'>
										{{ $errors->first('firstname') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Last name:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text" name='lastname' value='{{ old('lastname') }}'>-->
									<input class="form-control" type="text" name='lastname' value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Middle:</label>
								<div class="col-lg-8">
									<!--<input class="form-control" type="text"  name='email'  value='{{ old('email') }}'>-->
									<input class="form-control" type="text" name='middle' value="">
									<div class='error'>
										{{ $errors->first('middle') }}
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label calendar-control">Date of birth:</label>
								<div class='col-lg-5'>
									<div class='input-group date col-lg-5' id='datetimepicker'>										
					                    <input type='text' class="form-control">
					                    <span class="input-group-addon">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
								
								</div>
								<div class='col-lg-3'></div>
							</div>
							<div class="form-group">
									<label class="col-md-3 control-label">Gender:</label>
									<div class="col-md-8">
										<div class="radio">
											<label>
												<input type="radio" name="gender">
												Female</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="gender">
												Male</label>
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
							<!--</form>-->
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

	$(document).ready(function() {
		$('#datetimepicker').datetimepicker({
			viewMode: 'years',
                format: 'MM/DD/YYYY'
	    	});
		/*$("ul.nav > li >").find(".active").removeClass("active");*/
		$('#editProfile').addClass("active");
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
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