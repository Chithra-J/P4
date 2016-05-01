<?php

namespace P4\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller {

	/**
	 * Responds to requests to GET /P$
	 */
	public function index() {
		if (Auth::user()) {
			$parent = \P4\User::where('id', '=', Auth::user()->id) -> get() -> first();
			//print_r($parent);
			return view('parents.showparentsdetails') -> with(['parent' => $parent]);
		} else {
			return view('clapevents.index');
		}		
	}

}
