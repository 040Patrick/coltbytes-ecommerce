@extends('layout.layout')

@section('content')
    <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
        <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12">
            <!-- Page header -->
            <div class="mb-10">
                <h1 class="text-5xl font-bold text-white">
                    Register
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-6 text-gray-300">
                    Create an account and log-in.
                </p>
            </div>

            <!-- Form -->
            <form action="{{ route('register.store') }}" method="POST" class="space-y-5" >
                @csrf
                @method('POST')
                <!-- First name -->
                <div>
                    <label for="first_name" class="mb-2 block font-semibold text-white">
                        First Name
                    </label>

                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Enter your first name" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                    <div class="mt-2 min-h-6">
                        @error('first_name')
                            <p class="text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Last name -->
                <div>
                    <label for="last_name" class="mb-2 block font-semibold text-white">
                        Last Name
                    </label>

                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400" >

                    <div class="mt-2 min-h-6">
                        @error('last_name')
                            <p class="text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="mb-2 block font-semibold text-white">
                        Email
                    </label>

                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                    <div class="mt-2 min-h-6">
                        @error('email')
                            <p class="text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="mb-2 block font-semibold text-white">
                        Password
                    </label>

                    <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                    <div class="mt-2 min-h-6">
                        @error('password')
                            <p class="text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Password confirmation -->
                <div>
                    <label for="password_confirmation" class="mb-2 block font-semibold text-white">
                        Confirm Password
                    </label>

                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                    <div class="mt-2 min-h-6">
                        @error('password_confirmation')
                            <p class="text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full rounded-lg bg-amber-400 px-7 py-3 font-bold text-black transition hover:bg-amber-300">
                    Register
                </button>
            </form>

            <!-- Login -->
            <div class="mt-8 border-t border-gray-800 pt-6 text-center">
                <p class="text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-amber-400 hover:underline">
                        Log in
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection