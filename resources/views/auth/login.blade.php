@extends('layouts.master')
@section('title')
Come in to Clap!
@stop
@section('content')
<section>
	<div class="container">
		<div class=" col-md-offset-3 col-md-6 col-md-offset-3">
				<br><br><br>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Already a member</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							@if(count($errors) > 0)
							<ul class='errors all_error'>
								@foreach ($errors->all() as $error)
								<li>
									<span>{{ $error }}</span>
								</li>
								@endforeach
							</ul>
							@endif
						</div>
						<form id="form1" class="form-horizontal" role="form" method='POST' action='/login'>
							{!! csrf_field() !!}
							<div class="form-group">
								<label class="col-md-5 control-label">* Email Address:</label>
								<div class="col-md-6">
									<!--<input class="form-control" type="text" name='username' value='{{ old('username') }}'>-->
									<input class="form-control" type="text" name='email' id='email' value='chit@w.com'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">* Password:</label>
								<div class="col-md-6">
									<!--<input class="form-control" type="password"  name='password'  value='{{ old('password') }}'>-->
									<input class="form-control" type="password"  name='password' id='password' value='helloworld'>
									<div class='error'>
										{{ $errors->first('password') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-5 col-sm-6">
									<div class="checkbox">
										<label for='remember' >
											<input type="checkbox" name='remember' id='remember'>
											Remember me </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label"></label>
								<div class="col-md-6">
									<input type="submit" class="btn btn-primary" value="Login">
									<span></span>
									<input id="reset1" type="reset" class="btn btn-default" value="Cancel">
								</div>
							</div>
							@if(count($errors) > 0)
							<div class='all_error'>
								Please correct the errors above and try again.
							</div>
							@endif
						</form>
					</div>
				</div>
			</div>
	</div>
</section>
@stop
@section('body')
<script>
	$(document).ready(function() {
		$('ul.nav.nav-pills.nav-stacked').hide();
	}); 
</script>
@stop
