@props(['address'])

<div x-data="{ confirmDelete: false }">
    <form action="{{ route('addresses.destroy', $address) }}" method="post">
        @csrf
        @method('delete')

        <!-- Delete button -->
        <button type="button" @click="confirmDelete = true" class="w-full rounded-lg bg-red-500 px-7 py-3 font-bold text-black transition hover:bg-red-400">
            Delete
        </button>

        <!-- Modal -->
        <div x-show="confirmDelete" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 px-4">

            <!-- Modal content -->
            <div class="w-full max-w-md rounded-xl bg-gray-950 p-8 text-center shadow-2xl">

                <!-- Icon -->
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-red-500/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-7 w-7 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12V16.5Zm9-4.5a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <!-- Message -->
                <h2 class="mt-5 text-xl font-bold text-white">
                    Delete address?
                </h2>

                <p class="mt-3 text-gray-400">
                    Are you sure you want to delete this address? 
                </p>

                <!-- Actions -->
                <div class="mt-7 flex justify-center gap-3">
                    <button type="button" @click="confirmDelete = false" class="rounded-lg bg-gray-700 px-5 py-2.5 font-bold text-white transition hover:bg-gray-600">
                        Cancel
                    </button>

                    <button type="submit" class="rounded-lg bg-red-500 px-5 py-2.5 font-bold text-black transition hover:bg-red-400">
                        Yes, delete it
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>