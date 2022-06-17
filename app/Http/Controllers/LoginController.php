<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $userLoggedIn = User::where('user_email', $request->email)->first();
        if (isset($userLoggedIn) && password_verify($request->password, $userLoggedIn['user_password'])) {
            session()->put('loggedInUser', $userLoggedIn);
            return redirect('students');
        } else {
            return redirect()->back()->with('fail', 'Entered Credentials Are Wrong');
        }
    }
}
