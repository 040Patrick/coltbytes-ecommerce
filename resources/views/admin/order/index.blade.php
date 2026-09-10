@extends('layout.layout')

@section('content')
    <div class="mt-30 mx-30 bg-black rounded-2xl">

        <!-- Return button -->
        <div class="flex">
            <a href="{{ route('admin.index') }}" class="bg-amber-400 p-3 px-10 mt-10 mx-10 hover:bg-amber-300text-black text-center font-bold rounded">
                Back
            </a>
        </div>

        <section class="py-5">
            <!-- Header -->
            <div class="px-10 py-10">
                <h1 class="text-4xl font-bold text-white">
                    Admin Panel
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-2 mb-2 text-gray-500">
                    Manage or see your orders.
                </p>
            </div>

            @session('order')
                <div class="bg-green-600 text-white text-center font-bold p-2 rounded">
                    {{ session('order') }}
                </div> 
            @endsession
            
            <!-- Show orders -->
            <div class="flex flex-col gap-5 m-5 font-bold">
                @forelse($orders as $order)

                    <div class="w-full rounded border-2 bg-gray-100 p-5">

                        <div class="flex items-center justify-between">
                            <p class="rounded-2xl bg-black p-1 px-3 text-white">
                                Order #{{ $order->id }}
                            </p>
                            <p class="font-bold text-amber-500">
                                Status: {{ $order->status }}

                                <x-admin.order.status-dropdown :order="$order"/>
                            </p>
                            <p>
                                Total:
                                R$ {{ number_format($order->total, 2, ',', '.') }}
                            </p>
                            <p>
                                {{ $order->user->first_name }}
                                {{ $order->user->last_name }}
                            </p>
                        </div>

                        <!-- Products -->
                        <div class="mt-5 border-t-3 pt-4">
                            <p class="mb-2 font-bold">
                                Products:
                            </p>
                            <div class="flex flex-col gap-1">
                                @foreach($order->orderItems as $item)
                                    <p class="text-gray-700">
                                        {{ $item->product->name }}
                                        × {{ $item->quantity }}
                                    </p>
                                @endforeach
                            </div>
                        </div>

                    </div>
                @empty
                    <p class="text-white">
                        No orders found.
                    </p>
                @endforelse

            </div>
        </section>
    </div>
@endsection
