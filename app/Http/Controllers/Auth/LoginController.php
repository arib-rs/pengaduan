<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|exists:users,email',
            'password' => 'required|string',
        ], [
            $this->username() . '.exists' => "Email belum terdaftar"
        ]);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'password' => [trans('auth.password')],
        ]);
    }
    protected function authenticated(Request $request, $user)
    {
        $request->session()->put('user', $user->toArray());
    }
    public function showLoginForm()
    {
        return view('layout.v_login');
    }
}
