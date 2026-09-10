@extends('layout.layout')

@section('content')
    <div class="mt-30 mx-30 bg-black rounded-2xl">
        <!-- Return button -->
        <div class="flex justify-begin">
            <a href="{{ route('admin.index') }}" class="bg-amber-400 p-3 px-10 mt-10 mx-10 hover:bg-amber-300 text-black text-center font-bold rounded"> Back </a>
        </div>

        <section class="py-5">
            <!-- Header -->
            <div class="px-10 py-10">

                <h1 class="text-4xl font-bold text-white">
                    Admin Panel
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-2 text-gray-500  mb-2">
                    Manage your store and application.
                </p>
        
                <!-- Create product -->
                <div x-data="{add : false }">

                    <button type="button" @click="add = true" x-show="!add" class="bg-amber-400 mt-5 p-3 px-10 text-black hover:bg-amber-300 rounded text-center font-bold"> 
                        Create new Product
                    </button>

                    <!-- Form -->
                    <div x-show="add" class="mt-5 border border-gray-800 bg-gray-950 p-8 shadow-xl">

                        <form action="{{ route('admin.products.store') }}" method="post" class="rounded">
                            @csrf 
                            <x-admin.product.form title="Create" button="Create"/>      
                        </form>
                        
                        <!-- Close create form -->
                        <button @click="add = false" type="button" class="bg-red-500 hover:bg-red-400 w-full p-3 text-black rounded text-center font-bold"> 
                            Close
                        </button>
                    </div>
                </div>

            </div>

            <!-- Session messages -->
            @session('image')
                <div class="px-10 bg-green-600 text-white font-bold text-center p-3 rounded">{{ session('image') }}</div>
            @endsession

            @session('product')
                <div class="px-10 bg-green-600 text-white font-bold text-center p-3 rounded">{{ session('product') }}</div>
            @endsession

            <!-- Products -->
            @forelse($products as $product)
                <div class="m-5 flex flex-row items-center gap-4 rounded bg-white px-10 py-5">
                    <p class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-black text-xl font-bold text-white">
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
                        <x-admin.product.product-update :product="$product"/>
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