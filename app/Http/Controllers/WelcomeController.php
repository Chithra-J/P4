<?php

namespace P4\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

	/**
	 * Responds to requests to GET /P$
	 */
	public function index() {
		return view('clapevents.index');
	}
}
