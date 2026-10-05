@extends('layout.layout')

@section('content')
    <div class="min-h-200 mx-auto mt-30 flex w-full max-w-250 overflow-hidden rounded-2xl bg-gray-950 shadow-xl mb-30">
        <!-- Aside -->
        <aside class="w-50 shrink-0 border-r border-gray-800 bg-gray-900/80 p-4">
            <div class="mb-6 px-3">
                <h2 class="text-lg font-bold text-white">
                    Account
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Manage your account
                </p>
            </div>

            <!-- Links -->
            <nav class="flex flex-col gap-1">
                <a href="{{ route('account.show') }}" class="rounded-xl px-4 py-3 font-bold text-gray-300 transition hover:bg-gray-800 hover:text-white">
                    Account
                </a>
                <a href="{{ route('user.edit', auth()->user()) }}" class="rounded-xl px-4 py-3 font-bold text-gray-300 transition hover:bg-gray-800 hover:text-white">
                    User
                </a>
                <a href="{{ route('address.index') }}" class="rounded-xl px-4 py-3 font-bold text-gray-300 transition hover:bg-gray-800 hover:text-white">
                    Address
                </a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="min-w-0 flex-1 p-8">
            @yield('account-content')
        </main>
    </div>
@endsection