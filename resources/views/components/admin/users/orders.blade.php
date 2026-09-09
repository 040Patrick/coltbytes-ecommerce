@props(['user'])

<div x-data="{ status: false }">
    <!-- Header -->
    <div class="flex items-center">
        <p class="px-10">
            <strong class="text-black">Orders:</strong>
        </p>

        <button type="button" @click="status = true">
            <x-icons.dropdown />
        </button>
    </div>

    <div x-show="status" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

        <div class="flex max-h-[80vh] flex-col gap-5 overflow-y-auto rounded-lg bg-white p-6 shadow-lg">

            <p class="text-center text-2xl font-bold">
                Order Info
            </p>

            <p class="text-center font-bold">
                <strong class="text-amber-500">Order owned by:</strong>
                {{ $user->fullName }}
            </p>

            @foreach($user->orders as $order)
                <div class="flex items-center justify-between gap-10 rounded border p-4">
                    <a href="{{ route('order.index') }}" class="font-bold hover:text-amber-500">
                        #{{ $order->id }}
                    </a>

                    <p class="font-bold text-black">
                        Status: {{ $order->status }}
                    </p>
                </div>
            @endforeach

            <button type="button" @click="status = false" class="rounded bg-red-500 p-2 font-bold text-center hover:bg-red-400">
                Close
            </button>

        </div>
    </div>
</div>