<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Clockos\ConnectToForum;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers     
    {
        getLogout as authLogout;
        postLogin as authLogin; 
    }
    use ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogout(ConnectToForum $forum)
    {

        $forum->logout();

        /*if (!empty(\URL::previous()) && !str_contains(\URL::previous(), "auth/"))
        {
            $this->redirectAfterLogout = \URL::previous(); // Send back to previous url if possible
        }*/
 
        return $this->authLogout(); // rest of the old method of the trait
    }

    public function postLogin()
    {
        /*if (!empty(\URL::previous()) && !str_contains(\URL::previous(), "auth/"))
        {
            $this->redirectAfterLogout = \URL::previous(); // Send back to previous url if possible
        }*/
 
        return $this->authLogin(Request	$request); // rest of the old method of the trait
        
        $forum = new ConnectToForum;
        
        $forum->login(Auth::user()->email,Auth::user()->forum_pw);
    }

    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $nameparts = explode("@", $data['email']);
        $username = $nameparts[0];
        return User::create([
            'username' => $username,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected $redirectPath = '/';
}
