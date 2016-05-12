@extends('layouts.master')

@section('title')
Clap Events
@stop

@section('content')
<section>
	<div class="container">
			<div class="col-sm-10 home-page">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">About Clap Events</h3>
				</div>
				<div class="panel-body">
					<p>
						Congratulations on successfull login!
					</p>
					<br>
					<p>
						You can now manage you profile. If you like to add a new child or edit existing details of your child go to "Children Profile". 
						You can add add or edit events for each child using "Events Profile" menu.
					</p>
					<br>
					<p>
						Enjoy tracking your kids memorable achievements!
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

@stop

@section('body')
	<script src="/assets/js/clapevents/show.js"></script>
@stop

