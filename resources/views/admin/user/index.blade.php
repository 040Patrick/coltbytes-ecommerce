@extends('layout.layout')

@section('content')
    <!-- Admin Navbar -->
    <x-admin.navbar />

    <div class="mt-30 mx-30 bg-gray-950 rounded-2xl mb-30">
        <!-- Return button -->
        <div class="flex justify-begin">
            <a href="{{ route('admin.index') }}" class="bg-amber-400 p-3 px-10 mt-10 mx-10 hover:bg-amber-300 text-black text-center font-bold rounded-xl"> Back </a>
        </div>

        <section class="py-5">

            <!-- Header -->
            <div class="px-10 py-10">
                
            <h1 class="text-4xl font-bold text-white">
                    Admin Painel
            </h1>

            <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>
            
            <p class="mt-2 text-gray-500  mb-2">
                    Manage or create products.
            </p>
        

            @session('roles')
                <div class="rounded bg-green-600 p-2 text-center font-bold text-white">{{ session('roles') }}</div>
            @endsession

            <!-- Users -->
            <div class="flex flex-col gap-4 mx-10 mt-10">
                @forelse($users as $user)
                    <div class="overflow-hidden rounded-xl bg-gray-100 shadow-lg">
                        <!-- User information -->
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b-2 border-gray-200 p-5">
                            <div>
                                <p class="text-xl font-bold text-gray-900">{{ $user->fullName }}</p>
                                <p class="mt-1 text-gray-600">{{ $user->email }}</p>
                            </div>

                            <div>
                                @if($user->email_verified_at)
                                    <span class="rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700">Verified</span>
                                @else
                                    <span class="rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700">Not verified</span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-wrap items-center gap-3 bg-gray-200 p-4">
                            <x-admin.users.roles :user="$user" :roles="$roles"/>
                            <x-admin.users.orders :user="$user"/>
                        </div>
                    </div>
                @empty
                    <p class="p-5 text-center font-bold text-white">No users found.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection