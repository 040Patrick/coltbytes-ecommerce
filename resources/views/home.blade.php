@extends('layout.layout')

@section('content')
    <div class="mx-30 mb-30 mt-20 flex items-center justify-center bg-amber-10 px-10 py-16">
        <section class="w-full px-30">
            <!-- Products -->
            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
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