<div x-data="{open : false}" >
    <button type="button" @click="open = true" class="rounded p-3 text-center text-white hover:bg-amber-400 hover:text-black">
        <x-icons.cart />
    </button>

    <div x-show="open" x-cloak >
       
    </div>

</div>