@props(['image'])

<form action="{{ route('products.images.destroy', $image) }}" method="post">
    @csrf
    @method('delete')

    <!-- Event -->
    <button type="button" @click="confirmDelete = true" class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-400">
        Delete
    </button>

    <!-- Show delete  -->
    <div x-show="confirmDelete" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="w-full max-w-md rounded-xl bg-gray-950 p-8 shadow-xl">

            <h2 class="text-xl font-bold text-white">Delete image?</h2>
            
            <p class="mt-2 text-gray-400">
                Are you sure you want to delete this image?
            </p>

            <!-- Actions -->
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" @click="confirmDelete = false" class="rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                    Cancel
                </button>

                <button type="submit" class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-400">
                    Yes, delete it
                </button>
            </div>
        </div>
    </div>
</form>