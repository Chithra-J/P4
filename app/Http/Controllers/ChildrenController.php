<?php

namespace P4\Http\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';
use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use P4\Http\Requests;
use Auth;

class ChildrenController extends Controller {
	public function getChildrenProfile() {		
		$user_id = \P4\User::find(Auth::user() -> id) -> id;
		$children = \P4\User::with('children')->find($user_id)->children;		
		return view('children.show') -> with('children', $children)->with('user_id',$user_id);
	}
	
	public function getCreateChild() {
		$user_id = \P4\User::find(Auth::user() -> id) -> id;
		return view('children.create') -> with('user_id', $user_id);
	}
	
	public function postCreateChild(Request $request) {
		$this -> validate($request, ['firstname' => 'required|string', 'date_of_birth' => 'required|string', ]);
		$parent = \P4\User::find($request->user_id);
		$data = $request -> all();
		// Create new child
		$child = new \P4\Child();
		$child -> firstname = $data['firstname'];
		$child -> lastname = $data['lastname'];
		$child -> middle = $data['middle'];
		$child -> date_of_birth = date('Y-m-d', strtotime($data['date_of_birth']));
		$child -> gender = $data['gender'];
		$child -> user_id = $data['user_id'];
		$child -> save();
		$children = \P4\User::with('children')->find($data['user_id'])->children;
		return view('children.show') -> with('children', $children)->with('user_id',$data['user_id']);
	}
	
	public function getEditChild($id) {
		$child = \P4\Child::find($id);
		return view('children.edit')
            ->with('child',$child);
	}
	
	public function postEditChild(Request $request) {
		$this -> validate($request, ['firstname' => 'required|string', 'date_of_birth' => 'required|string', ]);
		$data = $request -> all();
		$child = \P4\Child::find($request->id);
		$child -> firstname = $data['firstname'];
		$child -> lastname = $data['lastname'];
		$child -> middle = $data['middle'];
		$child -> date_of_birth = date('Y-m-d', strtotime($data['date_of_birth']));
		$child -> gender = $data['gender'];
		$child -> save();
		return redirect('/children/create');
	}
	
	public function getRemoveChild($id) {
		$child = \P4\Child::find($id);
        return view('children.remove')->with('child', $child);
	}
	
	public function postRemoveChild($id) {
		$child = \P4\Child::find($id);
		if(!is_null($child)) {
			$child->delete();	
		}	
		$user_id = \P4\User::find(Auth::user() -> id) -> id;
		$children = \P4\User::with('children')->find($user_id)->children;		
		return view('children.show') -> with('children', $children)->with('user_id',$user_id);
	}
	
}
