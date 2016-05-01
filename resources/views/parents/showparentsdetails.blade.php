@extends('layouts.master')

@section('title')
	Edit profile {{ $parent->firstname }}
@stop

@section('header')
<!--
<nav class="container navbar navbar-default">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="#">Home</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="#">Action</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li>
<li role="separator" class="divider"></li>
<li class="dropdown-header">Nav header</li>
<li><a href="#">Separated link</a></li>
<li><a href="#">One more separated link</a></li>
</ul>
</li>
</ul>
<div class="navbar-right">
</div>
</div>
</nav>-->

@stop

@section('content')
<section>
	<div class="container">
		<!--<div class="row">-->
			<div class="col-sm-10">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Your Profile</h3>
					</div>					
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-lg-3 prof-pic">
								@if ( (!empty($parent -> picture_location)) and ($parent -> picture_location != "") and ($parent -> picture_location != NULL) and (!empty($parent -> picture_location)))
									<img alt="User Picture" src={{ URL::to('/') }}{{ $parent->picture_location }} class="img-circle img-responsive">
								@endif
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
			<!--</div>-->
		</div>
	</div>
</section>
@stop

@section('body')
<script>
	$(document).ready(function() {
		$("footer div.navbar.nav-footer").removeClass("navbar-fixed-bottom");
	});
	$('#sidebar').affix({
		offset : {
			top : 100
		}
	});
	/*
	 $('#navbar').affix({
	 offset: {
	 top: 10
	 }
	 });	*/

</script>
@stop
