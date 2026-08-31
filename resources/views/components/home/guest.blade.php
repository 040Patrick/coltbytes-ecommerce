<!-- HOME GUEST SESSION(MADE BY IA)-->
<section class="mx-auto flex w-fit flex-col items-center justify-center gap-6 rounded-2xl  bg-black px-20 py-10 mt-30">

    @session('logout')
        <div class="rounded-lg bg-green-600 px-6 py-3 text-center font-bold text-white">
            {{ session('logout') }}
        </div>
    @endsession

    <div class="text-center">
        <h2 class="text-3xl font-bold text-white">
            Welcome to ColtBytes
        </h2>

        <p class="mt-2 text-gray-300">
            Join us or sign in to continue.
        </p>
    </div>

    <div class="flex gap-4">
        <a href="{{ route('login') }}" class="rounded-xl bg-amber-400 px-10 py-3 font-bold text-black transition hover:bg-amber-300">
            Login
        </a>

        <a href="{{ route('register.index') }}" class="rounded-xl border border-white bg-black px-10 py-3 font-bold text-white transition hover:bg-gray-600" >
            Register
        </a>
    </div>
</section>