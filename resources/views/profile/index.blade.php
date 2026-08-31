@extends('layout.layout')

@section('content')
<!-- Profile page(MADE BY IA) -->
    <div class="min-h-screen mt-30 py-14 px-6">
        <div class="mx-auto max-w-4xl overflow-hidden rounded-2xl bg-black shadow-2xl">

            <div class="py-5 flex justify-center px-10 ">
                @session('updated')
                    <span class="bg-green-600 text-white text-center rounded font-bold p-2 w-full">{{ session('updated') }}</span>
                @endsession
            </div>
            
            <!-- SECTION -->
            <div class="border-b border-gray-800 px-10 py-8">
                <div class="flex items-center gap-6">
                    <!-- Avatar -->
                    <div class="flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-full border-4 border-amber-400 bg-gray-800">
                        <img
                            src="{{ $profile->avatar
                                ? \Illuminate\Support\Facades\Storage::url($profile->avatar)
                                : \Illuminate\Support\Facades\Storage::url('avatars/default-avatar.jpg') }}"
                            alt="Profile avatar"
                            class="h-full w-full object-cover">
                    </div>

                    <!-- Avatar -->
                    <div class="py-4">
                        <form action="{{ route('profile.destroy', $profile) }}" method="post">
                            @csrf 
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete your avatar?')" class="flex h-8 w-8 items-center justify-center rounded-full bg-black/70 text-white transition hover:bg-red-600" title="Delete avatar">
                            <x-icons.trash-can />
                        </form>
                    </div>
                
                    <!-- User info -->
                    <div>
                        <h1 class="text-3xl font-bold text-white">
                            
                        </h1>
                        <p class="mt-1 text-white text-2xl font-bold">
                            {{ Auth()->user()->fullName }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div class="px-10 py-8">

                <h2 class="text-3xl font-bold text-white">
                    Profile
                </h2>

                <div class="mt-2 h-1 w-16 bg-amber-400"></div>

                <p class="mt-5 text-sm leading-6 text-gray-400">
                    Manage your personal information and profile details.
                </p>

                    <form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data" class="mt-8">
                        @csrf
                        @method('PATCH')
                        <div class="grid gap-6 md:grid-cols-2">
                            <!-- Switch Avatar -->
                            <div>
                                <label for="avatar" class="mb-2 block text-sm font-bold text-white">
                                    Avatar
                                </label>

                                <input id="avatar" name="avatar" type="file" accept="image/*" class="w-full rounded-md border border-gray-700 bg-[#111827] px-4 py-3 text-sm text-gray-400 file:mr-4 file:rounded-md file:border-0 file:bg-amber-400 file:px-4 file:py-2 file:font-bold file:text-black">

                                @error('avatar')
                                    <p class="mt-1 text-sm text-red-400 text-center font-bold">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="mt-6">
                            <label for="bio" class="mb-2 block text-sm font-bold text-white">
                                Bio
                            </label>

                            <textarea id="bio" name="bio" rows="5" placeholder="Tell us a little about yourself..." 
                            class="w-full resize-none rounded-md border border-gray-700 bg-[#111827] px-4 py-3 text-white outline-none transition placeholder:text-gray-600 focus:border-amber-400"> {{ auth()->user()->profile->bio }}</textarea>

                            @error('bio')
                                <p class="mt-1 text-sm text-red-400 text-center font-bold">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <!-- Actions -->
                        <div class="mt-8 flex items-center justify-between">

                            <a href="{{ route('home') }}" class="text-sm text-gray-400 transition hover:text-white">
                                Back
                            </a>

                            <button type="submit" class="rounded-lg bg-amber-400 px-6 py-3 font-bold text-black transition hover:bg-amber-300">
                                Save Changes
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection