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
								<strong><p>
									Are you sure you want to remove this event for <em>{{$child_firstname}}</em>?
								</p></strong>
								<p>
									<strong><a href='/events/removeEvent/{{$event->id}}'>
									<button type="button" class="btn btn-primary btn-sm ">
										&nbsp;&nbsp;&nbsp;Yes, remove&nbsp;
									</button></a></strong>
								</p>
								<p>
									<?php
									$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
									?>
									<a href={{ $url }}>
									<button type="button" class="btn btn-primary btn-sm ">
										&nbsp;No, I want to keep this event for <em>{{$child_firstname}}!</em> &nbsp;
									</button></a>
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
