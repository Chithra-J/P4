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
								<a href="/events/createEvent/{{$child->id}}" class="btn btn-primary btn-sm" >Add an Event
								</a>&nbsp;&nbsp;&nbsp;														
							</div>							
						</div>						
						<br>						
						<br>												
						<div class="col-md-12">
							<p><strong>
								Click on the event (if any listed below) to see the details of the event for <em>{{$child->firstname}}</em>
							</strong></p>
						<?php 
							$id_count = 1; 
						?>
						<div class="accordion" id="accordionid">
						<div class="accordion-group">
							@foreach ($events as $event)
							<div class="accordion-heading">
								<div class="col-md-12">
									<div class="col-md-6">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionid" href="event-generator#{{ $id_count }}"> 
												{{ $id_count }}&nbsp;. &nbsp; &nbsp; Event Name: {{ $event->event_name }} &nbsp; Event Date: {{$event->event_date}}
										</a>
									</div>
									<div class="col-md-3">
										<a href="/events/editEvent/{{$event->id}}" class="btn btn-primary btn-sm ">
												Edit</a>
									</div>
									<div class="col-md-3">
										<a href="/events/confirm-removeEvent/{{$event->id}}" class="btn btn-primary btn-sm ">
												Remove</a>
									</div>
								</div>
							</div>
							<div id="{{ $id_count }}" class="accordion-body collapse">
								<div class="accordion-inner" >
									<div class="col-md-12 list-detail well">
										<br>
										
										<table class="child-table table table-user-information">
											<tbody>
												<tr>
													<td><strong><em>Level at which the event is happening</em></strong></td>
													<td>{{ $event->level }}</td>
												</tr>
												<tr>
													<td><strong><em>How many rounds have gone</em></strong></td>
													<td>{{ $event->rounds }}</td>
												</tr>
												<tr>
													<td><strong><em>Standing</em></strong></td>
													<td>{{ $event->standing }}</td>
												</tr>
												<tr>
													<td><strong><em>Winner</em></strong></td>
													<td>@if($event->winner==1) 
															Won
														@elseif (!is_null($event->winner) && ($event->winner==0))
															Lost
														@endif</td>
												</tr>
												<tr>
													<td><strong><em>Grade during this event</em></strong></td>
													<td>{{ $event->grade }}</td>
												</tr>
												<tr>
													<td><strong><em>School Name</em></strong></td>
													<td>{{ $event->school_name }}</td>
												</tr>
											</tbody>
										</table>
									</div>
									<br>
									
								</div>
							</div>
							<br>
							<?php $id_count++; ?>
							@endforeach	
							
												
						</div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</section>
@stop

@section('body')
	<script src="/assets/js/events/view.js"></script>
@stop
