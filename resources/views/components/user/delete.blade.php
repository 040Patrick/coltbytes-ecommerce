<div x-data="{ confirmDelete: false }" class="flex items-center gap-3">
    <form action="{{ route('user.update', auth()->user()) }}" method="post">
        @csrf
        @method('delete')
        <!-- Botão principal -->
        <button type="button" @click="showDeleteConfirmation = true" class="w-full rounded-lg bg-red-600 px-7 py-3 font-bold text-black hover:bg-red-700">
                Delete
        </button>
        
        <div x-show="confirmDelete" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
            <div class="w-full max-w-md rounded-xl bg-gray-950 p-8 shadow-xl">
                <h2 class="text-xl font-bold text-white">Delete product?</h2>
                <p class="mt-2 text-gray-400">
                    Are you sure you want to delete product ?
                </p>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" @click="confirmDelete = false" class="rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-400">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>