@extends('layout.layout')

@section('content')
    <div class="mt-30 mx-30 bg-black rounded-2xl">
        <!-- Return button -->
        <div class="flex">
            <a href="{{ route('admin.index') }}" class="bg-amber-400 p-3 px-10 mt-10 mx-10 hover:bg-amber-300text-black text-center font-bold rounded">
                Back
            </a>
        </div>
        <section class="py-5 m-5">
            <!-- Header -->
            <div class="px-10 py-10">
                <h1 class="text-4xl font-bold text-white">
                    Admin Panel
                </h1>

                <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                <p class="mt-2 mb-2 text-gray-500">
                    Manage or see your Users.
                </p>
            </div>

            @session('roles')
                <div class="bg-green-600 text-white text-center font-bold p-2 rounded">
                    {{ session('roles')}}
                </div>
            @endsession

            <!-- Users -->
            @foreach($users as $user)
                <div class="m-5">
                    
                    <div class="flex flex-col gap-5 bg-white rounded py-10">

                        <p class="text-blue-700 px-10 font-bold"><strong class="text-black">User: </strong> {{ $user->fullName }}</p>
                        <!-- EMAIL -->
                        <p class="text-amber-600 px-10 font-bold"> <strong class="text-black">Email: </strong>{{ $user->email }} 
                            @if($user->email_verified_at)
                                <span class="text-green-600 px-10 font-bold">Verified</span>
                            @else 
                                <span class="text-red-600 px-10 font-bold">'Not verified'</span>
                            @endif
                        </p>

                        <!-- actions -->
                        <div class="flex gap-5 items-center">
                            <!-- Roles -->
                            <x-admin.users.roles :user="$user" :roles="$roles"/>
                            
                            <!-- Show orders from this user -->
                            <x-admin.users.orders :user="$user"/>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection