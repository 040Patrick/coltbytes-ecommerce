<?php

namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\UpdatePhoneRequest;
use App\Models\Phone;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PhoneController extends Controller
{
    use AuthorizesRequests;
    /**
     * Phone index
     */
    public function index(): View
    {
        return view('phone.index', ['title' => 'Phone']);
    }

    /**
     * Create a phone
     */
    public function store(UpdatePhoneRequest $request)
    {
        $data = $request->validated();

        Auth::user()->phone()->create([
            'phone' => $data['phone']
        ]);

        return back()->with(['updated' => 'Phone has been created.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        $this->authorize('update', $phone);

        $data = $request->validated();

        $phone->update([
            'phone' => $data['phone']
        ]);

        return back()->with(['updated' => 'Phone has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone): RedirectResponse
    {
        $this->authorize('update', $phone);

        $phone->delete();

        return back()->with(['updated' => 'Phone has been deleted.']);
    }
}
