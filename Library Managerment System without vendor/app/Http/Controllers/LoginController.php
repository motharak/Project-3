<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");
        $userModel = new login();
        $loginUser = $userModel->getUserLogin($username, $password);

        if (!empty($loginUser)) {
            //set session
            
            session_start();
            $value = $loginUser->username;
            $request->session()->put('username', $value);

            return redirect()->route("index");
        } else {
            return redirect()->route('login')->with('msg','Invalid login credentials');
            // ->withErrors(['loginError' => 'Invalid login credentials']);
        }

        
    }

    public function logout()
    {
        

        Session::forget('username');
        
        // Redirect to the login page after logout
        return redirect('/login');
    }

    public function showSignupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        // Add your user registration logic here

        // If registration is successful, redirect to the dashboard or login page
        return redirect('/dashboard');
    }

}
