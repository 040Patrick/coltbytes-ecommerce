@extends('layout.layout')

@section('content')
    <!-- Checkout -->
    <div class="mx-30 mb-30 mt-20 bg-amber-10 flex items-center justify-center px-6 py-16">
        <!-- Section -->
        <section class="w-full max-w-4xl bg-gray-950 text-white rounded-2xl px-8 py-12 md:px-14 md:py-10 shadow-xl">

            <!-- Page name -->
            <div class="mb-10">
                <h1 class="text-5xl font-bold">
                    Checkout
                </h1>
                <div class="mt-4 h-1 w-20 bg-amber-400 rounded-full"></div>
            </div>
        
            <h1 class="text-black p-2 text-center text-lg font-bold">
                Payment
            </h1>

            <!-- Form -->
            <form action="{{ route('checkout.store', $product) }}" method="post">
                @csrf
                <div class="space-y-3 mb-5">

                    <!-- Error Message -->
                    @error('payment_method')
                        <p class="w-full text-center font-bold text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                    <label for="stripe" class="flex cursor-pointer items-center justify-between rounded-xl bg-gray-900 p-4 font-bold text-white transition hover:bg-gray-800">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">💳</span>
                            <div>
                                <span class="block text-lg">Stripe</span>
                                <span class="block text-sm font-normal text-gray-400">Debt or Credit Card</span>
                            </div>
                        </div>
                        <input id="stripe" type="radio" value="stripe" name="payment_method" class="h-5 w-5">
                    </label>

                    <label for="mercadopago" class="flex cursor-pointer items-center justify-between rounded-xl bg-gray-900 p-4 font-bold text-white transition hover:bg-gray-800">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">💰</span>
                            <div>
                                <span class="block text-lg">Mercado Pago</span>
                                <span class="block text-sm font-normal text-gray-400">Card, Boleto and other options</span>
                            </div>
                        </div>
                        <input id="mercadopago" type="radio" value="mercadopago" name="payment_method" class="h-5 w-5">
                    </label>
                </div>   
                    
                <!-- Address -->
                <div class="w-full rounded-2xl bg-gray-900 p-6 shadow-lg">
                    @if(auth()->user()->addresses->isEmpty())
                        {{-- Component here --}}
                    @else
                        <!-- Error Message -->
                        @error('address_id')
                            <p class="w-full text-center font-bold text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="mb-5 flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-white">Delivery address</h2>
                                <p class="mt-1 text-sm text-gray-400">Choose where your order should be delivered.</p>
                            </div>
                            <span class="rounded-full bg-amber-400 px-3 py-1 text-sm font-bold text-black">Required</span>
                        </div>

                        <label for="address_id" class="mb-2 block text-sm font-bold text-gray-300">Your address</label>

                        <select id="address_id" name="address_id" class="w-full cursor-pointer rounded-xl border border-gray-700 bg-gray-800 p-4 font-bold text-white outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20">
                            @foreach(auth()->user()->addresses as $address)
                                <option value="{{ $address->id }}">{{ $address->city }} - {{ $address->number }} - {{ $address->state }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <button type="submit" class="bg-amber-400 text-black text-center font-bold w-full rounded-xl p-3 mt-5 hover:bg-amber-300">
                    Send
                </button>
            </form>

        </section>
    </div>
@endsection