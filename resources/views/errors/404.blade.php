@extends('layout.layout')

@section('content')
    <div class="min-h-screen bg-amber-50 flex items-center justify-center px-10">
        <section class="bg-black text-white rounded-2xl px-10 py-16 md:px-20 text-center max-w-2xl w-full">
            <p class="text-white font-bold text-lg mb-4">ERROR</p>

            <h1 class="text-5xl text-amber-400 md:text-5xl font-black tracking-tight">
                404
            </h1>

            <h2 class="text-3xl md:text-4xl font-bold mt-6">
                Page not found
            </h2>

            <p class="text-gray-400 text-lg mt-4 max-w-md mx-auto py-5">
                The page you're looking for doesn't exist or may have been moved.
            </p>
            
            <a href="{{ route('home') }}" class="inline-block mt-8 bg-amber-400 text-black font-bold px-8 py-3 rounded-lg hover:bg-amber-300 transition">
                Back to home
            </a>
        </section>
    </div>
@endsection