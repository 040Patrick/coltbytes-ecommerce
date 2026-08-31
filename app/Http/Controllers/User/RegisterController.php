<?php

namespace App\Http\Controllers\User;

use App\Events\Email\SendRegisteredEmail;
use App\Events\Registered\RegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Return register user view
     */
    public function index(): View
    {
        return view('user.register', ['title' => 'Register']);
    }
    
    /**
     * Register user
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $user->profile()->create();
        
        Auth::login($user);

        // Send verify-email as soon as user is created
        event(new Registered($user));

        return redirect()->route('home');
    }
}
