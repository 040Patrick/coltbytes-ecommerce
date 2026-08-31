<aside class="w-64 shrink-0 bg-black h-full">
    <nav class="flex h-full flex-col bg-black">

        <a href="{{ route('account.index') }}" class="font-bold text-white bg-black w-full hover:bg-amber-400 rounded p-5">
            Account
        </a>

        <a href="{{ route('user.edit', auth()->user()) }}" class="font-bold text-white bg-black hover:bg-amber-400 rounded p-5">
            User
        </a>

        <a href="{{ route('phone.index') }}" class="font-bold text-white bg-black w-full hover:bg-amber-400 rounded p-5">
            Phone
        </a>

        <a href="{{ route('addresses.index') }}" class="font-bold text-white bg-black w-full hover:bg-amber-400 rounded p-5">
            Addresses
        </a>

        <a href="#" class="font-bold text-white bg-black w-full hover:bg-amber-400 p-5">
            Security
        </a>
    </nav>
</aside>