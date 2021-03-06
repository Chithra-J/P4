@extends('layouts.master')

@section('title')
Clap Events - Editing Event for {{$child->firstname}}
@stop
@section('header')

@stop
@section('content')
<section>
	<div class="container">
		<div class="row">
			<form id="form1" class="form-horizontal" enctype="multipart/form-data" method='POST' action='/events/editEvent'>
				{{ csrf_field() }}
				<input type='hidden' name='event_id' value='{{$event->id}}'>
				<input type="hidden" name="child_id" value={{ $child->id }}>
				<div class="col-md-offset-2 col-md-9 personal-info">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Editing Event for {{$child->firstname}}</h3>
						</div>
						<div class="panel-body">						
							<div class="form-group">
								<label class="col-lg-4 control-label">* Event name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='event_name'  value={{$event->event_name}}>
									<div class='error'>
										{{ $errors->first('event_name') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label ">* Event date (YYYY-MM-DD):</label>
								<div class='col-lg-8'>
									<div class='new-calendar input-group date col-lg-5' id='datetimepicker'>										
					                    <input type='text' class="new-calendar form-control" id='event_date' name='event_date' value={{$event->event_date}}>					                    
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
										<label><input type="radio" name="level" value="Preliminary" @if(old('level',$event->level)=='Preliminary') checked @endif> Preliminary</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="level" value="Qualifying" @if(old('level',$event->level)=='Qualifying') checked @endif>Qualifying</label>
									</div>									
								</div>
								<div class="col-md-6">									
									<div class="radio">
										<label><input type="radio" name="level" value="State" @if(old('level',$event->level)=='State') checked @endif>State</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="level" value="National" @if(old('level',$event->level)=='National') checked @endif>National</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Rounds (1, 2, 3 . . .):</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='rounds' value={{$event->rounds}}>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Standing (1st, 2nd, 3rd . . .):</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='standing' value={{$event->standing}}>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Grade:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='grade' value={{$event->grade}}>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label ">School Year(YYYY):</label>
								<div class='col-lg-8'>
									<div class='new-calendar input-group date col-lg-5' id='datetimepicker1'>										
					                    <input type='text' class="new-calendar form-control" id='school_year' name='school_year' value={{$event->school_year}}>					                    
					                    <span class="new-calendar input-group-addon">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>
					                    </span>					                    
					                </div>
								</div>
							</div>						
							<div class="form-group">
								<label class="col-lg-4 control-label">School Name:</label>
								<div class="col-lg-7">
									<input class="form-control" type="text" name='school_name' value={{$event->school_name}}>
								</div>
							</div>
							
							<div class="form-group">
									<label class="col-md-4 control-label">Won:</label>
									<div class="col-md-1">
										<div class="radio">
											<label><input type="radio" name="winner" value="1" @if(old('winner',$event->winner)) checked @endif>Yes</label>
										</div>										
									</div>
								<div class="col-md-6">										
										<div class="radio">
											<label><input type="radio" name="winner" value="0" @if((old('winner',$event->winner))===0) checked @endif>No</label>
										</div>
									</div>
								</div>
							<div class="form-group">
								<div class="col-md-offset-4 col-md-7">
									<input type="submit" class="btn btn-primary" value="Submit">
									<a href='{{ url('/').'/events/viewEvent/'.$child->id}}' class="btn btn-default" id="btn-next">Cancel</a>
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
	<script src="/assets/js/events/edit.js"></script>
@stop