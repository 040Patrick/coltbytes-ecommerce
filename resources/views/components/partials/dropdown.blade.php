<div x-show="open" x-cloak @click.outside="open = false" @keydown.escape.window="open = false" class="absolute border border-gray-700 left-0 top-full z-50 mt-5 w-48 rounded-2xl bg-gray-950 p-2 shadow-xl">
    <div class="flex flex-col gap-1">
        <a href="{{ route('account.index') }}" class="font-semibold  rounded-xl p-2 text-center text-gray-300 transition border border-gray-800 hover:border-gray-700">
            Account
        </a>
        <a href="{{ route('user.order.index') }}" class="font-semibold  rounded-xl p-2 text-center text-gray-300 transition border border-gray-800 hover:border-gray-700">
            My orders
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full font-semibold rounded-xl p-2 text-center text-gray-300 transition border border-gray-800 hover:border-red-600">
                Logout
            </button>
        </form>
    </div>
</div>
