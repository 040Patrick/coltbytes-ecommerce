@extends('layout.layout')

@section('content')
<!-- Login page(made by ia) -->
    <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
        <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12">

            <!-- Page header -->
            <div class="mb-10">
                <h1 class="text-5xl font-bold text-white">
                    Login
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-6 text-gray-300">
                    Log-in using your account.
                </p>
            </div>

            <!-- Error message -->
            @error('error')
                <div class="mb-6 rounded bg-red-600 p-3 text-center font-bold text-white">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form -->
            <form action="{{ route('login.store') }}" method="POST"class="space-y-6">
                @csrf
                <!-- Email -->
                <div>
                    <label for="email" class="mb-2 block font-semibold text-white">
                        Email
                    </label>

                    <input type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

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

                <!-- Remember / Forgot password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex cursor-pointer items-center gap-2 text-gray-300">
                        <input type="checkbox" name="remember" id="remember"class="accent-amber-400">
                        Remember me
                    </label>

                    <a href="{{ route('password.request') }}"class="text-gray-300 transition hover:text-amber-400 hover:underline">
                        Forgot Password?
                    </a>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full rounded-lg bg-amber-400 px-7 py-3 font-bold text-black transition hover:bg-amber-300">
                    Login
                </button>
            </form>

            <!-- Register -->
            <div class="mt-8 border-t border-gray-800 pt-6 text-center">
                <p class="text-gray-400">
                    Don't have an account yet?
                    <a href="{{ route('register.index') }}" class="font-semibold text-amber-400 hover:underline">
                        Create one
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection