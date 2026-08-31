@extends('layout.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-10">
        <!-- Section -->
        <section class="bg-black text-white rounded-2xl px-10 py-16 md:px-20 text-center max-w-2xl w-full">

            <p class="text-amber-400 font-bold text-lg mb-4">
                VERIFY YOUR EMAIL
            </p>

            <h1 class="text-4xl md:text-5xl font-black">
                Check your inbox
            </h1>

            <p class="text-gray-400 text-lg mt-6 max-w-lg mx-auto">
                Before continuing, please verify your email address by clicking
                the link we sent to your inbox.
            </p>

            <p class="text-gray-500 mt-3">
                Didn't receive the email?
            </p>

            <form action="{{ route('verification.send') }}" method="POST" class="mt-6">
                @csrf

                <button type="submit"
                    class="bg-amber-400 text-black font-bold px-8 py-3 rounded-lg
                        hover:bg-amber-300 transition">
                    Resend verification email
                </button>
            </form>

            @if (session('message'))
                <p class="text-green-400 font-semibold mt-6">
                    {{ session('message') }}
                </p>
            @endif

        </section>

    </div>
@endsection