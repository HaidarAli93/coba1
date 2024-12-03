<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
 
class LoginController extends Controller
{
	public function goToLogin() {
		return view('login');
	}

	// This method handles the login form submission (POST request).
    public function login(Request $request)
    {
        // Validate the incoming request.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in.
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Redirect to the intended page (e.g., landing page).
            return redirect()->intended('/landing-page');
        }

        // If login fails, redirect back with an error message.
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
	}

	public function logout(Request $request)
	{
		Auth::logout();

		//$request->session()->invalidate();

		//$request->session()->regenerateToken();

		return redirect('/login');
	}

	public function goToLandingPage() {
		$user = Auth::user();
		return view('landing-page', ['user' => $user]);
	}
}
