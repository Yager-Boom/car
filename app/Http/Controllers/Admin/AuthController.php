<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session()->put('admin_logged_in', true);
            session()->put('admin_user', $user);
            
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => '帳號或密碼錯誤',
        ])->withInput();
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        session()->forget('admin_user');
        
        return redirect()->route('admin.login');
    }
}
