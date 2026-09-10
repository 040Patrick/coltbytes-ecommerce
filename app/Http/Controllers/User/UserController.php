<?php
declare(strict_types=1);
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user): View
    {
        return view('user.edit', ['title' => 'edit']);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $data = $request->validated();

        if($data['email'] != Auth::user()->email)
        {
            $data['email_verified_at'] = null;
        }

        $user->update($data);

        return back()->with(['updated' => 'Uses has been updated.']);
    }

    /**
     * Delete the specified user in storage .
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('home');
    }
}
