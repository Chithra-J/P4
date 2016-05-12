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
			return view('clapevents.show');
		} else {
			return view('clapevents.index');
		}		
	}

}
