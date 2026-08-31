@extends('layout.layout')

@section('content')
    <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
        <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12">
            <!-- Page header -->
            <div class="mb-10">
                <h1 class="text-5xl font-bold text-white">
                    Forgot Password
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-6 text-gray-300">
                    Enter your email and we'll send you a password reset link.
                </p>
            </div>

            <!-- Status message -->
            @session('status')
                <div class="mb-6 rounded bg-green-600 p-3 text-center font-bold text-white">
                    {{ session('status') }}
                </div>
            @endsession

            <!-- Error message -->
            @error('email')
                <div class="mb-6 rounded bg-red-600 p-3 text-center font-bold text-white">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form -->
            <form
                action="{{ route('password.email') }}"
                method="POST"
                class="space-y-6"
            >
                @csrf

                <!-- Email -->
                <div>
                    <label
                        for="email"
                        class="mb-2 block font-semibold text-white"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400"
                    >
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full rounded-lg bg-amber-400 px-7 py-3 font-bold text-black transition hover:bg-amber-300"
                >
                    Send Password Reset Link
                </button>

            </form>

            <!-- Back to Login -->
            <div class="mt-8 border-t border-gray-800 pt-6 text-center">
                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-amber-400 transition hover:underline"
                >
                    Back to Login
                </a>
            </div>
        </div>
    </div>
@endsection