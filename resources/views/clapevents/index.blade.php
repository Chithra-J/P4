@extends('layouts.master')

@section('title')
Clap Events
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')

@stop

@section('content')
<section>
	<div class="container">
		<div class="home-page">
			<p>
				Clap Events is a helpful website for parents who track thier unique child's acheivments whether it's a basketball
				tournement or a math competetion "Clap Events" can make that special event memorable.
			</p>
			<br>
			<p>
				You might say you can just take a picture or write it down in a piece of paper, but that can get easily lost.  Clap Events will remind you when there is something important for you to attend.
				Clap Events will also track what your child did at the event.
			</p>
			<br>
			<p>
				All you have to do is sign up with your email and enjoy tracking your kids memorable achievements.
			</p>
		</div>
	</div>
</section>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')

@stop

