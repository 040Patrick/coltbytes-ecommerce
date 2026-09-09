@extends('layout.layout')

@section('content')
    <div class="mx-30 mt-40">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-black">
                Admin Panel
            </h1>

            <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

            <p class="mt-2 text-gray-500">
                Manage your store and application.
            </p>
        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

            <!-- Products -->
            <a href="{{ route('admin.products.index') }}"
               class="group rounded-2xl border border-black/10 bg-black p-6 transition hover:-translate-y-1 hover:border-amber-400/40 hover:shadow-lg">

                <div class="mb-6 flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-400 text-xl font-bold text-black">
                        P
                    </div>

                    <span class="text-sm font-bold text-gray-500 transition group-hover:text-amber-400">
                        Manage →
                    </span>
                </div>

                <h2 class="text-2xl font-bold text-white">
                    Products
                </h2>

                <p class="mt-2 text-gray-400">
                    Create, edit and manage your products.
                </p>
            </a>

            <!-- Orders -->
            <a href="{{ route('order.index') }}" class="group rounded-2xl border border-black/10 bg-black p-6 transition hover:-translate-y-1 hover:border-amber-400/40 hover:shadow-lg">

                <div class="mb-6 flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-400 text-xl font-bold text-black">
                        O
                    </div>

                    <span class="text-sm font-bold text-gray-500 transition group-hover:text-amber-400">
                        Manage →
                    </span>
                </div>

                <h2 class="text-2xl font-bold text-white">
                    Orders
                </h2>

                <p class="mt-2 text-gray-400">
                    View and manage customer orders.
                </p>
            </a>

            <!-- Users -->
            <a href="{{ route('admin.users.index') }}"
               class="group rounded-2xl border border-black/10 bg-black p-6 transition hover:-translate-y-1 hover:border-amber-400/40 hover:shadow-lg">

                <div class="mb-6 flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-400 text-xl font-bold text-black">
                        U
                    </div>

                    <span class="text-sm font-bold text-gray-500 transition group-hover:text-amber-400">
                        Manage →
                    </span>
                </div>

                <h2 class="text-2xl font-bold text-white">
                    Users
                </h2>

                <p class="mt-2 text-gray-400">
                    Manage registered users and accounts.
                </p>
            </a>

        </div>
    </div>
@endsection