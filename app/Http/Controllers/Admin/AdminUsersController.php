<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Show admin users view
     */
    public function index(): View
    {
        $users = User::with(['roles', 'orders'])->get();

        return view('admin.users.index', ['title' => 'Admin users', 'users' => $users, 'roles' => Role::all()]);
    }

    /**
     * Update user Roles
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $roles = $request->validate([
            'roles' => ['array'],
            'roles.*' => ['integer', 'exists:roles,id']
        ]);

        $user->roles()->sync($roles['roles'] ?? [1]);

        return back()->with(['roles' => "{$user->fullName} Role has been changed."]);
    }
}
