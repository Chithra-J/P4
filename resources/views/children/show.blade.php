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
							<a href="/children/createChild" class="btn btn-primary btn-sm ">
								&nbsp;+&nbsp;&nbsp;Add one more child !&nbsp;</a>
						</div>
					</div>

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
									<td class="center-text"><a href="/children/editChild/{{$child->id}}" class="btn btn-primary btn-sm ">
										Edit</a></td>
									<td class="center-text"><a href="/children/confirm-removeChild/{{$child->id}}" class="btn btn-primary btn-sm ">
										Remove</a></td>
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
	<script src="/assets/js/children/show.js"></script>
@stop
