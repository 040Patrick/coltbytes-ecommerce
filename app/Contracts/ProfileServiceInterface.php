<?php 
declare(strict_types=1);
namespace App\Contracts;

use App\Http\Requests\Profile\StoreProfileRequest;
use App\Models\Profile;

Interface ProfileServiceInterface
{
    public function update(StoreProfileRequest $request, Profile $profile): void;

    public function deleteAvatar(Profile $profile): void;
}