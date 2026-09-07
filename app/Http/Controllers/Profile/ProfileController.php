<?php
declare(strict_types=1);
namespace App\Http\Controllers\Profile;

use App\Contracts\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller implements HasMiddleware
{
    use AuthorizesRequests;

    /**
     * Provider bind resolved
     */
    public function __construct(public ProfileServiceInterface $profile){ }

    /**
     * Has Middleware
     */
    public static function middleware(): array
    {
        return [
            new Middleware('throttle:profile', ['update']),
        ];
    }

    public function index(): View
    {
        $profile = Auth::user()->profile;

        return view('profile.index', ['title' => 'Profile', 'profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProfileRequest $request, Profile $profile):  RedirectResponse
    {
        $this->authorize('update', $profile);

        $this->profile->update($request, $profile);

        return redirect()->route('profile.index')->with(['updated' => 'Profile has been updated.']);
    }

    /**
     * DELETE PROFILE AVATAR
     */
    public function destroy(Profile $profile): RedirectResponse
    {
        $this->authorize('update', $profile);

        $this->profile->deleteAvatar($profile);

        return redirect()->route('profile.index')->with(['updated' => 'Profile deleted.']);
    }
}