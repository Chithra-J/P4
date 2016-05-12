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
						<form id="form1" class="form-horizontal" method='POST' action='/login'>
							{!! csrf_field() !!}
							<div class="form-group">
								<label class="col-md-5 control-label">* Email Address:</label>
								<div class="col-md-6">
									<input class="form-control" type="text" name='email' id='email' value='{{ old('email') }}'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">* Password:</label>
								<div class="col-md-6">
									<input class="form-control" type="password"  name='password' id='password' value='{{ old('password') }}'>
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
									<a href='{{ url('/') }}' class="btn btn-default">Cancel</a>
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
	<script src="/assets/js/auth/login.js"></script>
@stop
