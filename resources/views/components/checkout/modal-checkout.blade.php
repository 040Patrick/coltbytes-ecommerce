@props(['product'])

<!-- Payment modal -->
<div x-data="{ open: false }" class="relative">
    <button type="button" @click="open = true" x-show="!open" class="w-full rounded-xl bg-amber-400 px-6 py-3 font-bold text-black transition hover:bg-amber-300">
        Buy now
    </button>

    <!-- Form -->
    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 px-4">

        <div class="bg-gray-900 rounded-xl p-6">
            <div class="bg-white p-8 rounded-xl">
                <form action="{{ route('checkout.store', $product) }}" method="post" class="flex flex-col gap-4">
                    @csrf

                    <!-- Address --> 
                    <label for="address_id" class="text-center text-gray-700 font-bold">Select an address</label>

                    @if(auth()->user()->addresses->isNotEmpty())
                        <select name="address_id" id="address_id" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-center font-bold text-gray-200 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                            @foreach(auth()->user()->addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->neighborhood }} - {{ $address->city }} - {{ $address->number }}
                            </option>
                            @endforeach
                        </select>
                    @else
                        <a href="{{ route('addresses.index') }}" class="p-2 text-lg text-center text-gray-200 font-bold hover:underline">
                            Don't have an address yet?
                        </a>
                    @endif

                    <!-- Quantity --> 
                    <div class="flex flex-col gap-2 p-2 rounded">
                        <label for="quantity" class="text-center font-bold text-gray-700">Quantity</label>
                        <input type="number" name="quantity" min="1" value="1" required class="w-full flex cursor-pointer items-center gap-3 rounded-xl bg-gray-900 p-3 text-white hover:bg-gray-800">
                    </div>

                    <!-- Payment method -->
                    <div class="flex flex-col gap-3">
                
                        <p class="text-center font-bold text-gray-700">
                            Choose your payment gateway
                        </p>

                        <label class="flex cursor-pointer items-center gap-3 rounded-xl bg-gray-900 p-3 text-gray-200 hover:bg-gray-800">
                            <input type="radio" name="payment_gateway" value="mercado_pago" required>
                            <span>Mercado Pago</span>
                        </label>

                        <label class="flex cursor-pointer items-center gap-3 rounded-xl bg-gray-900 p-3 text-gray-200 hover:bg-gray-800">
                            <input type="radio" name="payment_gateway" value="stripe" required>
                            <span>Stripe</span>
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3">
                        <button type="button" @click="open = false" class="w-full rounded-xl bg-red-500 px-4 py-3 font-bold text-black hover:bg-red-400">
                            Close
                        </button>

                        <button type="submit" class="w-full rounded-xl bg-amber-400 px-4 py-3 font-bold text-black hover:bg-amber-300">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>