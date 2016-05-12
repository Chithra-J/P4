<!doctype html>
<html>
	<head>
		<title> @yield('title','Dynamic Web Application Project P4') </title>
		<meta charset='utf-8'>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="_token" content="{{ csrf_token() }}">
		<link href="/assets/css/P4.css" type='text/css' rel='stylesheet'>
		<link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
		<link href="/assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/assets/js/fileinput.min.js"></script>
		<link rel="icon" href="/assets/images/favicon.ico">
		@yield('head')		
	</head>
	<body class="main">
		<div class="container-fluid">
			<header class="row">
				<div class="col-sm-2">
					@if(Auth::user())
				<div class="login-left">
					<div class="login-left">
						&nbsp;&nbsp;Welcome {{ ucfirst(Auth::user()->name) }} ! &nbsp;&nbsp; 
					</div>
				</div>
				@endif
				</div>
				<div class="col-sm-8 container main-title">
					<div class="login">
						<strong><a class="clap" href="/" title="Clap Events : Capturing awesome moments of kids"> 
							&nbsp;&nbsp;<img class="CE_logo" src="/assets/images/final_logo.png" alt="Clap Events!">
								Clap Events&nbsp;&nbsp; </a></strong>
					</div>
					@yield('header')
				</div>
				@if(Auth::user())
				<div>
					<div class="login-right">						
						<a href="/logout">&nbsp;&nbsp;Logout&nbsp;&nbsp;</a>
					</div>
				</div>
				@else
				<div class="col-sm-2">
					<div class="login-right">
						<strong>Are you a member? <hr class="login">
						<a href="/login">Login</a>&nbsp;or&nbsp;
						<a href="/register">Register</a></strong>
						</div>
				</div>
				@endif
			</header>
			<hr class='main'>
			<section>
				@if(Auth::user())
				<!-- left column -->
				<div class="col-sm-2">
					<ul id="sidebar" class="nav nav-pills nav-stacked">
						<li>
							<a id="home" href="/">Home</a>
						</li>
						<li>
							<a id="editProfile" href="/parents/create">Manage My Profile</a>
						</li>
						<li>
							<a id="editChild" href="/children/create">Children Profile</a>
						</li>
						<li>
							<a id="editEvent" href="/events/create">Events Profile</a>
						</li>
					</ul>
				</div>
				@endif
				@yield('content')
			</section>
			<footer>
				<div class="navbar nav-footer navbar-fixed-bottom ">
					<div class="container" >
						<div class="row" >
							<div class="col-sm-6">
								<p class="nav navbar-nav nav-custom-footer">
									&copy; {{ date('Y') }} &nbsp;&nbsp;
									<a class="git-title" target="_blank" href='https://github.com/Chithra-J/P4'> View on Github</a>
								</p>
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