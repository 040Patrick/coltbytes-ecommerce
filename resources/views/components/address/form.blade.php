@props(['countries', 'address' => null, 'button'])

<!-- Postal Code -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="postal_code" class="text-white font-bold">Postal Code:</label>
    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $address?->postal_code) }}" placeholder="00-000-000" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('postal_code')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- City -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="city" class="text-white font-bold">City:</label>
    <input type="text" name="city" id="city" value="{{ old('city', $address?->city) }}" placeholder="City" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('city')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- State -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="state" class="text-white font-bold">State:</label>
    <input type="text" name="state" id="state" value="{{ old('state', $address?->state) }}" placeholder="State" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('state')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- Neighborhood -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="neighborhood" class="text-white font-bold">Neighborhood:</label>
    <input type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', $address?->neighborhood) }}" placeholder="Neighborhood" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('neighborhood')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- Street -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="street" class="text-white font-bold">Street:</label>
    <input type="text" name="street" id="street" value="{{ old('street', $address?->street) }}" placeholder="Street" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('street')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- Number -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="number" class="text-white font-bold">Number:</label>
    <input type="text" name="number" id="number" value="{{ old('number', $address?->number) }}" placeholder="Number" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('number')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- Complement -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="complement" class="text-white font-bold">Complement:</label>
    <input type="text" name="complement" id="complement" value="{{ old('complement', $address?->complement) }}" placeholder="Complement" class="focus:outline-none border border-gray-700 text-gray-300 font-bold bg-gray-900 p-3 rounded-xl">
    @error('complement')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- Country -->
<div class="flex flex-col gap-2 p-2 mb-1 rounded">
    <label for="country_id" class="text-white font-bold">Country:</label>
    <select name="country_id" id="country_id" class="bg-gray-900 p-3 text-gray-300 font-bold cursor-pointer rounded-xl border border-gray-700">
        <option value="">Select your country</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" @selected(old('country_id', $address?->country_id) == $country->id)>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
    @error('country_id')
        <span class="font-bold text-center text-red-600 p-1">{{ $message }}</span>
    @enderror
</div>

<!-- Actions -->
<div class="flex flex-col gap-2 px-2 mb-2 items-center pt-4">
    <button type="submit" class="font-black text-black bg-amber-400 hover:bg-amber-300 p-3 rounded-xl w-full cursor-pointer">
        {{ $button }}
    </button>
    
    <!-- Close -->
    <button type="button" @click="add = false" class="font-black text-black bg-red-500 hover:bg-red-400 p-3 rounded-xl w-full cursor-pointer">
        Close
    </button>
</div>
