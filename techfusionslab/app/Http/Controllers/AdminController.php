<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;
use Illuminate\Auth\Events\Verified;

class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    //End Method

    public function AdminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $verificationCode = random_int(100000, 999999);
            session([
                'verification_code' => $verificationCode,
                'user_id' => $user->id
            ]);

            // Send verification email
            Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

            Auth::logout();

            // Redirect to verification page or return response
            return redirect()->route('custom.verification.form')->with('status', 'Verification code sent to your email');
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    //End Method

    public function ShowVerification(){
        return view('auth.verify');
    }
      // End Method

    public function VerificationVerify(Request $request){

    $request->validate(['code' => 'required|numeric']);

    if ($request->code == session('verification_code')) {
        Auth::loginUsingId(session('user_id'));

        session()->forget(['verification_code','user_id']);
        return redirect()->intended('/dashboard');

    }

    return back()->withErrors(['code' => 'Invalid Verification Code']);
    }
    // End Method

    public function AdminProfile() {
        return view('admin.admin_profile');
    }




}
