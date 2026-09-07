<?php
declare(strict_types=1);
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
 

class ResetPasswordController extends Controller
{
    public function reset(string $token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function update(Request $request)
    {
        // Validate fields
        $request->validate([
            'token' => 'required', 
            'email' => 'required|email', 
            'password' => 'required|min:8|confirmed'
        ]);

        // Update Password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                // event(new PasswordReset($user));
            }
        );
 
        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
