@props(['countries', 'address'])
<div x-data="{add: false}" class="flex gap-2 justify-center">

    <!-- Edit -->
    <button type="button" @click="add = true" x-show="!add" class="text-black text-center px-5 rounded font-bold bg-amber-400 p-2 w-full hover:bg-amber-300" >
        Edit
    </button>

    <div x-show="add" class="text-black text-center p-2 mt-2 w-full rounded font-bold">
        <div class="w-full h-px bg-white/20 my-5"></div>

        <div class="bg-black rounded-2xl">
            <div class="mt-10">

                <!-- Title -->
                <div >
                    <h1 class="text-white font-bold text-2xl text-center py-5 underline">
                        Edit Address
                    </h1>
                </div>

                <!-- Form -->
                <form action="{{ route('addresses.update', $address) }}" method="post" class="bg-black px-5 flex flex-col">
                    @csrf 
                    @method('patch')
                        
                    <x-address.form :countries="$countries" title="Edit" :address="$address" button="Edit"/>
                </form>
            </div>
        </div>

        <button type="button" @click="add = false" class="mt-4 font-black bg-red-600 hover:bg-red-500 w-full p-2 rounded cursor-pointer">
            Cancel
        </button>
    </div>

    <!-- Delete -->
    <x-address.modal-delete :address="$address"/>
</div>