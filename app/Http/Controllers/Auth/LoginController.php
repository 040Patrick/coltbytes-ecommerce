<?php
declare(strict_types=1);
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\StoreLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller implements HasMiddleware
{
    /**
    * HasMiddleware
    */
    public static function middleware()
    {
        return [
            new Middleware('throttle:3', ['login']),
        ];
    }

    /**
     * @return view login view
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * @return redirectResponse
     */
    public function login(StoreLoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if(!Auth::attempt($credentials, $request->remember))
        {
            return back()->withFragment('login')->withErrors(['error' => 'Invalid Credentials.']);
        }

        return redirect()->route('home')->with(['logged' => 'You have logged in.']);
    }

    /**
     * Logout logic
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out.');
    }
}
