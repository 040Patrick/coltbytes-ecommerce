@extends('layout.layout')

@section('content')
    <!-- FRONT-END MADE BY AI -->
    <div class="mx-30 mb-15 mt-20"> 

        <!-- Return button -->
        <a href="{{ route('home') }}" class="mb-8 inline-block rounded bg-amber-400 p-3 text-sm font-bold text-black hover:bg-amber-300">
            ← Back to Shop
        </a>

        <!-- Error message --> 
        @error('address_id')
            <p class="mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
        @enderror
        
        <!-- Product -->
        <section class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-white/10 bg-gray-950 shadow-xl">
            <!-- Product Images -->
            <div x-data="{ current: 0, total: {{ $product->images->count() }}}" class="relative bg-gray-100">
                @forelse($product->images as $index => $image)
                    <div x-show="current === {{ $index }}" class="flex h-[600px] items-center justify-center p-10">
                        <img src="{{ Illuminate\Support\Facades\Storage::url($image->image) }}" alt="{{ $product->name }}" class="max-h-full w-full object-contain">
                    </div>
                @empty
                    <div class="flex h-[600px] items-center justify-center text-gray-500">
                        No image available
                    </div>
                @endforelse

                @if($product->images->count() > 1)
                    <!-- Previous -->
                    <button type="button" @click="current = current === 0 ? total - 1 : current - 1" class="absolute left-5 top-1/2 z-10 -translate-y-1/2 rounded-full bg-gray-950/60 px-5 py-3 text-3xl font-bold text-white transition hover:bg-gray-950/80">
                        ‹
                    </button>

                    <!-- Next -->
                    <button type="button" @click="current = current === total - 1 ? 0 : current + 1" class="absolute right-5 top-1/2 z-10 -translate-y-1/2 rounded-full bg-gray-950/60 px-5 py-3 text-3xl font-bold text-white transition hover:bg-gray-950/80">
                        ›
                    </button>

                    <!-- Counter -->
                    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 rounded-full bg-gray-950/70 px-4 py-2 text-sm font-bold text-white">
                        <span x-text="current + 1"></span>
                        /
                        <span x-text="total"></span>
                    </div>
                @endif
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

                <!-- Categories -->
                <div class="mt-10 border-t border-white/10 pt-8">
                    <h2 class="mb-4 text-xl font-bold text-white">
                        Categories:
                    </h2>
                    <div class="grid justify-items-center grid-cols-5 gap-5">
                        @foreach($product->categories as $category)
                            <a href="{{ route('home', ['category' => $category->slug]) }}" class="bg-amber-400 rounded-full p-1 px-3 font-bold text-white-400 hover:amber-300">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-10 border-t border-white/10 pt-8">
                    <h2 class="mb-4 text-xl font-bold text-white">
                        Description:
                    </h2>

                    <p class="leading-7 text-gray-400">
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Buy -->
                <a href="{{ route('checkout.index', $product) }}" class="block w-full my-10 rounded-xl bg-amber-400 px-6 py-3 text-center font-bold text-black transition hover:bg-amber-300">
                    Buy
                </a>

                <!-- Information -->
                <div class="mt-10 space-y-3 border-t border-white/10 pt-6 text-sm">
                    <div class="flex justify-between text-gray-400">
                        <span>Availability</span>

                        @php
                            $inStock = $product->stock > 0;
                        @endphp

                        <span class="font-bold {{ $inStock ? 'text-green-600' : 'text-red-600' }}">
                            {{ $inStock ? 'In Stock' : 'Sold out' }}
                        </span>
                    </div>

                    <div class="flex justify-between text-gray-400">
                        <span>Quantity</span>
                        <span class="text-white">{{ $product->stock }}</span>
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