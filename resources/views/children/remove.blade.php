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
						<div class=" col-md-12 col-lg-12 ">
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
								<p>
									<strong>Are you sure you want to remove <em>{{$child->firstname}}</em>?</strong>
								</p>
								<p>
									<strong><a href='/children/removeChild/{{$child->id}}' class="btn btn-primary btn-sm ">
										&nbsp;&nbsp;&nbsp;Yes, remove&nbsp;</a></strong>
								</p>
								<p>
									<a href='{{ url('/children/create') }}' class="btn btn-primary btn-sm" id="btn-next">No, I do want to remove <em>{{$child->firstname}}!</a>
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
	<script src="/assets/js/children/remove.js"></script>
@stop
