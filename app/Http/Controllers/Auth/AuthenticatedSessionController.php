<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:employee')->except('logout');
    // }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        // $credentials = $request->only('email', 'password');
        // $remember = $request->boolean('remember');

        // // Try authenticating with the employee guard
        // if (Auth::guard('employee')->attempt($credentials, $remember)) {
        //     $request->session()->regenerate();
  
        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }

        // // If employee login fails, attempt with the default guard
        // if (Auth::attempt($credentials, $remember)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }

        // throw ValidationException::withMessages([
        //     'email' => trans('auth.failed'),
        // ]);

        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}