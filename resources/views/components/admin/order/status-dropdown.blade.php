@props(['order'])

<div x-data="{ status: false }">

    <button type="button" @click="status = true">
        <x-icons.dropdown />
    </button>

    <div x-show="status" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">

        <div class="flex flex-col gap-5 rounded-lg bg-white p-6 shadow-lg">
            <form action="{{ route('order.update', $order) }}" method="POST">
                @csrf
                @method('PATCH')

                <p class="text-center mb-5 text-black font-bold">
                    Status
                </p>
                <select name="status" id="order_status" class="rounded border p-2">
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="shipped">Shipped</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <button type="submit" class="rounded bg-amber-400 p-2 text-center text-black hover:bg-amber-300">
                    Update
                </button>
            </form>

            <button type="button" @click="status = false" class="rounded bg-red-600 p-2 text-black text-center hover:bg-red-400">
                Close
            </button>
        </div>

    </div>

</div>