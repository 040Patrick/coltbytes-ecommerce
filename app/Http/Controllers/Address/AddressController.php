<?php
declare(strict_types=1);
namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Models\Addresses;
use App\Models\Countries;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    use AuthorizesRequests;
    /**
     * Update the specified resource in storage.
     */
    public function index(Addresses $address)
    {
        $user = Auth::user()->load(['addresses.country']);

        $countries = Countries::all();
        return view('adresses.index', ['title' => 'Adresses', 'addresses' => $user->addresses,'countries' => $countries]);
    }

    /**
     * Store a new address
     */
    public function store(StoreAddressRequest $request)
    {
        $data = $request->validated();

        Auth::user()->Addresses()->create($data);

        return back()->with(['address' => 'New address has been registered.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Addresses $address)
    {
        $this->authorize('update', $address);

        $data = $request->validated();

        $address->update($data);

        return back()->with(['address' => 'Address has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Addresses $address): RedirectResponse
    {
        $this->authorize('delete', $address);

        $address->delete();

        return back()->with(['address' => 'Address has been deleted.']);
    }
}