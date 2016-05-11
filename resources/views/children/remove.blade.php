@extends('layouts.master')

@section('title')
Clap Events Deleting Children Profile
@stop

@section('header')

@stop

@section('content')
<section>
	<div class="container">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>

		<!--</form>-->
		<div class="col-sm-offset-1 col-sm-9">
			<br>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Removing {{ $child->firstname }} from my children's profile</h3>
				</div>
				<div class="panel-body">

					<div class="row">
						<!--
						<div class="col-md-3 col-lg-3 prof-pic">
						@if ( (!empty($child -> picture_location)) and ($child -> picture_location != "") and ($child -> picture_location != NULL) and (!empty($child -> picture_location)))
						<img alt="User Picture" src={{ URL::to('/') }}{{ $child->picture_location }} class="img-circle img-responsive">
						@endif
						</div>-->

						<div class=" col-md-12 col-lg-12 ">
							<!--table table-user-information-->
							<table class="child-table table table-user-information">
								<thead>
									<tr>
										<td>FirstName</td>
										<td>LastName</td>
										<td>Middle</td>
										<td>Date of birth</td>
										<td>Gender</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $child->firstname }}</td>
										<td>{{ $child->lastname }}</td>
										<td>{{ $child->middle }}</td>
										<td>{{ $child->date_of_birth }}</td>
										<td>{{ $child->gender }}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="center-text col-md-12 ">
								<strong><p>
									Are you sure you want to remove <em>{{$child->firstname}}</em>?
								</p></strong>
								<p>
									<strong><a href='/children/removeChild/{{$child->id}}'>
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
										&nbsp;No, I want to keep {{$child->firstname}}'s profile!&nbsp;
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
