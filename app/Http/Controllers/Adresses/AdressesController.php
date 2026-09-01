<?php

namespace App\Http\Controllers\Adresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adresses\StoreAdressesRequest;
use App\Http\Requests\Adresses\UpdateAddressesRequest;
use App\Models\Addresses;
use App\Models\Countries;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class AdressesController extends Controller
{
    use AuthorizesRequests;
    /**
     * Update the specified resource in storage.
     */
    public function index(Addresses $address)
    {
        $user = Auth::user()->load(['addresses.country']);

        $countries = Countries::all();
        return view('adresses.index', [
            'title' => 'Adresses', 
            'addresses' => $user->addresses,
            'countries' => $countries
        ]);
    }

    /**
     * Store a new address
     */
    public function store(StoreAdressesRequest $request)
    {
        $data = $request->validated();

        Auth::user()->Addresses()->create($data);

        return back()->with(['address' => 'New address has been registered.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressesRequest $request, Addresses $address)
    {
        $this->authorize('update', $address);

        $data = $request->validated();

        $address->update($data);

        return back()->with(['address' => 'Address has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Addresses $address)
    {
        $this->authorize('delete', $address);

        $address->delete();

        return back()->with(['address' => 'Address has been deleted.']);
    }
}