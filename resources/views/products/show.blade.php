@extends('layout.layout')

@section('content')
    <div class="mx-30 mt-20">
        <!-- Back to Shop -->
        <a href="{{ route('shop.index') }}" class="mb-8 inline-block bg-amber-400 p-3 rounded text-sm font-bold text-black hover:bg-amber-300">
            ← Back to Shop
        </a>

        <!-- Product -->
        <section class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-white/10 bg-black shadow-xl">

            <!-- Product Image -->
            <div class="flex items-center justify-center bg-gray-100 p-10">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="max-h-[600px] w-full object-contain">
            </div>

            <!-- Product Information -->
            <div class="p-8 lg:p-12">

                <!-- Name -->
                <h1 class="text-center text-4xl font-bold text-white lg:text-5xl">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <p class="mt-6 text-center text-4xl font-bold text-amber-400">
                    ${{ number_format($product->price, 2) }}
                </p>

                <!-- Description -->
                <div class="mt-10 border-t border-white/10 pt-8">
                    <h2 class="mb-4 text-xl font-bold text-white">
                        Description
                    </h2>

                    <p class="leading-7 text-gray-400">
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Purchase -->
                <form action="#" method="POST" class="mt-10 flex gap-3"> 
                    @csrf 
                    <input type="hidden" name="product_id" value="{{ $product->id }}"> 
                    <input type="number" name="quantity" min="1" value="1" class="w-24 rounded-xl border border-white/10 bg-white px-4 py-3 text-center font-bold text-black outline-none focus:border-amber-400" >

                    <button type="submit" class="flex-1 rounded-xl bg-amber-400 px-6 py-3 font-bold text-black transition hover:bg-amber-300" >
                        Buy Now
                    </button> 
                </form>

                <!-- Additional Information -->
                <div class="mt-10 space-y-3 border-t border-white/10 pt-6 text-sm">
                    <div class="flex justify-between text-gray-400">
                        <span>Availability</span>
                        <span class="font-bold text-green-400">In Stock</span>
                    </div>

                    <div class="flex justify-between text-gray-400">
                        <span>Shipping</span>
                        <span class="text-white">Available</span>
                    </div>

                    <div class="flex justify-between text-gray-400">
                        <span>Secure Payment</span>
                        <span class="text-white">Protected</span>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
