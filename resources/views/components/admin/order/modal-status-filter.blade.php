@props(['order'])

<div x-data="{ open: false }">
    <button type="button" @click="open = true" class="bg-amber-400 hover:bg-amber-300 rounded-xl mx-auto p-3 text-center font-bold text-black">
        Filter Status
    </button>

    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-5">
        <!-- Filter Status -->
        <div class="w-full max-w-md rounded-xl bg-gray-950 p-5">
            <form method="get" class="flex flex-col p-5 bg-gray-900 rounded-xl border border-gray-700">
                <label for="status" class="text-gray-200 text-center text-lg font-bold mb-2 ">Select an status:</label>
                <select name="status" class="w-full rounded-xl bg-gray-900 border border-gray-700 p-3 text-gray-200" id="status">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="shipped">Shipped</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <!-- Actions -->
                <div class="mt-5 flex flex-col gap-3">
                    <button type="submit" class="rounded-xl bg-amber-400 p-2 font-bold text-black hover:bg-amber-300">
                        Filter
                    </button>

                    <button type="button" @click="open = false" class="rounded-xl bg-gray-950 p-2 font-bold text-gray-200 border border-gray-700 hover:bg-gray-900">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>