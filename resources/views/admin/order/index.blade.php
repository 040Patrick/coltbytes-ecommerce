@extends('layout.layout')

@section('content')
    <div class="mx-30 mt-30 mb-30 rounded-2xl bg-black">
        <div class="flex">
            <a href="{{ route('admin.index') }}" class="mx-10 mt-10 rounded-lg bg-amber-400 px-10 py-3 text-center font-bold text-black transition hover:bg-amber-300">Back</a>
        </div>

        <section class="py-5">
            <div class="px-10 py-10">
                <h1 class="text-4xl font-bold text-white">Admin Panel</h1>
                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>
                <p class="mt-2 mb-2 text-gray-500">Manage or see your orders.</p>
            </div>

            @session('order')
                <div class="mx-10 mb-5 rounded-lg bg-green-600 p-3 text-center font-bold text-white">{{ session('order') }}</div>
            @endsession

            <div class="flex flex-col gap-5 px-10 pb-10">
                @forelse($orders as $order)
                    <div class="overflow-hidden rounded-xl bg-gray-100 shadow-lg">
                        <div class="flex items-center justify-between gap-6 border-b border-gray-300 px-6 py-5">
                            <div class="flex items-center gap-4">
                                <span class="rounded-lg bg-black px-4 py-2 font-bold text-white">Order #{{ $order->id }}</span>
                                <span class="text-gray-600">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                            </div>

                            <div class="flex items-center gap-6">
                                <div class="text-gray-700">
                                    <span class="font-bold">Customer:</span>
                                    {{ $order->user->first_name }} {{ $order->user->last_name }}
                                </div>

                                <div class="font-bold text-amber-600">
                                    Total: R$ {{ number_format($order->total, 2, ',', '.') }}
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-700">Status:</span>
                                    <x-admin.order.status-dropdown :order="$order"/>
                                </div>
                            </div>
                        </div>

                        <div class="px-6 py-5">
                            <h2 class="mb-4 text-lg font-bold text-black">Products</h2>

                            <div class="flex flex-col gap-2">
                                @foreach($order->orderItems as $item)
                                    <div class="flex items-center justify-between rounded-lg bg-white px-4 py-3 shadow-sm">
                                        <span class="font-semibold text-gray-800">{{ $item->product->name }}</span>
                                        <span class="rounded-lg bg-gray-200 px-3 py-1 font-bold text-gray-700">× {{ $item->quantity }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-xl bg-gray-100 p-10 text-center font-bold text-gray-500">No orders found.</div>
                @endforelse
            </div>
        </section>
    </div>
@endsection