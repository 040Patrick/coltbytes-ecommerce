@extends('account.layout')

@section('account-content')
    <div class="flex flex-col">
        <!-- Header -->
        <div>
            <h1 class="text-4xl font-bold text-white">
                Account
            </h1>

            <div class="mt-3 h-1 w-16 rounded-full bg-amber-400"></div>

            <p class="mt-4 text-gray-400">
                Manage your account information..
            </p>
        </div>

        <!-- Information -->
        <section class="mt-10 rounded-xl border border-gray-800 bg-gray-900/60 p-6">
            <h2 class="text-lg font-bold text-white">
                Account information
            </h2>

            <p class="mt-3 leading-7 text-gray-400">
                Manage your account information, update your personal details,
                and keep your contact information up to date.
            </p>

            <p class="mt-3 leading-7 text-gray-400">
                From here, you can review and manage the information associated
                with your account.
            </p>
        </section>

        <!-- Action -->
        <div class="mt-8 flex justify-end">
            <a href="{{ route('home') }}"
               class="rounded-xl bg-amber-400 px-6 py-3 font-bold text-black transition hover:bg-amber-300">
                Home
            </a>
        </div>
    </div>   
@endsection


