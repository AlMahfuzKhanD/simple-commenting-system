<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function index(){
        return view('sign-up');
    } // end of create

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => ['required','string'],
                'email' => ['required','string','lowercase','unique:'.User::class],
                'password' => ['required','confirmed', Rules\Password::defaults()]
            ]);

            $user = User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' =>  Carbon::now()

            ]);

            $notification = array(
                'message' => 'User created successfully!',
                'alert-type' => 'success'
            );
            
            DB::commit();
            return redirect()->route('login')->with($notification);

        } catch (\Exception $e) {
            DB::rollback();
                $message = $e->getMessage();
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }
}
