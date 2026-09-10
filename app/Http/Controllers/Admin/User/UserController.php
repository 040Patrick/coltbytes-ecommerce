<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
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
    public function update(UpdateRoleRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->roles()->sync($data['roles'] ?? [1]);

        return back()->with(['roles' => "{$user->fullName} Role has been changed."]);
    }
}
