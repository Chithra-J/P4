@extends('layouts.master')

@section('title')
	Clap Events - Show my profile 
@stop

@section('header')

@stop

@section('content')
<section>
	<div class="container">
			<div class="col-sm-offset-1 col-sm-9">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">My Profile</h3>
					</div>					
					<div class="panel-body">
							<div class="col-md-3 col-lg-3 prof-pic">
									<img alt="User Picture" src={{ URL::to('/') }}{{ $parent->picture_location }} class="img-circle img-responsive sized-small">
							</div>
							<div class=" col-md-9 col-lg-9 ">
								<table class="table table-user-information">
									<tbody>
										<tr>
											<td class="less">FirstName:</td>
											<td>{{ $parent->firstname }}</td>
										</tr>
										<tr>
											<td class="less">LastName:</td>
											<td>{{ $parent->lastname }}</td>
										</tr>
										<tr>
											<td class="less">Email:</td>
											<td>{{ $parent->email }}</td>
										</tr>
										<tr>
											<td class="less">Username:</td>
											<td>{{ $parent->name }}</td>
										</tr>
										<tr>
											<td class="less">Middle:</td>
											<td>{{ $parent->middle }}</td>
										</tr>
										<tr>
											<td class="less">Gender:</td>
											<td>{{ $parent->gender }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
				</div>
		</div>
	</div>
</section>
@stop

@section('body')
	<script src="/assets/js/parents/show.js"></script>
@stop
