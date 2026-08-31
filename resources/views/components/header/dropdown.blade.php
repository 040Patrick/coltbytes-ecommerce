<div class="flex flex-col gap-2">
    <!-- Links -->
    <a href="{{ route('account.index') }}" class="text-black hover:bg-amber-300 rounded p-2">Account</a>
    <!-- LOGOUT -->
    <form action="{{ route('logout') }}" method="post" class=" rounded text-black hover:bg-red-500 p-2">
        @csrf 
        @method('delete')
        <button type="submit">
            <span class="text-black">
                Logout
            </span>
        </button>
    </form>
</div>