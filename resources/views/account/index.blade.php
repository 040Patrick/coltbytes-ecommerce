@extends('account.layout')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-6 py-16">
        <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
            <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12">

                <div class="flex flex-col">
                    <!-- Page header -->
                    <div>
                        <h1 class="text-5xl font-bold text-white">
                            Account
                        </h1>

                        <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>

                        <p class="mt-6 text-gray-300">
                            Change you account informations.
                        </p>
                    </div>
                    <!-- Section -->
                    <section>
                        <p class="text-white font-bold w-full px-5 py-20 text-center">
                            Manage your account information, update your personal details, and keep your contact information up to date. From here, you can review and manage the information associated with your account.
                        </p>
                    </section>

                    <a href="{{ route('home') }}" class="text-black font-bold text-center bg-amber-400 rounded p-3 hover:bg-amber-300"> Home </a>
                </div>

            </div>
        </div> 
    </div>
@endsection