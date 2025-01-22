<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        return view('login');
    } // end index

    public function login(Request $request){
        try {
            // input validation 
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

                return redirect()->intended('posts')->with($notification);
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
    } // end of login

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    } // end of logout
}
