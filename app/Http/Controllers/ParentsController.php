<?php

namespace P4\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentsController extends Controller {

	public function getCreate() {
		return view('parents.getparentsdetails');
	}
	public function postCreate() {
		return view('parents.showparentsdetails');
	}
}
