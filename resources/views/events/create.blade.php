@extends('layouts.master')

@section('title')
Clap Events - Adding Event for {{$child->firstname}}
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<div class="row">
			<form id="form1" class="form-horizontal" role="form" method='POST' action='/events/createEvent'>
				<input type='hidden' name='_token' value='{{ csrf_token() }}'>
				<input type="hidden" name="child_id" value={{ $child->id }}>
				<div class="col-md-offset-1 col-md-10 personal-info">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Add Event for {{$child->firstname}}</h3>
						</div>
						<div class="panel-body">							
							<!--
							<div class="form-group">
								@if ( (!empty($parent -> picture_location)) and ($parent -> picture_location != "") and ($parent -> picture_location != NULL) and (!empty($parent -> picture_location)))
									<a id="editprofilepicture" class="col-lg-4" href="/parents/addProfilePicture">Edit Profile Picture</a>
									<div class="col-lg-7">									
										<img alt="User Picture" src={{ URL::to('/') }}{{ $parent->picture_location }} class="img-circle img-responsive">	
																		
									</div>
								@else 
									<a id="editprofilepicture" class="col-lg-offset-3 col-lg-5" href="/parents/addProfilePicture">Add Profile Picture</a>
								@endif
							</div>-->							
							<div class="form-group">
								<label class="col-lg-4 control-label">* Event name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='event_name'  value="{{ old('event_name') }}">
									<div class='error'>
										{{ $errors->first('event_name') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label ">* Event date (YYYY-MM-DD):</label>
								<div class='col-lg-8'>
									<div class='new-calendar input-group date col-lg-5' id='datetimepicker'>										
					                    <input type='text' class="new-calendar form-control" name='event_date' value="">					                    
					                    <span class="new-calendar input-group-addon">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                    <div class='error'>
										{{ $errors->first('event_date') }}
									</div>
					                </div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Level:</label>
								<div class="col-md-2">
									<div class="radio">
										<label><input type="radio" name="level" value="Preliminary">Preliminary</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="level" value="Qualifying">Qualifying</label>
									</div>									
								</div>
								<div class="col-md-6">									
									<div class="radio">
										<label><input type="radio" name="level" value="State">State</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="level" value="National">National</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Rounds (1, 2, 3 . . .):</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='rounds' value="{{ old('rounds') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Standing (1st, 2nd, 3rd . . .):</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='standing' value="{{ old('standing') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Grade:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='grade' value="{{ old('grade') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label ">School Year(YYYY):</label>
								<div class='col-lg-8'>
									<div class='new-calendar input-group date col-lg-5' id='datetimepicker1'>										
					                    <input type='text' class="new-calendar form-control" name='school_year' value="">					                    
					                    <span class="new-calendar input-group-addon">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>
					                    </span>					                    
					                </div>
								</div>
							</div>						
							<div class="form-group">
								<label class="col-lg-4 control-label">School Name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='school_name' value="{{ old('school_name') }}">
								</div>
							</div>
							
							<div class="form-group">
									<label class="col-md-4 control-label">Won:</label>
									<div class="col-md-1">
										<div class="radio">
											<label><input type="radio" name="winner" value="1">Yes</label>
										</div>										
									</div>
								<div class="col-md-6">										
										<div class="radio">
											<label><input type="radio" name="winner" value="0">No</label>
										</div>
									</div>
								</div>
							<div class="form-group">
								<div class="col-md-offset-4 col-md-7">
									<input type="submit" class="btn btn-primary" value="Submit">
									<a href='{{ url('/events/create') }}' class="btn btn-default" id="btn-next">Cancel</a>
								</div>
							</div>
							@if(count($errors) > 0)
							<div class='all_error'>
								Please correct the errors above and try again.
							</div>
							@endif
						</div>
					</div>
				</div>
			</form>
		</div>
</section>
</div>
@stop
@section('body')
<script>
	$(window).load(function() {
		$("div.input-group").addClass("input-group-sm");
	});

	$(document).ready(function() {
		$('#datetimepicker').datetimepicker({
			viewMode: 'years',
			'allowInputToggle' : true,
                format: 'YYYY-MM-DD'
	    	});
	    $('#datetimepicker1').datetimepicker({
			viewMode: 'years',
			'allowInputToggle' : true,
                format: 'YYYY'
	    	});
		$("ul.nav > li >").find(".active").removeClass("active");
		$('#editEvent').addClass("active");
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