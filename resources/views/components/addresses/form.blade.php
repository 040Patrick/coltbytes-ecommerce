@props(['countries', 'address' => null, 'button'])


    <!-- Postal Code -->
    <div class="flex flex-col gap-3 p-2 mb-2 rounded">
        <label for="postal_code" class="text-white font-bold">Postal Code:</label>
        <input type="text" name="postal_code" value="{{ old('postal_code', $address?->postal_code) }}" placeholder="00-000-000" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
    </div>
            
    <!-- City -->
    <div class="flex flex-col gap-3 p-3 mb-2 rounded">
        <label for="city" class="text-white font-bold">City:</label>
        <input type="text" name="city" value="{{ old('city', $address?->city) }}" placeholder="City:" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
    </div>

            <!-- State -->
            <div class="flex flex-col gap-3 p-3 mb-2 rounded">
                <label for="state" class="text-white font-bold">State:</label>
                <input type="text" name="state" value="{{ old('state', $address?->state) }}" placeholder="State:" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
            </div>

            <!-- neighborhood -->
            <div class="flex flex-col gap-3 p-3 mb-2 rounded">
                <label for="neighborhood" class="text-white font-bold">Neighborhood:</label>
                <input type="text" name="neighborhood" value="{{ old('neighborhood', $address?->neighborhood) }}" placeholder="Neighborhood:" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
            </div>

            <!-- Street -->
            <div class="flex flex-col gap-3 p-3 mb-2 rounded">
                <label for="street" class="text-white font-bold">Street:</label>
                <input type="text" name="street" value="{{ old('street', $address?->street) }}" placeholder="Street:" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
            </div>

            <!-- number -->
            <div class="flex flex-col gap-3 p-3 mb-2 rounded">
                <label for="number" class="text-white font-bold">Number:</label>
                <input type="text" name="number" value="{{ old('number', $address?->number) }}" placeholder="Number:" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
            </div>

            <!-- Complement -->
            <div class="flex flex-col gap-3 p-3 mb-2 rounded">
                <label for="complement" class="text-white font-bold">Complement:</label>
                <input type="text" name="complement" value="{{ old('complement', $address?->complement) }}" placeholder="Complement:" class="focus:outline-none text-black font-bold bg-white p-3 rounded">
            </div>

            <!-- Country -->
            <div class="flex flex-col gap-3 p-3 mb-2 rounded">
                <select name="country_id" id="country_id" class="bg-white p-3 text-black font-bold cursor:pointer rounded">
                    <option value="" class="text-black font-bold">Select your country</option>

                    @foreach($countries as $country)
                        <option value="{{ $country->id}}" class="text-black font-bold">
                            @selected($address?->country_id == $country->id)
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Actions -->
            <div class="flex px-3 mb-2 rounded items-center py-5">
                <button type="submit" class="font-black bg-amber-400 hover:bg-amber-300 p-2 rounded w-full cursor-pointer">
                    {{ $button }}
                </button> 
            </div>
