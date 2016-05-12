@extends('layouts.master')

@section('title')
Clap Events Adding Child
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<div class="row">
			<form id="form1" class="form-horizontal" method='POST' action='/children/createChild'>
				<!-- edit form column -->
				<div class="col-md-offset-1 col-md-9 personal-info">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Add Child Profile</h3>
						</div>
						<div class="panel-body">
							<input type='hidden' name='_token' value='{{ csrf_token() }}'>
							<input type="hidden" id="user_id" name="user_id" value={{ $user_id }}>						
							<div class="form-group">
								<label class="col-lg-4 control-label">* First name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='firstname'  value="{{ old('firstname') }}">
									<div class='error'>
										{{ $errors->first('firstname') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Last name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='lastname' value="{{ old('lastname') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Middle:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='middlename' value="{{ old('middle') }}">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label ">* Date of birth (YYYY-MM-DD):</label>
								<div class='col-lg-7'>
									<div class='new-calendar input-group date col-lg-5' id='datetimepicker'>										
					                    <input type='text' class="new-calendar form-control" name='date_of_birth' value="">					                    
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
									<div class="col-md-7">
										<div class="radio">
											<label><input type="radio" name="gender" value="Female">Female</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="gender" value="Male">Male</label>
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
	<script src="/assets/js/children/create.js"></script>
@stop