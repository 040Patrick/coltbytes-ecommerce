@extends('layout.layout')

@section('content')
    <div class="min-h-screen px-4 py-12">
        <div class="mx-auto flex min-h-[70vh] w-full max-w-2xl items-center justify-center">
            <div class="w-full rounded-3xl border border-zinc-800 bg-zinc-950 p-8 text-center shadow-2xl sm:p-10">
                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-zinc-800">
                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h1 class="mt-6 text-3xl font-bold text-white sm:text-4xl">
                    Payment cancelled
                </h1>
                <p class="mx-auto mt-4 max-w-lg text-gray-400">
                    Your payment was not completed. Don't worry, no successful payment was made.
                </p>
                <div class="mt-8 rounded-2xl border border-zinc-800 bg-black p-5 text-left">
                    <div class="flex gap-4">
                        <div class="mt-1 shrink-0">
                            <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-semibold text-white">
                                Your cart is still available
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                You can return to checkout and try the payment again, or continue shopping.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
                    <a href="{{ route('checkout.index', $product) }}" class="rounded-xl bg-amber-400 px-8 py-3 text-center font-bold text-black transition hover:bg-amber-300">
                        Return to checkout
                    </a>
                    <a href="{{ route('home') }}" class="rounded-xl border border-zinc-700 px-8 py-3 text-center font-bold text-white transition hover:bg-zinc-900">
                        Continue shopping
                    </a>
                </div>
                <p class="mt-8 text-sm text-gray-600">
                    If you believe this happened by mistake, please try again.
                </p>
            </div>
        </div>
    </div>
@endsection