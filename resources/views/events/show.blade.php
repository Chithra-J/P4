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
					<!--
					<div class="col-md-3 col-lg-3 prof-pic">
					@if ( (!empty($child -> picture_location)) and ($child -> picture_location != "") and ($child -> picture_location != NULL) and (!empty($child -> picture_location)))
					<img alt="User Picture" src={{ URL::to('/') }}{{ $child->picture_location }} class="img-circle img-responsive">
					@endif
					</div>-->

					<div class="col-md-12">
						<!--table table-user-information-->
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
										<td>{{ $child->date_of_birth }}</td><td class="center-text"><a href="/events/viewEvent/{{$child->id}}">
										<button type="button" class="btn btn-primary btn-sm ">
											View Events
										</button></a></td>
										<td class="center-text"><a href="/events/createEvent/{{$child->id}}">
										<button type="button" class="btn btn-primary btn-sm ">
											Add Events
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
