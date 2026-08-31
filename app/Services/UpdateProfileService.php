<?php
declare(strict_types=1);
namespace App\Services;

use App\Contracts\ProfileServiceInterface;
use App\Http\Requests\Profile\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Override;

class UpdateProfileService implements ProfileServiceInterface
{
    /**
     * Update profile service
     */
    public function update(StoreProfileRequest $request, Profile $profile): void
    {
        $data = $request->validated();

        if($request->hasFile('avatar'))
        {
            $old = $profile->avatar;

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');

            $profile->update($data);

            if($old && Storage::disk('public')->exists($old))
            {
                Storage::disk('public')->delete($old);
            }

            return;
        }
        else
        {
            unset($data['avatar']);
        }
        
        $profile->update($data);
    }

    /**
     * Delete avatar service
     */
    public function deleteAvatar(Profile $profile): void
    {
        if($profile->avatara && Storage::disk('public')->exists($profile->avatar))
        {
            Storage::disk('public')->delete($profile->avatar);
        }

        $profile->update([
            'avatar' => null
        ]);
    }
}