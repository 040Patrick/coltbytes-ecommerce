@extends('account.layout')

@section('content')
<!-- User -->
<div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
    <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12">
            <!-- Title -->
            <div>
                <h1 class="text-5xl font-bold text-white">
                    User
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-6 text-gray-300">
                    Change your user informations.
                </p>
            </div>

            <!-- Success message -->
            <div class="py-5 flex justify-center px-10">
                @session('updated')
                    <span class="bg-green-600 text-white text-center rounded font-bold p-2 w-full">{{ session('updated') }}</span>
                @endsession
            </div>

            <!-- Form -->
            <div class="flex px-5">
                <form action="{{ route('user.update', auth()->user()) }}" method="post">
                    @csrf 
                    @method('patch')

                    <!-- Email -->
                    <div class="py-3">
                        <label for="mail" class="mb-2 block font-semibold text-white">
                            Email
                        </label>
                            
                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ) }}" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">

                        @error('email')
                            <span class="w-fit rounded p-2 text-red-600 text-center py-2 font-bold"> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- First Name -->
                    <div class="flex gap-5">
                        <div class="py-5">
                            <label for="first_name" class="mb-2 block font-semibold text-white">
                                First Name
                            </label>
                            
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', auth()->user()->first_name ) }}" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">
                            @error('first_name')
                                <span class="w-fit rounded p-2 text-red text-center py-2 font-bold"> {{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Last name -->
                        <div class="py-5">
                            <label for="last_name" class="mb-2 block font-semibold text-white">
                                Last Name
                            </label>
                            
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', auth()->user()->last_name ) }}" class="w-full rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition placeholder:text-gray-500 focus:border-amber-400">
                        </div>
                        @error('last_name')
                            <span class="w-full rounded p-2 text-red text-center py-2 font-bold"> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Action -->
                    <button type="submit" class="w-full rounded-lg bg-amber-400 px-7 py-3 font-bold text-black transition hover:bg-amber-300">
                        Save
                    </button>
                </form>
            </div>

            <!-- Delete Confirmation -->
            <x-user.modal-delete :user="auth()->user()"/>
    </div>
</div>
@endsection