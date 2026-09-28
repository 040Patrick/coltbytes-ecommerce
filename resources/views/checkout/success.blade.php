@extends('layout.layout')

@section('content')
    <div class="min-h-screen px-4 py-12">
        <div class="mx-auto w-full max-w-4xl">
            <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6 shadow-2xl sm:p-10">
                <div class="text-center">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-amber-400">
                        <svg class="h-12 w-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h1 class="mt-6 text-3xl font-bold text-white sm:text-4xl">
                        Payment successful!
                    </h1>
                    <p class="mx-auto mt-3 max-w-xl text-gray-400">
                        Thank you for your purchase. Your payment has been successfully processed and your order has been received.
                    </p>
                </div>
                <div class="mt-10 grid gap-6 lg:grid-cols-2">
                    <div class="rounded-2xl border border-zinc-800 bg-black p-6">
                        <h2 class="text-lg font-bold text-white">
                            Order information
                        </h2>
                        <div class="mt-5 space-y-4">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-gray-400">Order number</span>
                                <span class="font-semibold text-white">#{{ $order->id }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-gray-400">Date</span>
                                <span class="font-semibold text-white">{{ $order->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-gray-400">Payment status</span>
                                <span class="rounded-full bg-amber-400/10 px-3 py-1 text-sm font-semibold text-amber-400">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between gap-4 border-t border-zinc-800 pt-4">
                                <span class="text-gray-400">Total</span>
                                <span class="text-xl font-bold text-white">
                                    R$ {{ number_format($order->total, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-zinc-800 bg-black p-6">
                        <h2 class="text-lg font-bold text-white">
                            What's next?
                        </h2>
                        <div class="mt-5 space-y-5">
                            <div class="flex gap-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-amber-400 font-bold text-black">
                                    1
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">Order received</h3>
                                    <p class="mt-1 text-sm text-gray-400">
                                        We've received your order and payment confirmation.
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-zinc-800 font-bold text-gray-400">
                                    2
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">Order processing</h3>
                                    <p class="mt-1 text-sm text-gray-400">
                                        We'll prepare your products for shipment.
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-zinc-800 font-bold text-gray-400">
                                    3
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">Shipping</h3>
                                    <p class="mt-1 text-sm text-gray-400">
                                        You'll receive updates when your order is shipped.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 rounded-2xl border border-zinc-800 bg-black p-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-white">
                            Delivery
                        </h2>
                        <span class="text-sm text-gray-500">
                            Shipping address
                        </span>
                    </div>
                    <div class="mt-5 text-sm text-gray-400">
                        <p class="font-semibold text-white">
                            {{ $order->user->first_name }} {{ $order->user->last_name }}
                        </p>
                        <p class="mt-1">
                            {{ $order->address->street }}, {{ $order->address->number }}
                        </p>
                        <p>
                            {{ $order->address->city }} - {{ $order->address->state }}
                        </p>
                        <p>
                            {{ $order->address->zip_code }}
                        </p>
                    </div>
                </div>
                <div class="mt-6 rounded-2xl border border-zinc-800 bg-black p-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-white">
                            Order summary
                        </h2>
                        <span class="text-sm text-gray-500">
                            {{ $order->orderItems->count() }} {{ $order->orderItems->count() === 1 ? 'item' : 'items' }}
                        </span>
                    </div>
                    <div class="mt-5 divide-y divide-zinc-800">
                        @foreach ($order->orderItems as $item)
                            <div class="flex items-center justify-between gap-4 py-4 first:pt-0 last:pb-0">
                                <div class="min-w-0">
                                    <p class="truncate font-semibold text-white">
                                        {{ $item->product->name }}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Quantity: {{ $item->quantity }}
                                    </p>
                                </div>
                                <span class="shrink-0 font-semibold text-white">
                                    R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
                    <a href="{{ route('user.order.index') }}" class="rounded-xl bg-amber-400 px-8 py-3 text-center font-bold text-black transition hover:bg-amber-300">
                        View order
                    </a>
                    <a href="{{ route('home') }}" class="rounded-xl border border-zinc-700 px-8 py-3 text-center font-bold text-white transition hover:bg-zinc-900">
                        Continue shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection