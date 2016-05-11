@extends('layouts.master')

@section('title')
Clap Events Show Children Profile
@stop

@section('header')

@stop

@section('content')
<section>
	<div class="container">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<div class="row">
		<div class="col-md-offset-1 col-md-9 personal-info">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">My Children Profile</h3>
				</div>
				<div class="panel-body">

					<div class="col-md-12">
						<div class="form-group">

							<!--<input type="submit" class="btn btn-primary"  value="Add &nbsp; a &nbsp; child">-->
							<a href="/children/createChild">
							<button type="button" class="btn btn-primary btn-sm ">
								&nbsp;+&nbsp;&nbsp;Add one more child !&nbsp;
							</button></a>

						</div>
					</div>

					<!--
					<div class="col-md-3 col-lg-3 prof-pic">
					@if ( (!empty($child -> picture_location)) and ($child -> picture_location != "") and ($child -> picture_location != NULL) and (!empty($child -> picture_location)))
					<img alt="User Picture" src={{ URL::to('/') }}{{ $child->picture_location }} class="img-circle img-responsive">
					@endif
					</div>-->

					<div class="col-md-12">
						<table class="child-table table table-user-information">
							<thead>
								<tr>
									<td>FirstName</td>
									<td>LastName</td>
									<td>Middle</td>
									<td>Date of birth</td>
									<td>Gender</td>
									<td colspan="2" class="center-text">Action</td>
								</tr>
							</thead>
							<tbody>
								@foreach($children as $child)
								<tr>
									<td>{{ $child->firstname }}</td>
									<td>{{ $child->lastname }}</td>
									<td>{{ $child->middle }}</td>
									<td>{{ $child->date_of_birth }}</td>
									<td>{{ $child->gender }}</td>
									<td class="center-text"><a href="/children/editChild/{{$child->id}}">
									<button type="button" class="btn btn-primary btn-sm ">
										Edit
									</button></a></td>
									<td class="center-text"><a href="/children/confirm-removeChild/{{$child->id}}">
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
		$("ul.nav > li >").find(".active").removeClass("active");
		$('#editChild').addClass("active");	
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	});
	$('#sidebar').affix({
		offset : {
			top : 100
		}
	});
	
</script>
@stop
