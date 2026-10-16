<nav class="grid grid-cols-3 w-full bg-gray-950 px-10 py-8 gap-5 font-bold">

    <!-- Logo Start -->
    <div class="flex items-center justify-start">
        @auth
            <div x-data="{ open: false }" class="relative flex justify-center py-2 text-white">
                <button type="button" @click="open = !open" aria-label="Open user menu" :aria-expanded="open">
                    <x-icons.dropdown />
                </button>
                
                <x-partials.dropdown />
            </div>
        @endauth

        <a href="{{ route('home') }}" class="px-12 text-4xl text-gray-200">
            Colt<span class="text-amber-400">Bytes</span>
        </a>
    </div>

    <!-- Center -->
    <div class="flex flex-col items-center justify-center">
        <!-- Search bar -->
        <div class="rounded-xl border border-black/30 bg-gray-950 p-2">
            <form action="{{ route('home') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"  placeholder="Search products..."  class="max-w-2xl rounded-lg border border-black/20 bg-white px-4 py-2 outline-none focus:border-amber-400">
                <button type="submit" class="rounded-lg bg-amber-400 px-6 py-2 font-bold text-black hover:bg-amber-300">
                    Search
                </button>
            </form>
        </div>
        @auth
            <!-- Show selected address -->
            @forelse(auth()->user()->addresses as $address)
                <a href="{{ route('address.index') }}" class="translate-y-2.5 text-center font-bold text-gray-100 hover:scale-105">
                    📍 {{ $address->number }} - {{ $address->city }} -  {{ $address->state }}
                </a>    
            @empty
                <a href="{{ route('address.index') }}" class="translate-y-2.5 text-amber-400 font-bold hover:text-amber-300 hover:undeline hover:scale-105">
                    Add Address
                </a>
            @endforelse
        @endauth
    </div>
    
    <!-- Links End-->
    <div class="flex items-center justify-end gap-2">
        @if(auth()->user()?->hasRole(['admin']))
            <a href="{{ route('admin.index') }}" class="rounded p-3 text-center text-gray-100 hover:bg-blue-600 hover:text-gray-900">
                Admin
            </a>
        @endif

        <a href="{{ route('home') }}" class="rounded p-3 text-center text-center text-gray-100  hover:bg-amber-400 hover:text-gray-900">
            Home
        </a>

        @auth
            <a href="{{ route('profile.index') }}" class="rounded p-3 text-center text-center text-gray-100  hover:bg-amber-400 hover:text-gray-900">
                Profile
            </a>
        @endauth

        <a href="{{ route('contact.index') }}" class="rounded p-3 text-center text-center text-gray-100  hover:bg-amber-400 hover:text-gray-900">
            Contact
        </a>

        <a href="{{ route('about.index') }}" class="rounded p-3 text-center text-gray-100 hover:bg-amber-400 hover:text-gray-900">
            About
        </a>

        <!-- Cart -->
        @auth
            <x-cart.modal-cart />
        @endauth
        
        @guest
            <div class="flex gap-2">
                <a href="{{ route('register.index') }}" class="rounded-2xl bg-amber-400 p-3 text-gray-900 hover:bg-amber-300">
                    Register
                </a>

                <a href="{{ route('login') }}" class="rounded-2xl bg-amber-400 p-3 text-gray-900  hover:bg-amber-300">
                    Login
                </a>
            </div>
        @endguest
    </div>
</nav>