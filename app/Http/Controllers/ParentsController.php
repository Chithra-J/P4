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
		$parent = \P4\User::find(Auth::user() -> id);
		return view('parents.create') -> with(['parent' => $parent]);
	}

	
	public function postEdit(Request $request) {

		$parent = \P4\User::find($request->user_id);
		$parent -> firstname = $request -> firstname;
		$parent -> lastname = $request -> lastname;
		$parent -> middle = $request -> middle;
		$parent -> name = $request -> username;
		$parent -> password = \Hash::make($request -> password);
		$parent -> gender = $request -> gender;
		$parent -> save();

		return view('parents.show') -> with(['parent' => $parent]);

	}
	public function getProfilePicture() {
		$parent = \P4\User::find(Auth::user() -> id);
		return view('parents.createProfilePicture') -> with(['parent' => $parent]);
	}

	public function postProfilePicture() {

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
			$parent_picture_folder = public_path()."\\assets\\uploads\\" . $user_id;
			$extension = array_pop($ext);
			$target = public_path()."\\assets\\uploads\\" . $user_id . "\\" . $user_id . "." . $extension;
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
		$parent = \P4\User::where('id', '=', $request -> user_id) -> get() -> first();
		if(is_null($parent)) {
            \Session::flash('message','Event for this child not found');
            return redirect('/parents/create');
        }
		if ($request -> remove_profile_picture == "on") {
			$parent -> picture_location = "/assets/images/avatar.png";
		}
		if (!is_null($request -> picture_location_to_store) && ($request -> picture_location_to_store != "")) {
			$parent -> picture_location = $request -> picture_location_to_store;
		}
		$parent -> save();
		return view('parents.show') -> with(['parent' => $parent]);
	}
	

}
