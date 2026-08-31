@extends('account.layout')

@section('content')
    <!-- Addresses -->
    <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
        <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12 mb-5">

            <!-- Page header -->
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

            <!-- Manage Addresses -->
            @if($addresses->isEmpty())
                <!-- Create --> 

                @session('address')
                    <div class="bg-green-600 text-white text-center font-bold p-2">{{ session('address') }}</div>
                @endsession

                <div x-data="{add: false}" >

                    <button type="button" @click="add=true" x-show="!add" class="bg-amber-400 p-2 px-5 mt-5 rounded text-center font-bold w-full text-center">
                        Add
                    </button>

                    <div x-show="add">
                        
                        <x-addresses.form :countries="$countries" title="Add Address" button="Create"/>

                        <button type="button" @click="add = false" class="mt-4 font-black bg-red-600 hover:bg-red-500 w-full p-2 rounded cursor-pointer">
                            Cancel
                        </button>
                    </div>
                </div>
            @else 
                <!-- Show --> 
                @foreach($addresses as $address)
                    <div class="bg-white rounded mt-5 flex items-start">
                        <div class="bg-white p-5 rounded-2xl flex-1 min-w-0 flex flex-col justify-between text-black font-bold text-lg ">
                            <p class="text-2xl" >{{ $address->street }} - {{ $address->number}}</p>
                            <p class="text-2xl" >{{ $address->neighborhood }}</p>
                            <p class="text-2xl" >{{ $address->city }} - {{ $address->state}}</p>
                            <p class="text-2xl" >{{ $address->postal_code }}</p>

                            <div class="p-5 mt-5">
                                <x-addresses.dropdown :countries="$countries" :address="$address" title="Edit address"/>
                            </div>
                        </div>

                    </div>
                @endforeach
                    @if(auth()->user()->addresses->count() === 3)
                        <div class="mt-5"> 
                            <p class="mt-5 text-center font-bold text-white py-2">
                                You can't have more than 3 addresses.
                            </p>
                        </div>
                    @else 
                        <!-- Create --> 
                        <div x-data="{add: false}" >

                            <button type="button" @click="add=true" x-show="!add" class="bg-amber-400 p-2 px-5 mt-5 rounded text-center font-bold w-full text-center">
                                Add
                            </button>

                            <div x-show="add">

                                 <div class="bg-black rounded-2xl">
                                    <div class="mt-10">

                                        <!-- Title -->
                                        <div >
                                            <h1 class="text-white font-bold text-2xl text-center py-5 underline">
                                                Create
                                            </h1>
                                        </div>

                                        <!-- Form -->
                                        <form action="{{ route('addresses.store') }}" method="post" class="bg-black px-5 flex flex-col">
                                            @csrf 
                                            @method('post')
                                                
                                            <x-addresses.form :countries="$countries" button="Add new Address"/>
                                        </form>
                                    </div>
                                </div>

                                <button type="button" @click="add = false" class="mt-4 font-black bg-red-600 hover:bg-red-500 w-full p-2 rounded cursor-pointer">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    @endif
            @endif

        </div>
    </div>
@endsection


