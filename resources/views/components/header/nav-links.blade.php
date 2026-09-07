<nav class="flex justify-end px-10 w-full bg-black py-8 gap-5 font-bold">
    <!-- Site name -->
    <a href="{{ route('home') }}" class="mr-auto text-4xl px-12 text-white font-bold">
        Colt<span class="text-amber-400">Bytes</span>
    </a>

    <!-- Links -->
    @if(auth()->user()?->hasRole(['admin']))
        <a href="{{ route('admin.index') }}" class="text-1xl text-white text-center p-3 bg-blue-900 rounded h-full">Admin</a>
    @endif
    
    <a href="{{ route('home') }}" class="text-1xl text-white text-center rounded p-3 hover:bg-amber-400 hover:text-black h-full">Home</a>

    @auth
        <a href="{{ route('profile.index') }}" class="text-1xl text-white text-center rounded p-3 hover:bg-amber-400 hover:text-black h-full">Profile</a>
    @endauth
    <a href="{{ route('contact.index') }}" class="text-1xl p-3 text-white text-center rounded p-3 hover:bg-amber-400 hover:text-black h-full">Contact</a>
    <a href="{{ route('about.index') }}" class="text-1xl text-white text-center p-3 rounded hover:bg-amber-400 hover:text-black h-full">About</a>
    <!-- Auth and Guest links -->
    @auth 
        <!-- DROPDOWN -->
        <div x-data="{ open: false }" class="text-1xl text-white text-center py-2">
            <button @click="open = !open" >
                <x-icons.dropdown />
            </button>

            <div x-show="open" x-cloak @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-amber-400 rounded-2xl p-3">
                <x-header.dropdown />
            </div>
        </div>

    @else  
        <div class="flex justify gap-2">
            <a href="{{ route('register.index') }}" class="text-1xl p-3 text-black text-center bg-amber-400 rounded-2xl hover:bg-amber-300">Register</a>
            <a href="{{ route('login') }}" class="text-1xl text-black text-center  bg-amber-400 rounded-2xl p-3 hover:bg-amber-300">Login</a>
        </div>
    @endauth
</nav>