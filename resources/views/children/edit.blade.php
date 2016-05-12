@extends('layouts.master')

@section('title')
Clap Events Editing Child {{$child->firstname}}
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<div class="row">
			<form id="form1" class="form-horizontal" enctype="multipart/form-data" role="form" method='POST' action='/children/editChild'>
				{{ csrf_field() }}
				<input type='hidden' name='id' value='{{$child->id}}'>
				<!-- edit form column -->
				<div class="col-md-offset-1 col-md-9 personal-info">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Making some changes to {{$child->firstname}}'s profile</h3>
						</div>
						<div class="panel-body">							
							<div class="form-group">
								<label class="col-lg-4 control-label">* First name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='firstname'  value={{ $child->firstname }}>
									<div class='error'>
										{{ $errors->first('firstname') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Last name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='lastname' value={{ $child->lastname }}>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Middle:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='middlename'  value={{ $child->middle }}>									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label ">* Date of birth (YYYY-MM-DD):</label>
								<div class='col-lg-7'>
									<div class='new-calendar input-group date col-lg-5' id='datetimepicker'>										
					                    <input type='text' class="new-calendar form-control" id="date_of_birth" name='date_of_birth' value={{ $child->date_of_birth }}>					                    
					                    <span class="new-calendar input-group-addon">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                    <div class='error'>
										{{ $errors->first('date_of_birth') }}
										</div>
					                </div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Gender:</label>
								<div class="col-md-8">  									 
									<div class="radio">
										<label>
											<input type="radio" name="gender" value="Female" @if(old('gender',$child->gender)=='Female') checked @endif > Female
											</label>
									</div>
									<div class="radio">										
										<label>
											<input type="radio" name="gender" value="Male"  @if(old('gender',$child->gender)=='Male') checked @endif > Male											
											</label>
									</div>
								</div>
							</div>							
							<div class="form-group">
								<div class="col-md-offset-4 col-md-7">
									<input type="submit" class="btn btn-primary" value="Submit">
									<a href='{{ url('/children/create') }}' class="btn btn-default" id="btn-next">Cancel</a>
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
</div>
</section>
@stop
@section('body')
	<script src="/assets/js/children/edit.js"></script>
@stop