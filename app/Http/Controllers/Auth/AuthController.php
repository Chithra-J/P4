<?php

namespace P4\Http\Controllers\Auth;

use P4\User;
use Validator;
use P4\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
	/*
	 |--------------------------------------------------------------------------
	 | Registration & Login Controller
	 |--------------------------------------------------------------------------
	 |
	 | This controller handles the registration of new users, as well as the
	 | authentication of existing users. By default, this controller uses
	 | a simple trait to add these behaviors. Why don't you explore it?
	 |
	 */

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	# Where should the user be redirected to if their login fails?
	protected $loginPath = '/login';

	# Where should the user be redirected to after logging out?
	protected $redirectAfterLogout = '/';

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this -> middleware($this -> guestMiddleware(), ['except' => 'logout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, ['firstname' => 'required|max:255', 'username' => 'required|max:255', 'email' => 'required|email|max:255|unique:users', 'password' => 'required|min:6|confirmed', ]);
	}

	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
		if (!array_key_exists('gender', $data)) {
			$data['gender'] = NULL;
		}
		return User::create([
							'name' => $data['username'],
							'email' => $data['email'],
							'password' => bcrypt($data['password']),
							'middle' => $data['middle'],
							'firstname' => $data['firstname'],
							'lastname' => $data['lastname'],	
							'gender' => $data['gender'],				
						]); 
		           
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::guard($this->getGuard())->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
