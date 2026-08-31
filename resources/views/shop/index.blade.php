@extends('layout.layout')

@section('content')
    <div class="mx-30 mt-20">
        <section>
            <!-- Search Bar -->
            <div class="rounded-xl border border-black/30 bg-black p-2">
                <form action="{{ route('shop.index') }}" method="GET" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full bg-white rounded-lg border border-black/20 px-4 py-2 outline-none focus:border-amber-400">

                    <button type="submit" class="rounded-lg bg-amber-400 px-6 py-2 font-bold text-black hover:bg-amber-300">
                        Search
                    </button>
                </form>
            </div>

            <!-- Products -->
            <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($products as $product)
                    <a href="{{ route('product.show', $product) }}" class="group overflow-hidden rounded-xl border border-black/10 bg-black shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <!-- Product Image -->
                        <div class="aspect-square overflow-hidden bg-gray-100">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        </div>

                        <!-- Product Information -->
                        <div class="p-5">
                            <h2 class="truncate text-2xl text-center mb-10 font-bold text-white">
                                {{ $product->name }}
                            </h2>

                            <p class="mt-2 h-12 overflow-hidden text-sm text-white">
                                {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                            </p>

                            <p class="mt-4 text-2xl text-center font-bold text-amber-500">
                                ${{ number_format($product->price, 2) }}
                            </p>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full py-12 text-center text-2xl font-bold text-black">
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
