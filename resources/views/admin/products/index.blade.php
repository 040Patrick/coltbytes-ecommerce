@extends('layout.layout')


@section('content')
    <div class="mt-30 mx-30 bg-black rounded-2xl">
        <section>
            <!-- Header -->
            <div class="px-10 py-10">
                <h1 class="text-4xl font-bold text-white">
                    Admin Panel
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-2 text-gray-500">
                    Manage your store and application.
                </p>

                <div class="flex justify-end">
                    <a href="{{ route('admin.index') }}" class="bg-amber-400 p-3 hover:bg-amber-300 text-black text-center font-bold rounded"> Back </a>
                </div>
            </div>

            <!-- Products -->
            @foreach($products as $product)
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

                    <div class="flex items-center gap-3">

                        <a href="" class="rounded bg-amber-400 px-4 py-2 font-bold text-black">
                            Edit
                        </a>

                        <button type="button" class="rounded bg-red-500 px-4 py-2 font-bold text-white" @click="deleteProduct({{ $product->id }})">
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection