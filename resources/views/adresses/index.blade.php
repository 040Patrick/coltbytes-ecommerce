@extends('account.layout')

@section('account-content')
    <div class="flex flex-col">
        <!-- Header -->
        <div>
            <h1 class="text-4xl font-bold text-white">
                Addresses
            </h1>

            <div class="mt-3 h-1 w-16 rounded-full bg-amber-400"></div>

            <p class="mt-4 text-gray-400">
                Manage your saved addresses.
            </p>
        </div>

        <!-- Success message -->
        @if(session('address'))
            <div class="mt-8 rounded-xl border border-green-700 bg-green-900/40 px-4 py-3 text-center font-bold text-green-300">
                {{ session('address') }}
            </div>
        @endif

        <!-- Addresses -->
        <section class="mt-8 rounded-xl border border-gray-800 bg-gray-900/60 p-6">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-white">
                    Saved addresses
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Add, view, and manage your delivery addresses.
                </p>
            </div>

            @if($addresses->isEmpty())
                <div class="rounded-xl border border-dashed border-gray-700 bg-gray-950 p-8 text-center">
                    <p class="font-bold text-white">
                        You don't have any saved addresses.
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        Add an address to make checkout faster.
                    </p>

                    <div class="mt-6">
                        <x-address.modal-create
                            :countries="$countries"
                            :addresses="$addresses"
                        />
                    </div>
                </div>
            @else
                <div>
                    <x-address.modal-show
                        :countries="$countries"
                        :addresses="$addresses"
                    />
                </div>

                @if(auth()->user()->addresses->count() === 3)

                    <div class="mt-5 rounded-xl border border-amber-700/50 bg-amber-900/20 px-4 py-3">
                        <p class="text-center font-bold text-amber-300">
                            You can't have more than 3 addresses.
                        </p>
                    </div>

                @else

                    <div class="mt-6">
                        <x-address.modal-create
                            :countries="$countries"
                            :addresses="$addresses"
                        />
                    </div>
                @endif
            @endif
        </section>
    </div>
@endsection