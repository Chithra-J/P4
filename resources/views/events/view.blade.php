@extends('layouts.master')

@section('title')
Clap Events - View Events for {{ $child->firstname }}
@stop

@section('header')

@stop

@section('content')
<section>
	<div class="container">
		<div class="row">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<div class="col-md-11 personal-info">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">{{ $child->firstname }}'s Events</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-md-11">								
								<a href='{{ url('/events/create') }}' class="btn btn-primary btn-sm" id="btn-next">Go Back</a>
								&nbsp;&nbsp;&nbsp;
								<a href="/events/createEvent/{{$child->id}}">
								<input name="back" type="button" class="btn btn-primary btn-sm" value="Add an Event">
								</a>&nbsp;&nbsp;&nbsp;
								<a href="/events/createEventsReport/{{$child->id}}">
								<input name="back" type="button" class="btn btn-primary btn-sm" value="Create PDF Report">
								</a>
							</div>
							
						</div>
						
						<br>
						<br>
						<div class="col-md-12">
							<table class="child-table table table-user-information">							
								<thead>
									<tr>
										<td>Child Name</td>
										<td>Event</td>
										<td>Date</td>
										<td>Level</td>
										<td>Round</td>
										<td>Standing</td>
										<td>Won</td>
										<td>Grade</td>
										<td>School</td>
										<td colspan="2" class="center-text">Action</td>									
									</tr>
								</thead>
								<tbody>																	
									@foreach($events as $event)
									<tr>
										<td>{{ $child->firstname }}</td>
										<td>{{ $event->event_name }}</td>
										<td>{{ $event->event_date }}</td>
										<td>{{ $event->level }}</td>
										<td>{{ $event->rounds }}</td>
										<td>{{ $event->standing }}</td>
										<td>@if($event->winner) 
												Won
											@else 
												Lost
											@endif</td>
										<td>{{ $event->grade }}</td>
										<td>{{ $event->school_name }}</td>										
										<td class="center-text"><a href="/events/editEvent/{{$event->id}}">
										<button type="button" class="btn btn-primary btn-sm ">
											Edit
										</button></a></td>
										<td class="center-text"><a href="/events/confirm-removeEvent/{{$event->id}}">
										<button type="button" class="btn btn-primary btn-sm ">
											Remove
										</button></a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop

@section('body')
<script>
	$(document).ready(function() {
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
		$("ul.nav > li >").find(".active").removeClass("active");
		$('#editEvent').addClass("active");
	});
	$('#sidebar').affix({
		offset : {
			top : 100
		}
	});
	
</script>
@stop
