@extends('layout.layout')

@section('content')
    <!-- About page (made by IA) -->
    <div class="min-h-screen bg-amber-10 flex items-center justify-center px-6 py-16">

        <!-- Section -->
        <section class="w-full max-w-4xl bg-black text-white rounded-2xl px-8 py-12 md:px-14 md:py-10 shadow-xl">

            <!-- Page name -->
            <div class="mb-10">
                <h1 class="text-5xl font-bold">
                    About Us
                </h1>
                <div class="mt-4 h-1 w-20 bg-amber-400 rounded-full"></div>
            </div>

            <!-- About section  -->
            <div class="space-y-8">

                <!-- Section one -->
                <div>
                    <h2 class="text-2xl font-semibold mb-3">
                        Who we are
                    </h2>

                    <p class="text-gray-300 leading-7">
                        Welcome to our platform. We are focused on creating
                        simple, reliable and modern solutions for our users.
                    </p>
                </div>

                <!-- Section two -->
                <div>
                    <h2 class="text-2xl font-semibold mb-3">
                        Our goal
                    </h2>

                    <p class="text-gray-300 leading-7">
                        Our goal is to provide a clean and intuitive experience,
                        making it easier for people to access and use our services.
                    </p>
                </div>

                <!-- Section tree -->
                <div>
                    <h2 class="text-2xl font-semibold mb-3">
                        Why choose us?
                    </h2>

                    <p class="text-gray-300 leading-7">
                        We believe in simplicity, security and continuous
                        improvement. Everything we build is designed with
                        usability and reliability in mind.
                    </p>
                </div>
            </div>

            <!-- Back home -->
            <div class="mt-12">
                <a href="{{ route('home') }}" class="inline-block bg-amber-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-amber-300 transition">
                    Back to Home
                </a>
            </div>
        </section>
    </div>
@endsection