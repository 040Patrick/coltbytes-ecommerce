@extends('account.layout')

@section('account-content')
    <div class="flex flex-col">
        <!-- Header -->
        <div>
            <h1 class="text-4xl font-bold text-white">
                User
            </h1>

            <div class="mt-3 h-1 w-16 rounded-full bg-amber-400"></div>

            <p class="mt-4 text-gray-400">
                Manage your personal information.
            </p>
        </div>

        @session('updated')
            <div class="rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center font-bold text-green-300">
                {{ session('updated') }}
            </div>
        @endif

        @session('phone')
            <div class="rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center font-bold text-green-300">
                {{ session('phone') }}
            </div>
        @endif
            
        <!-- Personal information -->
        <section class="mt-8 rounded-xl border border-gray-800 bg-gray-900/60 p-6">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-white">
                    Personal information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Update your name and email address.
                </p>
            </div>

            <form action="{{ route('user.update', auth()->user()) }}" method="post">
                @csrf
                @method('patch')

                <!-- Email -->
                <div>
                    <label for="email" class="mb-2 block font-semibold text-white">
                        Email
                    </label>

                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                    @error('email')
                        <span class="mt-2 block font-bold text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Name -->
                <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">

                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="mb-2 block font-semibold text-white">
                            First Name
                        </label>

                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                        @error('first_name')
                            <span class="mt-2 block font-bold text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="mb-2 block font-semibold text-white">
                            Last Name
                        </label>

                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', auth()->user()->last_name) }}"class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                        @error('last_name')
                            <span class="mt-2 block font-bold text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>

                <!-- Actions -->
                <div class="mt-6 flex gap-3 items-center ">
                    <button type="submit" class="rounded-lg bg-amber-400 py-3 mt-3 font-bold text-black transition hover:bg-amber-300 w-full max-w-xl px-10">
                        Save changes
                    </button>
                </div>
            </form>

            <x-user.modal-delete :user="auth()->user()" />
        </section>

        <!-- Phone -->
        <section class="mt-6 rounded-xl border border-gray-800 bg-gray-900/60 p-6">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-white">
                    Phone
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Manage your phone number.
                </p>
            </div>

            <form action="{{ route('phone.store') }}" method="post">
                @csrf
                <div>
                    <label for="phone" class="mb-2 block font-semibold text-white">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        value="{{ old('phone', auth()->user()->phone) }}"
                        placeholder="(00) 0000-0000"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400"
                    >

                    @error('phone')
                        <span class="mt-2 block font-bold text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                @if(!auth()->user()->phone)
                    <button
                        type="submit"
                        class="mt-6 rounded-xl bg-amber-400 px-7 py-3 font-bold text-black transition hover:bg-amber-300"
                    >
                        Save phone
                    </button>
                @endif
            </form>

            @if(auth()->user()->phone)
                <div class="mt-4">
                    <x-phone.modal-delete />
                </div>
            @endif
        </section>
    </div>
@endsection