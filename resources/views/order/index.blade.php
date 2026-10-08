@extends('layout.layout')
 
@section('content')
    <div class="min-h-screen flex flex-col items-center mx-30 m-20 justify-center px-6 py-16">
        <div class="w-full bg-gray-950 p-10 m-20 rounded-xl">
 
            <!-- Title -->
            <div class="m-5">
                <h1 class="text-5xl font-bold text-white">
                    My orders
                </h1>
                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>
                <p class="mt-6 text-gray-300">
                    See your orders.
                </p>
            </div>
 
            @session('review')
                <div class="rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center font-bold text-green-300 mb-5">{{ session('review') }}</div>
            @endsession
            
            <section class="grid grid-cols-1 p-5 gap-10 rounded-xl">
                @forelse($orders as $order)
                    <!-- Order -->
                    <div class="flex flex-col bg-white rounded-2xl border border-gray-700 border-3 p-6 gap-6 shadow-lg">
 
                        <!-- Order information -->
                        <div class="flex flex-wrap justify-between gap-5">
                            <div>
                                <p class="text-sm text-gray-500">
                                    Order
                                </p>
                                <p class="text-lg font-bold text-black">
                                    #{{ $order->id }}
                                </p>
                            </div>
 
                            <div>
                                <p class="text-sm text-gray-500">
                                    Status
                                </p>
                                <p class="text-lg font-bold text-orange-600">
                                    {{ $order->status }}
                                </p>
                            </div>
 
                            <div>
                                <p class="text-sm text-gray-500">
                                    Total
                                </p>
                                <p class="text-lg font-bold text-black">
                                    R$ {{ number_format($order->total, 2, ',', '.') }}
                                </p>
                            </div>
                        </div>
 
                        <!-- Address -->
                        <div class="flex gap-10 border-t border-gray-200 pt-5">
                            <div class="flex justify-start">
                                <!-- Start -->
                                <div class="text-gray-700 gap-15">
                                    <h2 class="mb-3 text-lg font-bold text-black">
                                        Shipping address
                                    </h2>
                                    <p>
                                        {{ $order->address->street }}, {{ $order->address->number }}
                                    </p>
                                    <p>
                                        {{ $order->address->neighborhood }}
                                    </p>
                                    <p>
                                        {{ $order->address->city }} - {{ $order->address->state }}
                                    </p>
                                    <p>
                                        ZIP: {{ $order->address->zip_code }}
                                    </p>
                                </div>

                                
                            </div>
                        </div>

                        
                        <div class="flex gap-10 border-t border-gray-200 pt-5">
                            <div class="flex justify-center">
                                @can('store', $order)
                                    <x-order.modal-review-show :order="$order"/>
                                @endcan
                            </div>
                        </div>
 
                        <!-- Order items -->
                        <div class="border-t border-gray-200 pt-5">
                            <h2 class="mb-3 text-lg font-bold text-black">
                                Items
                            </h2>
 
                            <div class="flex flex-col gap-4">
                                @foreach($order->orderItems as $item)
                                    <div class="flex justify-between items-center gap-5">
                                        <div>
                                            <p class="font-bold text-black">
                                                {{ $item->product->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                Quantity: {{ $item->quantity }}
                                            </p>
                                        </div>
 
                                        <p class="font-bold text-black">
                                            R$ {{ number_format($item->price, 2, ',', '.') }}
                                        </p>
                                    </div>

                                    <!-- Product link -->
                                    <div class="flex justify-center gap-4">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->product->images->first()->path) }}" alt="{{ $item->product->name }}" class="h-12 w-12 rounded-lg object-cover">

                                        <a href="{{ route('product.show', $item->product) }}" class="font-bold text-black hover:text-amber-500">
                                            See product
                                        </a>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center gap-5 py-16 text-center">
                        <div>
                            <h2 class="text-2xl font-bold text-white">
                                No orders yet
                            </h2>
 
                            <p class="mt-2 text-gray-400">
                                You haven't ordered anything yet.
                            </p>
                        </div>
 
                        <a href="{{ route('home') }}"
                            class="rounded-lg bg-amber-400 px-6 py-3 font-bold text-black transition hover:bg-amber-300">
                            Browse products
                        </a>
                    </div>
                @endforelse
            </section>
        </div>
    </div>
@endsection