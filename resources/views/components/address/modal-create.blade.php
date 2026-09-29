@props(['countries', 'addresses'])

<div x-data="{ add: false }" class="flex gap-3 justify-center">
    <!-- Edit -->
    <button type="button" @click="add = true" x-show="!add" class="text-black text-center px-5 rounded-xl font-bold bg-amber-400 mt-5 p-2 w-full hover:bg-amber-300">
        Add Address
    </button>

    <!-- Edit Modal -->
    <div x-show="add" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950/70 px-4">
        <div class="w-full max-w-2xl bg-gray-950 rounded-xl">
            <!-- Title -->
            <div class="px-5 pt-5">
                <h1 class="text-white font-bold text-2xl text-center py-5 underline">
                    Add Address
                </h1>
                
                <div class="w-full h-px bg-white/20"></div>
            </div>

            <!-- Form -->
            <form action="{{ route('addresses.store') }}" method="post" class="px-5 py-5 flex flex-col">
                @csrf

                <x-address.form button="Add" :countries="$countries" />
            </form>

        </div>
    </div>
</div>