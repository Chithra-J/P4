@extends('layouts.master')

@section('title')
Clap Events - Deleting Event for {{ $child_firstname }}
@stop

@section('header')

@stop

@section('content')
<section>
	<div class="container">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<div class="col-sm-10">
			<br>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Removing {{ $event->event_name }} event from {{ $child_firstname }}'s profile </h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class=" col-md-12 col-lg-12 ">
							<table class="child-table table table-user-information">
								<thead>
									<tr>
										<td>FirstName</td>
										<td>Event Name</td>
										<td>Event Date</td>
										<td>Level</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $child_firstname }}</td>
										<td>{{ $event->event_name }}</td>
										<td>{{ $event->event_date }}</td>
										<td>{{ $event->level }}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="center-text col-md-12 ">
								<p><strong>
									Are you sure you want to remove this event for <em>{{$child_firstname}}</em>?
								</strong></p>
								<p>
									<strong><a href='/events/removeEvent/{{$event->id}}' class="btn btn-primary btn-sm ">
										&nbsp;&nbsp;&nbsp;Yes, remove&nbsp;</a></strong>
								</p>
								<p>
									<a href='{{ url('/events/create') }}' class="btn btn-primary btn-sm" id="btn-next">No, I want to keep this event for <em>{{$child_firstname}}!</a>
								</p>
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
	<script src="/assets/js/events/remove.js"></script>
@stop
