@extends('account.layout')

@section('content')
    <!-- Addresses -->
    <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
        <div class="w-full max-w-xl rounded-xl bg-gray-950 px-10 py-12 mb-5">

            <!-- Title -->
            <div class="flex flex-col">
                <div>
                    <h1 class="text-5xl font-bold text-white">
                        Addresses
                    </h1>

                    <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                    <p class="mt-6 text-gray-300">
                        Manage your addresses.
                    </p>
                </div>
            </div>

        <div></div>
            <!-- Address messages -->
            @session('address')
                <div class="bg-green-600 text-white text-center rounded mt-5 mb-5 font-bold p-2">{{ session('address') }}</div>
            @endsession

            <!-- Manage Addresses -->
            @if($addresses->isEmpty())
                <x-address.modal-create :countries="$countries" :addresses="$addresses"/>
                
            @else 
                <!-- Show --> 
                <x-address.modal-show :countries="$countries"  :addresses="$addresses"/>

                @if(auth()->user()->addresses->count() === 3)
                    <div class="mt-5"> 
                        <p class="mt-5 text-center font-bold text-white py-2">
                            You can't have more than 3 addresses.
                        </p>
                    </div>
                @else 
                    <x-address.modal-create :countries="$countries" :addresses="$addresses"/>
                @endif
            @endif
        </div>
    </div>
@endsection


