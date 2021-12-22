<?php

namespace App\Http\Controllers\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PARTNERHOME;

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     */
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('partner.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        if (!$user->hasVerifiedEmail()) {
            $user->email_verified_at = now();
        }

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    /**
     * password broker for admin guard.
     */
    public function broker(){
        return Password::broker('partners');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     */
    public function guard(){
        return Auth::guard('partner');
    }
}
