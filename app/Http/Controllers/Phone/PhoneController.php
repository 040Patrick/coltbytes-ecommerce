<?php
declare(strict_types=1);
namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\StorePhoneRequest;
use App\Models\Phone;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller implements HasMiddleware
{
    use AuthorizesRequests;

    /**
     * HasMiddleware
     */
    public static function middleware()
    {
        return [
            new Middleware('throttle:3', ['store', 'update']),
        ];
    }

    /**
     * Create a phone
     */
    public function store(StorePhoneRequest $request): RedirectResponse
    {
        $this->authorize('update', Auth::user());
        
        $data = $request->validated();

        Auth::user()->phone()->create(['phone' => $data['phone']]);

        return back()->with(['phone' => 'Phone has been created.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone): RedirectResponse
    {
        $this->authorize('delete', $phone);

        $phone->delete();

        return back()->with(['phone' => 'Phone has been deleted.']);
    }
}
