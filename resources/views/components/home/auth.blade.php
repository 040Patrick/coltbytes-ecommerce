<!-- HOME AUTH SESSION(MADE BY IA)-->
<section class="mx-auto flex w-fit flex-col items-center justify-center gap-6 rounded-2xl bg-black px-20 py-16 mt-30">

    @session('logged')
        <div class="rounded-lg bg-green-600 px-6 py-3 text-center font-bold text-white">
            {{ session('logged') }}
        </div>
    @endsession

    <div class="text-center">
        <h1 class="text-4xl font-bold text-white">
            Welcome to ColtBytes
        </h1>

        <p class="mt-3 text-lg text-gray-300">
            We're glad to have you here.
        </p>
    </div>
</section>