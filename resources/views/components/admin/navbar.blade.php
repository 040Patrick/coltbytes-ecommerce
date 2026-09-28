<div class="absolute left-1/2 -translate-x-1/2 z-10 flex justify-center gap-5 bg-black mt-5 px-5 rounded-2xl p-2">
    <a href="{{ route('admin.products.index') }}" class="text-center font-bold bg-amber-400 hover:bg-amber-300 rounded-xl p-2 {{ request()->routeIs('admin.products.index') ? 'bg-blue-700 text-white hover:bg-blue-600' : '' }}">
        Products
    </a>
    <a href="{{ route('admin.orders.index') }}" class="text-center font-bold bg-amber-400 hover:bg-amber-300 rounded-xl p-2 {{ request()->routeIs('admin.orders.index') ? 'bg-blue-700 text-white hover:bg-blue-600' : '' }}">
        Orders
    </a>
    <a href="{{ route('admin.users.index') }}" class="text-center font-bold bg-amber-400 hover:bg-amber-300 rounded-xl p-2 {{ request()->routeIs('admin.users.index') ? 'bg-blue-700 text-white hover:bg-blue-600' : '' }}">
        Users
    </a>
</div>