@props(['user'])

<div x-data="{ status: false }">
    <!-- Header -->
    <div class="flex items-center">
        <p class="px-10">
            <strong class="text-black">Orders:</strong>
        </p>

        <button type="button" @click="status = true" class="rounded p-1 hover:bg-amber-300">
            <x-icons.dropdown />
        </button>
    </div>

    <div x-show="status" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950/50">

        <div class="border border-gray-200 flex max-h-[80vh] flex-col gap-5 overflow-y-auto rounded-lg bg-gray-950 p-6 shadow-lg">

            <p class="text-center text-gray-200 text-2xl font-bold">
                Order Info
            </p>

            <p class="text-center font-bold text-gray-200">
                <strong class="text-amber-500">Order owned by:</strong>
                {{ $user->fullName }}
            </p>

            @forelse($user->orders as $order)
                <div class="flex items-center justify-between gap-10 bg-gray-900 rounded border p-4">
                    <a href="{{ route('admin.orders.index') }}#order-{{ $order->id }}" class="font-bold text-amber-600 hover:text-amber-500">
                        #{{ $order->id }}
                    </a>

                    <p class="font-bold text-gray-200">
                        Status: {{ $order->status }}
                    </p>
                </div>
            @empty

                <p class="text-center text-gray-200 font-bold p-2 ">
                    No orders have been made by this user.
                </p>
            @endforelse

            <button type="button" @click="status = false" class="rounded-xl bg-red-500 p-2 font-bold text-center hover:bg-red-400">
                Close
            </button>

        </div>
    </div>
</div>