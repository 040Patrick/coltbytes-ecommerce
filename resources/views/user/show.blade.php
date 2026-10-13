@extends('layout.layout')

@section('content')
    <div class="mx-auto mt-30 max-w-5xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-950 shadow-2xl">
            <!-- Header -->
            <div class="border-b border-gray-800 bg-gradient-to-r from-gray-900 to-gray-950 px-6 py-10 sm:px-10">
                <div class="flex flex-col items-center gap-6 sm:flex-row">
                    <!-- Avatar -->
                    <div class="h-28 w-28 shrink-0 overflow-hidden rounded-full border-4 border-amber-400 bg-gray-800 shadow-lg shadow-amber-400/10">
                        <img
                            src="{{ Illuminate\Support\Facades\Storage::url($user->profile?->avatar ?? 'avatars/default-avatar.jpg') }}"
                            alt="{{ $user->fullName }}"
                            class="h-full w-full object-cover"
                        >
                    </div>

                    <!-- User info -->
                    <div class="min-w-0 text-center sm:text-left">
                        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Member profile</p>
                        <h1 class="mt-2 break-words text-3xl font-bold text-white sm:text-4xl">
                            {{ $user->fullName }}
                        </h1>
                        <p class="mt-3 text-sm text-gray-400">
                            Member since {{ $user->created_at->format('F Y') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Profile details -->
            <div class="px-6 py-8 sm:px-10 sm:py-10">
                <div class="flex items-center gap-3">
                    <div class="h-8 w-1 rounded-full bg-amber-400"></div>
                    <h2 class="text-2xl font-bold text-white">Profile</h2>
                </div>

                <div class="mt-6 rounded-xl border border-gray-800 bg-gray-900/60 p-6">
                    <p class="text-sm text-gray-500">Full name</p>
                    <p class="mt-2 text-lg font-medium text-gray-200">{{ $user->fullName }}</p>
                </div>

                <div class="mt-6 rounded-xl border border-gray-800 bg-gray-900/60 p-6">
                    <p class="text-sm text-gray-500">Bio</p>
                    <p class="mt-2 text-lg font-medium text-gray-200">{{ $user->profile->bio}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
