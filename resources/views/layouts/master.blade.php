<!doctype html>
<html>
	<head>
		<title> @yield('title','Dynamic Web Application Project P4') </title>
		<meta charset='utf-8'>
		<link href="/assets/css/P4.css" type='text/css' rel='stylesheet'>
		<link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
		<link href="/assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/assets/js/fileinput.min.js"></script>

		{{-- Yield any page specific CSS files or anything else you might want in the head --}}
		@yield('head')
		<!--
		<script>
					$("div.input-group").addClass("input-group-sm");
				</script>-->
		
	</head>
	<body class="main">
		<div class="container-fluid">
			<header class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 container main-title">

					<div class="login">
						<strong><a class="clap" href="/" title="Clap Events : Capturing awesome moments of kids"> &nbsp;&nbsp;Clap Events&nbsp;&nbsp; </a></strong>
					</div>

					@yield('header')
				</div>
				@if(Auth::user())
				Welcome Back {{ Auth::user()->name }} ! | <a href="/logout">Logout</a>
				@else
				<div class="col-sm-2">
					<span><strong class="login-right">Are you a member? </strong></span>
					<br>
					<span><a class="login-right" href="/login">Login</a></span>
					<span>&nbsp;&nbsp;or&nbsp;&nbsp;</span>
					<span><a class="login-right" href="/register">Register</a></span>
				</div>
				@endif
			</header>
			<section>
				@if(Auth::user())
				<!-- left column -->
				<br>
				<br>
				<div class="col-sm-2">
					<ul id="sidebar" class="nav nav-pills nav-stacked">
						<li>
							<a href="/">Home</a>
						</li>
						<li>
							<a id="editProfile" href="/parents/create">My Profile</a>
						</li>
						<li>
							<a id="editChild" href="/children/create">Children Profile</a>
						</li>
						<li>
							<a id="events" href="/events/existing">Events Profile</a>
						</li>
					</ul>
				</div>
				@endif
				{{-- Main page content will be yielded here --}}
				@yield('content')
			</section>
			<footer>
				<div class="navbar nav-footer navbar-fixed-bottom ">
					<div class="container" >
						<div class="row" >
							<div class="col-sm-6">
								<ul class="nav navbar-nav nav-custom-footer">
									&copy; {{ date('Y') }} &nbsp;&nbsp;
									<a target="_blank" href='https://github.com/Chithra-J/P4'> View on Github</a>
								</ul>
							</div>
							<div class="col-sm-5">
								<p class="footer-label-right">
									Dynamic Web Application Project P4 by Chithra Jayakumar
								</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		@yield('body')
	</body>
</html>