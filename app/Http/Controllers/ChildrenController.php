<?php

namespace P4\Http\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';
use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use P4\Http\Requests;
use Auth;

class ChildrenController extends Controller {
	public function getCreate() {
		$parent = \P4\User::where('email', '=', Auth::user() -> email) -> get() -> first();
		/*
		$parent = \P4\Children::find(Auth::user() -> id);
		return view('parents.getparentsdetails') -> with(['parent' => $parent]);*/
		return view('children.getchildrendetails') -> with(['parent' => $parent]);		
	}
	
	public function getExisting(Request $request) {
		//$this -> validate($request, ['username' => 'required|string', 'password' => 'required|string', ]);
		$data = $request -> all();
		$child = \P4\Children::where('user_parent_id', '=', $data['user_parent_id']) -> get() -> first();
		if ($parent != null) {
			return view('children.showchildrendetails') -> with('child', $child);
		} else {
			\Session::flash('message', 'No such registered email adress! Please verify your username');
			return redirect('/parents/login');
		}
	}
	public function postCreate(Request $request) {

		$this -> validate($request, ['firstname' => 'required|string', 'lastname' => 'required|string', 'date_of_birth' => 'required|string', ]);

		$data = $request -> all();
		/*
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
		*/
		
		return view('children.showchildrendetails') -> with(['child' => child]);
	}
	
}
