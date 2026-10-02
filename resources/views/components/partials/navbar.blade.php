<nav class="grid grid-cols-3 w-full bg-gray-950 px-10 py-8 gap-5 font-bold">

    <!-- Logo -->
    <div class="flex items-center justify-start">
        <a href="{{ route('home') }}" class="px-12 text-4xl text-white">
            Colt<span class="text-amber-400">Bytes</span>
        </a>
    </div>

    <!-- Search bar -->
    <div class="flex items-center justify-center">
        <div class="rounded-xl border border-black/30 bg-gray-950 p-2">
            <form action="{{ route('home') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"  placeholder="Search products..."  class="max-w-2xl rounded-lg border border-black/20 bg-white px-4 py-2 outline-none focus:border-amber-400">
                <button type="submit" class="rounded-lg bg-amber-400 px-6 py-2 font-bold text-black hover:bg-amber-300">
                    Search
                </button>
            </form>
        </div>
    </div>
    
    <!-- Nav links -->
    <div class="flex items-center justify-end gap-2">
        @if(auth()->user()?->hasRole(['admin']))
            <a href="{{ route('admin.index') }}" class="rounded p-3 text-center text-white hover:bg-blue-600 hover:text-black">
                Admin
            </a>
        @endif

        <a href="{{ route('home') }}" class="rounded p-3 text-center text-white hover:bg-amber-400 hover:text-black">
            Home
        </a>

        @auth
            <a href="{{ route('profile.index') }}" class="rounded p-3 text-center text-white hover:bg-amber-400 hover:text-black">
                Profile
            </a>
        @endauth

        <a href="{{ route('contact.index') }}" class="rounded p-3 text-center text-white hover:bg-amber-400 hover:text-black">
            Contact
        </a>

        <a href="{{ route('about.index') }}" class="rounded p-3 text-center text-white hover:bg-amber-400 hover:text-black">
            About
        </a>

        @auth
            <div x-data="{ open: false }" class="relative py-2 text-center text-white">
                <button @click="open = !open">
                    <x-icons.dropdown />
                </button>

                <div x-show="open" x-cloak @click.outside="open = false" class="absolute right-0 mt-2 w-48 rounded-2xl bg-amber-400 p-3">
                    <x-partials.dropdown />
                </div>
            </div>
        @else
            <div class="flex gap-2">
                <a href="{{ route('register.index') }}" class="rounded-2xl bg-amber-400 p-3 text-black hover:bg-amber-300">
                    Register
                </a>

                <a href="{{ route('login') }}" class="rounded-2xl bg-amber-400 p-3 text-black hover:bg-amber-300">
                    Login
                </a>
            </div>
        @endauth

    </div>
</nav>