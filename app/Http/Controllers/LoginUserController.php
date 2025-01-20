<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        return view('login');
    } // end index

    public function login(){
        try {
            $credentials = $request->validate([
                'email' => ['required','email'],
                'password' => ['required']
            ]);

            $email = $request->email;
            $password = $request->password;

            if(Auth::attempt(['email' => $email, 'password' => $password])){
                $request->session()->regenerate();

                $notification = array(
                    'message' => 'Login Successful!',
                    'alert-type' => 'Success'
                );

                return redirect()->intended('dashboard')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Incorrect Credentials ',
                    'alert-type' => 'error'
                );
                return redirect()->route('login')->with($notification);
            }


        } catch (\Exception $e) {
                $message = $e->getMessage();
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }
}
