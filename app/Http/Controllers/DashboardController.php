<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class DashboardController extends Controller
{
    //

    function index(){
        
        return view('dashboard.index');
    }

    function download(){
        
    }

    public function profile(Request $request){
        $user = Auth::user()->toArray();
        $data = User::where('id',$user['id'])->first();
        if($request->all()){
            $this->validate($request, [                
                'password' => 'required|alpha_dash|min:8|confirmed',              
            ],
            [
                'password.required' => 'Password Can Not Be Empty',
                'password.confirmed'            => 'Your password confirmation does not match',
                'password.min'            => 'Pasword Minimum 8 Character'
            ]);
            if($request->get('password')) {
                $data->password = bcrypt($request->get('password'));
                $data->save();
                flash()->success('User has been updated.');
                return redirect()->route('dashboard.profile_index');
            }
        }
        //dd($data);
        return view('dashboard.profile',compact('data','user'));

    }
}
