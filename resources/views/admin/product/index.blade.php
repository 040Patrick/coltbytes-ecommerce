@extends('layout.layout')

@section('content')
    <!-- Admin Navbar -->
    <x-admin.navbar />

    <div class="mt-30 mx-30 bg-gray-950 rounded-2xl mb-30">
        <!-- Return button -->
        <div class="flex justify-begin">
            <a href="{{ route('admin.index') }}" class="bg-amber-400 p-3 px-10 mt-10 mx-10 hover:bg-amber-300 text-black text-center font-bold rounded-xl"> Back </a>
        </div>

        <section class="py-5 ">
            <div class="px-10 py-10">

                <!-- Header -->
                <h1 class="text-4xl font-bold text-white">
                    Admin Painel
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-2 text-gray-500">
                    Manage or create products.
                </p>
            
                <!-- Create product -->
                <div x-data="{ add: false }" class="flex justify-center">
                    <button type="button" @click="add = true" class="rounded-xl bg-amber-400 p-3 px-10 text-center font-bold text-black hover:bg-amber-300">
                        Create new Product
                    </button>

                    <!-- Form -->
                    <div x-show="add" x-cloak class="fixed inset-0 z-50 flex items-center justify-center  bg-gray-950/70" @click.self="add = false">
                        <div class="relative w-full max-w-2xl bg-gray-950 p-10 rounded-2xl">
                            <form action="{{ route('admin.products.store') }}" method="post" class="p-3 bg-gray-900 rounded-xl border border-gray-700">
                                @csrf
                                <x-admin.product.form title="Create" button="Create"/>

                            </form>

                            <!-- Close create form -->
                            <button @click="add = false" type="button" class="absolute right-4 top-4 rounded-xl bg-gray-950 p-2 px-4 font-bold text-gray-200 hover:bg-gray-900 border border-gray-700">
                                Close
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Session messages -->
            @session('image')
                <div class="rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center mx-5 font-bold text-green-300 mb-5">{{ session('image') }}</div>
            @endsession

            @session('product')
                <div class="rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center mx-5 font-bold text-green-300 mb-5">{{ session('product') }}</div>
            @endsession

            @session('category')
                <div class="rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center mx-5 font-bold text-green-300 mb-5">{{ session('category') }}</div>
            @endsession

            <!-- Products -->
            @forelse($products as $product)
                <div class="mx-20 m-4 flex flex-row items-center gap-4 rounded-xl bg-white px-10 py-5 border border-3 border-gray-700 ">
                    <p class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-gray-950 text-xl font-bold text-white">
                        {{ $product->id }}
                    </p>

                    <div class="flex-1">
                        <p class="font-bold text-black">
                            {{ $product->name }}
                        </p>

                        <p class="text-gray-500">
                            Price: ${{ $product->price }}
                        </p>
                    </div>

                    <!-- Update -->
                    <div x-data="{ updateProduct: false }" class="flex items-center gap-3">
                        <x-admin.product.modal-update :product="$product" :categories="$categories"/>
                    </div>

                    <!-- Delete product -->
                    <div x-data="{ confirmDelete: false }" class="flex items-center gap-3">
                        <x-admin.product.modal-delete :product="$product"/>    
                    </div>
                </div>
            @empty
                <p class="text-white font-bold text-center p-3 mb-5 text-2xl">
                    Register your first product.
                </p>
            @endforelse
        </section>
    </div>

@endsection