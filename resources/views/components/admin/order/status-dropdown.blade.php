@props(['order'])

<div x-data="{ status: false }">
    
    <button type="button" @click="status = true">
        <x-icons.dropdown />
    </button>

    <div x-show="status" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">

        <div class="flex flex-col gap-10 rounded-xl bg-gray-950 border border-gray-200 p-6 shadow-lg">
            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                @csrf
                @method('PATCH')

                <p class="text-center mb-5 text-gray-200 font-bold">
                    Status
                </p>
                
                <select name="status" id="order_status" class="rounded-xl bg-gray-900 border text-gray-200 p-2">
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="shipped">Shipped</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <button type="submit" class="rounded-xl bg-amber-400 p-2 text-center text-black hover:bg-amber-300 font-bold">
                    Update
                </button>
            </form>

            <button type="button" @click="status = false" class="rounded-xl bg-red-600 p-2 text-black text-center hover:bg-red-400 font-bold">
                Close
            </button>
        </div>
    </div>
</div>