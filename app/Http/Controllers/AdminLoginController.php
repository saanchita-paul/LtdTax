<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showAdminLoginForm()
    {
        $user = Auth::user();
        if (!empty($user)) {
            if ($user->user_role == 1) {
                return redirect()->route('dashboard')->with('success-admin', 'You are successfully logged in!!');
            }
            if ($user->user_role == 2) {
                return redirect()->route('user.dashboard')->with('success-admin', 'You are successfully logged in!!');
            }
            if ($user->user_role == 0) {
                return redirect()->route('employer.dashboard')->with('success-admin', 'You are successfully logged in!!');
            }
        } else {
            return view('admin.login');
        }
    }
    public function adminLogin(Request $request)
    {
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            if ($user->user_role == 1) {
                return redirect()->route('dashboard')->with('success-admin', 'You are successfully logged in!!');
            } else {
                return back()->with('error', 'No user found with the username and password.');
            }
        } else {
            return back()->with('error', 'Your username or password is incorrect.');
        }
    }
}
