@extends('layout.layout')

@section('content')
    <div class="py-10 px-10 rounded">
        <!-- Sections -->
        @guest
            {{-- GUEST--}}
            <x-home.guest />
        @else
            {{-- Auth--}}
            <x-home.auth />
        @endguest
    </div>
@endsection