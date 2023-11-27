<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auths;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginPage()
    {
        return view('Login.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loginStore(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ], [
            'username.exist' => 'Username not found!',
            'username.required' => 'Username must be input!',
            'password.required' => 'Password must be input!',
        ]);

        $user = $request->only('username', 'password');
        if (Auths::attempt($user)) {
            $user = Auths::user(); // Mendapatkan informasi user yang sudah login

            // Periksa peran user
            if ($user->role == 'teacher') {
                return redirect('/create-attendances')
                    ->with('successLogin', 'You have Successfully logged in as a teacher');
            } elseif ($user->role == 'admin') {
                return redirect('/dashboard-admin')
                    ->with('successLogin', 'You have Successfully logged in as an admin');
            }
        } else {
            dd('Error');

            return redirect()->back()->withSuccess('Please fill your Username and Password correctly!');
        }
    }

    public function logout()
    {
        UserAuth::logout();

        return redirect('/');
    }
}
