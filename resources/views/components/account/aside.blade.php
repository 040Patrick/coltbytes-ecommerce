<aside class="w-64 shrink-0 bg-gray-950 h-full">
    <nav class="flex h-full gap-8 flex-col bg-gray-950">

        <a href="{{ route('account.index') }}" class="font-bold text-white bg-gray-950 text-center w-full hover:bg-amber-400 hover:text-black rounded p-5">
            Account
        </a>

        <a href="{{ route('user.edit', auth()->user()) }}" class="font-bold text-white bg-gray-950 text-center hover:bg-amber-400 hover:text-black rounded p-5">
            User
        </a>

        <a href="{{ route('phone.index') }}" class="font-bold text-white bg-gray-950 text-center w-full hover:bg-amber-400 hover:text-black rounded p-5">
            Phone
        </a>

        <a href="{{ route('addresses.index') }}" class="font-bold text-white text-center bg-gray-950 w-full hover:bg-amber-400 hover:text-black rounded p-5">
            Addresses
        </a>

        <a href="#" class="font-bold text-white bg-gray-950 w-full hover:bg-amber-400 text-center hover:text-black rounded p-5">
            Security
        </a>
    </nav>
</aside>