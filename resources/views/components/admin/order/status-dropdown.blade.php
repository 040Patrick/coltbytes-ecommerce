@props(['order'])

<div x-data="{ status: false }">
    <button type="button" @click="status = true">
        <x-icons.dropdown />
    </button>

    <div x-show="status" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="w-full max-w-md rounded-2xl border border-gray-800 bg-gray-950 p-6 shadow-xl">
            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex flex-col bg-gray-900 border border-gray-700 rounded-xl gap-6 p-5">
                @csrf
                @method('PATCH')
                
                <!-- Fields -->
                <div class="flex flex-col items-center ">
                    <label for="order_status" class="text-gray-200 text-center text-lg font-bold mb-2 ">Update status:</label>
                    <select name="status" id="order_status_{{ $order->id }}" class="w-full rounded-xl border border-gray-700 bg-gray-900 p-3 text-gray-200 outline-none transition focus:border-amber-400">
                        <option value="pending" @selected($order->status === 'pending')>Pending</option>
                        <option value="paid" @selected($order->status === 'paid')>Paid</option>
                        <option value="shipped" @selected($order->status === 'shipped')>Shipped</option>
                        <option value="completed" @selected($order->status === 'completed')>Completed</option>
                        <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full rounded-xl bg-amber-400 p-2 text-center font-bold text-black transition hover:bg-amber-300">
                        Update
                    </button>
                    <button type="button" @click="status = false" class="w-full rounded-xl border border-gray-700 bg-gray-950 p-2 text-center font-bold text-gray-200 transition hover:bg-gray-900">
                        Close
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>