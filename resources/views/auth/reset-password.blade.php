@extends('layout.layout')

@section('content')
    <div class="flex justify-center items-center p-20">
        <div class="bg-black rounded p-15">

            <h2 class="text-center font-bold text-white text-2xl mb-5">
                RESET PASSWORD
            </h2>

            <form
                action="{{ route('password.update') }}"
                method="post"
                class="w-full p-4 border border-white rounded font-bold text-white"
            >
                @csrf

                <input
                    type="hidden"
                    name="token"
                    value="{{ $token }}"
                >

                @error('token')
                    <div class="bg-red-600 text-white text-center font-bold p-2 rounded mb-3">
                        {{ $message }}
                    </div>
                @enderror

                <!-- Email -->
                <div class="flex flex-col w-full border border-black py-1 px-3 outline-none">
                    <label for="email">
                        Email:
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', request()->email) }}"
                        placeholder="Email:"
                        class="p-2"
                    >

                    @error('email')
                        <div class="text-red-600 text-center font-bold p-2 rounded">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="flex flex-col w-full border border-black py-1 px-3 outline-none">
                    <label for="password">
                        New Password:
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="New Password:"
                        class="p-2"
                    >

                    @error('password')
                        <div class="text-red-600 text-center font-bold p-2 rounded">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="flex flex-col w-full border border-black py-1 px-3 outline-none">
                    <label for="password_confirmation">
                        Confirm Password:
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Confirm Password:"
                        class="p-2"
                    >

                    @error('password_confirmation')
                        <div class="text-red-600 text-center font-bold p-2 rounded">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full p-2 mt-3 text-black rounded text-center font-bold bg-white"
                >
                    Reset Password
                </button>
            </form>
        </div>
    </div>
@endsection