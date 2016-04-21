<?php

namespace P4\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use P4\Http\Requests;
//use P4\app\Parent;

class ParentsController extends Controller {

	public function getCreate() {
		return view('parents.getparentsdetails');
	}

	public function getLogin() {
		return view('parents.getlogindetails');
	}

	public function getExisting(Request $request) {
		$this -> validate($request, ['username' => 'required|string', 'password' => 'required|string', ]);
		$data = $request -> all();
		$parent = \P4\UserParent::where('username', '=', $data['username']) -> get() -> first();
		if ($parent != null) {
			return view('parents.showparentsdetails') -> with('parent', $parent);
		} else {
			\Session::flash('message', 'No such username! Please verify your username');
			return redirect('/parents/login');
		}
	}

	public function postCreate(Request $request) {

		$this -> validate($request, ['firstname' => 'required|string', 'email' => 'required|string', 'password' => 'required|string', 'confirm_password' => 'required|string', ]);

		$data = $request -> all();
		$parent = \P4\UserParent::where('username', '=', $data['username']) -> get() -> first();
		if ($parent != null) {
			\Session::flash('message', 'Username already exist! Please try login using your username');
			return redirect('/parents/login');
		} else {
			// Create new Parent
			$parent = new \P4\UserParent();
			$parent -> firstname = $data['firstname'];
			$parent -> lastname = $data['lastname'];
			$parent -> username = $data['username'];
			$parent -> save();
		}

		return view('parents.showparentsdetails') -> with(['parent' => $parent]);
	}

}
