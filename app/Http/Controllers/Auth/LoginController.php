<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    // use AuthenticatesUsers;
    // protected $redirectTo = '/home';

    // protected function redirectTo()
    // {
    //     // $user = Auth::user();
    //     // // Check if the authenticated user is an admin
    //     // if ($user->role == 'admin') {
    //     //     // User is an admin
    //     //     return redirect('/dashboard');
    //     // } else {
    //     //     // User is not an admin
    //     //     return redirect('/home');
    //     // }
    // }
    // // protected $redirectTo = '/dashboard';

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('auth')->only('logout');
    // }
    // public function redirectToProvider($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }

    // public function handleProviderCallback($provider)
    // {
    //     try {
    //         $user = Socialite::driver($provider)->user();
    //     } catch (\Exception $e) {
    //         return redirect('/auth/login')->with('error', 'Failed to authenticate with ' . ucfirst($provider));
    //     }

    //     // Check if the user already exists in your database
    //     $existingUser = User::where('email', $user->email)->first();

    //     if ($existingUser) {
    //         // Log the user in
    //         Auth::login($existingUser);
    //     } else {
    //         // Create a new user record if the user doesn't exist
    //         $newUser = new User();
    //         $newUser->name = $user->name;
    //         $newUser->email = $user->email;
    //         $newUser->password = bcrypt('password'); // Optional: Set a default password
    //         $newUser->save();

    //         // Log the new user in
    //         Auth::login($newUser);
    //     }

    //     return redirect()->intended($this->redirectPath());
    // }

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated($request, $user)
    {
        // Check if the authenticated user is an admin
        if ($user->role == 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('home');
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/auth/login')->with('error', 'Failed to authenticate with ' . ucfirst($provider));
        }

        // Check if the user already exists in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log the user in
            Auth::login($existingUser);
        } else {
            // Create a new user record if the user doesn't exist
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = bcrypt('password'); // Optional: Set a default password
            $newUser->save();

            // Log the new user in
            Auth::login($newUser);
        }

        // Redirect based on user's role
        if (Auth::user()->role == 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('home');
        }
    }
}
