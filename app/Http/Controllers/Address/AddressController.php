<?php
declare(strict_types=1);
namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    use AuthorizesRequests;
    /**
     * Update the specified resource in storage.
     */
    public function index(): View
    {
        $user = Auth::user()->load(['addresses.country']);

        $countries = Country::all();

        return view('adresses.index', ['title' => 'Adresses', 'addresses' => $user->addresses,'countries' => $countries]);
    }

    /**
     * Store a new address
     */
    public function store(StoreAddressRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Auth::user()->Addresses()->create($data);

        return back()->with(['address' => 'New address has been registered.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address): RedirectResponse
    {
        $this->authorize('update', $address);

        $data = $request->validated();

        $address->update($data);

        return back()->with(['address' => 'Address has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address): RedirectResponse
    {
        $this->authorize('delete', $address);

        $address->delete();

        return back()->with(['address' => 'Address has been deleted.']);
    }
}