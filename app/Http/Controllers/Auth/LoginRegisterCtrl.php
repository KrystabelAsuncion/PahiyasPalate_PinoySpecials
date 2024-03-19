<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Auth\Recipe;
use Illuminate\Support\Facades\DB;
use Maize\Markable\Models\Like;



class LoginRegisterCtrl extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }
    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */

    public function forgotPasswordForm()
    {
        return view('Auth.forgotPassword');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['username' => 'required']);

        $username = $request->username;
        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(['username' => $username], ['token' => $token, 'created_at' => now()]);

        // Store the username and token in the session
        $request->session()->put('reset_username', $username);
        $request->session()->put('reset_token', $token);

        // Redirect to the password reset form with the token
        return redirect()->route('password.reset', ['token' => $token]);
    }

    public function showResetPasswordForm($token)
    {
        return view('Auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:250',
            'password' => 'required|confirmed|min:8',
        ]);

        // Retrieve the username from the form
        $username = $request->username;

        // Check if the user with the provided username exists
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid username.');
        }

        // Update user's password
        $user->update(['password' => bcrypt($request->password)]);

        // Optionally, clear any session or temporary data you might have related to password reset

        return redirect()->route('login')->with('message', 'Password reset successfully.');
    }


    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('Auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    public function dashboard()
    {
        if(Auth::check())
        {

            $recipes = Recipe::get();

            return view('Auth.home',compact('recipes'));
            //,compact('recipes')
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');

    }


    /*guestdashboard*/

    public function guestDashboard()
    {
        // Generate a random username
        $randomUsername = 'Guest_' . Str::random(8);

        return view('auth.guest', ['username' => $randomUsername]);
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }


}
