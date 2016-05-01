<?php

namespace P4\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		
		if (Auth::guard($guard) -> check()) {
			return redirect('/');
			/*
			if (Auth::user()) {
							$parent = \P4\User::where('email', '=', Auth::user() -> email) -> get() -> first();
							return view('parents.showparentsdetails') -> with(['parent' => $parent]);
						} else {
							return redirect('/');
						}*/
			
		}
		//dump($next($request));
		return $next($request);
	}

}
