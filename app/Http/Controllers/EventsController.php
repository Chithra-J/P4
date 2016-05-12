<?php

namespace P4\Http\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';
//require __DIR__ . '/../../../vendor/danielboendergaard/phantom-pdf/src/PdfGenerator.php';
use P4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use P4\Http\Requests;
use Auth;
use Knp\Snappy\Pdf;

class EventsController extends Controller {
	public function getEventsProfile() {		
		$user_id = \Auth::id();
		$children = \P4\User::with('children')->find($user_id)->children;
		return view('events.show') 
				-> with('children', $children)
				-> with('user_id',$user_id);
	}
	
	public function getViewEvent($id) {
		$child = \P4\Child::find($id);
		if(is_null($child)) {
            return redirect('/events/create');
        }
		$events = \P4\Child::with('events')->find($child->id) -> events;
		return view('events.view')
			-> with('events', $events)
            -> with('child', $child);
	}
	public function getEventsReport($id) {
		$path=public_path().'\assets\reports\github.pdf';
		$parent = \P4\User::find(Auth::user() -> id);
        $view =  view('parents.create') -> with(['parent' => $parent]);
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			$bin_path=base_path().'\vendor\wemersonjanuario\wkhtmltopdf-windows\bin\64bit\wkhtmltopdf.exe';
		} else if (strtoupper(substr(PHP_OS, 0, 3)) === 'LINUX') {
			$bin_path=base_path().'\vendor\wemersonjanuario\wkhtmltopdf-windows\bin\64bit\wkhtmltopdf.exe';
		}
		dump($bin_path);
		$myProjectDirectory = '/path/to/my/project';
		$snappy = new Pdf($bin_path);
        $snappy->generateFromHtml('<p>Some content</p>', 'test.pdf');
	}
	public function getCreateEvent($id) {
		$child = \P4\Child::find($id);
		return view('events.create') 
			-> with('child', $child);
	}
	
	public function postCreateEvent(Request $request) {
		$this -> validate($request, ['event_name' => 'required|string', 'event_date' => 'required|string', ]);
		$data = $request->only('event_name','event_date','level','rounds','standing','grade','school_name','school_year','winner','child_id');
		$data['user_id'] = \Auth::id();		
		$event = \P4\Event::create($data);
		$event -> save();
		return redirect('/events/viewEvent/'.$request->child_id);
	}
	
	public function getEditEvent($id) {
		$event = \P4\Event::find($id);
		$child= \P4\Child::where('id','=',$event->child_id)->get(['id', 'firstname'])->first();	
		return view('events.edit', compact('child', 'event'));
	}
	
	public function postEditEvent(Request $request) {
		$this -> validate($request, ['event_name' => 'required|string', 'event_date' => 'required|string', ]);	
		$data = $request->only('event_name','event_date','level','rounds','standing','grade','school_name','school_year','winner','child_id');	
		$event = \P4\Event::where('id','=',$request->event_id)->update($data);			
		return redirect('/events/viewEvent/'.$request->child_id);
	}
	
	public function getRemoveEvent($id) {
		$event = \P4\Event::find($id);
		$child_firstname= \P4\Child::find($event->child_id)->firstname;
		return view('events.remove', compact('child_firstname', 'event'));
	}
	
	public function postRemoveEvent($id) {
		$event = \P4\Event::find($id);
		$child_id = $event->child_id;
		if(!is_null($event)) {
			$event->delete();	
		}	
		return redirect('/events/viewEvent/'.$child_id);;
	}
	
}
