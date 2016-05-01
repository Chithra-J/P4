<?php

namespace P4\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use P4\Http\Requests;
use Auth;
use File;

class ParentsController extends Controller {

	public function getCreate() {
		//$parent = \P4\User::where('email', '=', Auth::user() -> email) -> get() -> first();
		$parent = \P4\User::find(Auth::user() -> id);
		return view('parents.getparentsdetails') -> with(['parent' => $parent]);
	}

	
	public function postEdit(Request $request) {

		$parent = \P4\User::find($request->user_id);
		
		//$parent = \P4\User::where('email', '=', $request -> email) -> get() -> first();
		//dump($parent);
		//print_r($request);

		$parent -> firstname = $request -> firstname;
		$parent -> lastname = $request -> lastname;
		$parent -> middle = $request -> middle;
		$parent -> name = $request -> username;
		$parent -> password = \Hash::make($request -> password);
		if (!is_null($request -> female) && ($request -> female == "on")) {
				$parent -> gender = "female";
			}
			if (!is_null($request -> male) && ($request -> male == "on")) {
				$parent -> gender = "male";
		}
		//$parent -> gender = $request -> gender;
		$parent -> save();

		\Session::flash('message', 'Your profile changes were saved.');
		return view('parents.showparentsdetails') -> with(['parent' => $parent]);

	}

	/*
	public function getExisting(Request $request) {
			$this -> validate($request, ['email' => 'required|string', 'password' => 'required|string', ]);
			$parent = \P4\User::where('email', '=', $request -> email) -> get() -> first();
	
			if ($parent != null) {
				return view('parents.showparentsdetails') -> with('parent', $parent);
			} else {
				\Session::flash('message', 'No such registered email adress! Please verify your username');
				return redirect('/parents/login');
			}
	
		}
	

	public function postCreate(Request $request) {

		$this -> validate($request, ['firstname' => 'required|string', 'email' => 'required|string', 'password' => 'required|string', 'confirm_password' => 'required|string', ]);

		//$data = $request -> all();
		dump($request);

		$parent = \P4\User::where('email', '=', $request -> email) -> get() -> first();

		if ($parent != null) {
			\Session::flash('message', 'You have already signed up to Clap! Please try login using your email address');
			return redirect('/parents/login');
		} else {
			// Create new Parent
			$parent = new \P4\User();
			$parent -> firstname = $request -> firstname;
			$parent -> lastname = $request -> lastname;
			$parent -> middle = $request -> middle;
			$parent -> name = $request -> username;
			$parent -> password = \Hash::make($request -> password);
			//$parent->picture_location = $request->picture_location;
			if (!is_null($request -> female) && ($request -> female == "on")) {
				$parent -> gender = "female";
			}
			if (!is_null($request -> male) && ($request -> male == "on")) {
				$parent -> gender = "male";
			}
			$parent -> save();
			dump($parent);
		}

		return view('parents.showparentsdetails') -> with(['parent' => $parent]);
	}*/

	public function editProfilePicture() {
		$parent = \P4\User::where('email', '=', Auth::user() -> email) -> get() -> first();
		return view('parents.getprofilepicture') -> with(['parent' => $parent]);
	}

	public function processProfilePicture() {

		if (empty($_FILES['images'])) {
			echo json_encode(['error' => 'No files found for upload.']);
			return;
		}
		$images = $_FILES['images'];
		$user_id = empty($_POST['user_id']) ? '' : $_POST['user_id'];

		$success = null;
		$paths = ['.'];
		$filenames = $images['name'];

		for ($i = 0; $i < count($filenames); $i++) {
			$ext = explode('.', basename($filenames[$i]));
			$parent_picture_folder = "assets\\uploads\\" . $user_id;
			$extension = array_pop($ext);
			$target = "assets\\uploads\\" . $user_id . "\\" . $user_id . "." . $extension;
			if (!is_dir($parent_picture_folder)) {
				File::makeDirectory($parent_picture_folder, 0775, true);
			} else {
				foreach (glob($parent_picture_folder."\\*.*") as $filename) {
					if (is_file($filename)) {
						unlink($filename);
					}
				}
			}

			if (move_uploaded_file($images['tmp_name'][$i], $target)) {
				$success = true;
				$paths[] = "\\assets\\uploads\\" . $user_id . "\\" . $user_id . "." . $extension;
			} else {
				$success = false;
				break;
			}
		}

		if ($success === true) {
			$output = ['uploaded' => $paths];
		} else {
			$output = ['error' => 'No files were processed.'];
		}
		echo json_encode($output);
	}

	public function postEditProfilePicture(Request $request) {
		$parent = \P4\User::where('email', '=', $request -> email) -> get() -> first();
		if ($request -> remove_profile_picture == "on") {
			$parent -> picture_location = "";
		}
		if (!is_null($request -> picture_location_to_store) && ($request -> picture_location_to_store != "")) {
			$parent -> picture_location = $request -> picture_location_to_store;
		}

		$parent -> save();
		return view('parents.showparentsdetails') -> with(['parent' => $parent]);
	}
	

}
