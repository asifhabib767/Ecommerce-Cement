<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

    // public function login(Request $request)
    // {

    //     //Validate the form data

    //     $phone_no = $request->phone_no;

    //     // Check in otps table if there is an entry of this phone no
    //     $otpData = null;

    //     // Check if not expired
    //     $isExpired = false;

    //     if (!is_null($otpData) && !$isExpired) {
    //         // Login 
    //         if (Auth::guard('admin')->attempt(['phone_no' => $phone_no, 'password' => $request->otp, 'status' => 1], $request->remember)) {
    //             //If successful then redirect to the intended location
    //             session()->flash('login_success', 'Successfully Logged In');
    //             return redirect()->intended(route('admin.index'));
    //         }
    //     } else {
    //         // Expired
    //     }
    // }
}
