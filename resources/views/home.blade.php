@extends('layout.layout')

@section('content')
    <div class="mx-30 mb-30 mt-30 flex items-center justify-center bg-amber-10 px-20 py-16">
        <section class="w-full px-30">

            <!-- Outdoor -->
            <div class="relative mb-10 min-h-100 w-full overflow-hidden rounded-3xl bg-gray-950 shadow-2xl">

                <!-- image -->
                <img src="{{ Illuminate\Support\Facades\Storage::url('public/outdoor/outdoor.png') }}" alt="ColtBytes" class="absolute inset-0 h-full w-full object-cover">

                <!-- Overlay --> 
                <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-black/20"></div>

                <div class="relative z-10 flex min-h-100 w-full items-center px-12 ">
                    <div class="max-w-xl">
                        <span class="mb-4 inline-block rounded-full bg-amber-400 px-4 py-1 text-sm font-black uppercase tracking-widest text-black shadow-lg">
                            ColtBytes
                        </span>

                        <h2 class="text-4xl font-black leading-tight text-white md:text-5xl">
                            Find products that
                            <span class="text-amber-400">make the difference.</span>
                        </h2>

                        <p class="mt-5 max-w-lg text-lg font-medium leading-relaxed text-gray-300">
                            Here you’ll find all sorts of products designed to make your life easier and better your mood.

                        </p>

                        <div class="mt-8 flex gap-4">
                            <a href="#products" class="rounded-xl bg-amber-400 px-6 py-3 font-black text-black shadow-lg shadow-amber-400/20 transition hover:-translate-y-1 hover:bg-amber-300">
                                Ver produtos
                            </a>

                            <a href="#" class="rounded-xl border border-white/20 bg-white/10 px-6 py-3 font-bold text-white backdrop-blur-md transition hover:bg-white/20">
                                Saiba mais
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class=" grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-4 ">
                @forelse ($products as $product)
                    <a href="{{ route('product.show', $product) }}" class="group overflow-hidden rounded-xl border border-black/10 bg-gray-950 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <!-- Product Image -->
                        @foreach($product->images as $image)
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ Illuminate\Support\Facades\Storage::url($image->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            </div>
                        @endforeach
                        <!-- Product Information -->
                        <div class="p-5">
                            <h2 class="mb-10 truncate text-center text-2xl font-bold text-white">
                                {{ $product->name }}
                            </h2>
                            <p class="mt-2 h-12 overflow-hidden text-sm text-white">
                                {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                            </p>
                            <p class="mt-4 text-center text-2xl font-bold text-amber-500">
                                ${{ number_format($product->price, 2) }}
                            </p>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full mt-15 py-12 text-center text-2xl font-bold text-black">
                        Couldn't find any product.
                    </p>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-10">
                {{ $products->withQueryString()->links() }}
            </div>
        </section>
    </div>
@endsection