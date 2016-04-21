<!doctype html>
<html>
	<head>
		<title> @yield('title','Dynamic Web Application Project P4') </title>
		<meta charset='utf-8'>
		<link href="/assets/css/P4.css" type='text/css' rel='stylesheet'>
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/lettering.js/0.6.1/jquery.lettering.min.js"></script>

		{{-- Yield any page specific CSS files or anything else you might want in the head --}}
		@yield('head')

	</head>
	<body class="main">
		<div class="container-fluid">
			<header class="row">
				<div class="col-sm-2"></div>
					<div class="col-sm-8 container main-title">
						
						<div class="login">							
							<strong><a class="clap" href="/" title="Clap Events : Capturing awesome moments of kids">
							<img class="logo" src="/assets/images/logo1.png"/>
							<img class="logo" src="/assets/images/logo.png"/>&nbsp;&nbsp;Clap Events&nbsp;&nbsp;
							<img class="logo" src="/assets/images/logo1.png"/>
							<img class="logo" src="/assets/images/logo.png"/></a></strong>							
						</div>
						
				@yield('header')
				</div>
				<div class="col-sm-2">
					<strong class="login-right">Are you a member? </strong><br>
					<a class="login-right" href="/parents/login">Register / Login</a> 
				</div>
			</header>
			<section>
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