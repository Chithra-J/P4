@extends('layouts.master')

@section('title')
Clap Events Show Events
@stop

@section('header')

@stop

@section('content')
<section>
	<div class="container">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<div class="row">
		<div class="col-md-11 personal-info">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">My Children's Events</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						@if (count($children) > 0)
						<table class="child-table table table-user-information">							
							<thead>
								<tr>
									<td>Child Name</td>
									<td>Date Of Birth</td>								
									<td colspan="2" class="center-text">Action</td>
								</tr>
							</thead>
							<tbody>
								@foreach($children as $child)									
									<tr>
										<td>{{ $child->firstname }}</td>
										<td>{{ $child->date_of_birth }}</td><td class="center-text">
										<a href="/events/viewEvent/{{$child->id}}" class="btn btn-primary btn-sm">
											View Events</a></td>
										<td class="center-text"><a href="/events/createEvent/{{$child->id}}" class="btn btn-primary btn-sm">
											Add Events</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
						@else
								<p><strong>
									No Events to show as there is no Child in your "Children Profile". 
									You can start tracking events for a Child after adding one using "Children Profile""
								</strong></p>								
						@endif
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
@stop

@section('body')
	<script src="/assets/js/events/show.js"></script>
@stop
