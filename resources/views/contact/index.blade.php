@extends('layout.layout')

@section('content')
    <!-- Contact form(made by IA) -->
    <div class="min-h-screen flex items-center justify-center">
        <section class="w-full max-w-4xl bg-black text-white rounded-2xl px-10 py-10 shadow-xl">
    
            <!-- Success Message -->
            <div class="p-5">
                @session('contact')
                    <div class="bg-green-600 text-white font-bold p-2 rounded text-center"> {{ session('contact')}} </div>
                @endsession
            </div>
            <!-- Page name -->
            <div class="mb-10">
                <h1 class="text-5xl font-bold">
                    Contact Us
                </h1>

                <div class="mt-4 h-1 w-20 bg-amber-400 rounded-full"></div>

                <p class="mt-6 text-gray-300 leading-7 max-w-2xl">
                    Have a question, suggestion or need some help?
                    Send us a message and we'll get back to you as soon as possible.
                </p>
            </div>
            <!-- Form -->
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @method('post')
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 font-semibold">Name</label> 
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Your name" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition">

                    @error('name')
                        <p class="mt-2 text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 font-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition">

                    @error('email')
                        <p class="mt-2 text-red-400 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block mb-2 font-semibold">Subject</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" placeholder="What is this about?" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition">

                    @error('subject')
                        <p class="mt-2 text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block mb-2 font-semibold">Message</label>
                    <textarea name="message" id="message" rows="6" placeholder="Write your message..." class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition resize-none" >{{ old('message') }}
                    </textarea>

                    @error('message')
                        <p class="mt-2 text-red-400 text-sm"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="pt-4 flex items-center justify-between">
                    <!-- Back home -->
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition"> Back </a>

                    <!-- Submit form -->
                    <button type="submit" class="bg-amber-400 text-black font-semibold px-7 py-3 rounded-lg hover:bg-amber-300 transition">
                        Send Message
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection