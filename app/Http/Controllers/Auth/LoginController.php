<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = \App\User::where('email', $request->username)->first();
        if(empty($user)){
            throw ValidationException::withMessages(['username' => 'User Disabled By Admin']);
            return redirect()->intended('login');
        }
			// return redirect()->intended('login')->with('message', array('msg'=>'This user is not allowed to access the website'));
        // $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array('email' => $input['username'], 'password' => $input['password'])))
        {
            return redirect()->route('tokens.index');
        }else{
            return redirect()->route('home')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
