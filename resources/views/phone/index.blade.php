@extends('account.layout')

@section('content')
    <!-- Phone Page -->
    <div class="flex min-h-[80vh] items-center justify-center px-6 py-16">
        <div class="w-full max-w-xl rounded-lg bg-black px-10 py-12">
        <!-- Page header -->
        <div>
            <h1 class="text-5xl font-bold text-white">
                Phone
            </h1>

            <div class="mt-4 h-1 w-20 rounded-full bg-amber-400"></div>
                <p class="mt-6 text-gray-300">
                    Add or change your phone number.
                </p>
            </div>

            <div class="py-5 flex justify-center px-10 ">
                @session('phone')
                    <span class="bg-green-600 text-white text-center rounded font-bold p-2 w-full">{{ session('phone') }}</span>
                @endsession
            </div>
        
            
            <!-- Form -->
            <div class="w-full">
                @if(auth()->user()->phone)
                    <form action="{{ route('phone.update', auth()->user()->phone) }}" method="post">
                    @csrf
                    @method('PATCH')
                @else 
                    <form action="{{ route('phone.store') }}" method="post">
                        @csrf
                        @method('POST')
                @endif

                    <label for="phone" class="mb-2 block font-semibold text-white">
                        Phone
                    </label>

                    @error('phone')
                        <p class="text-red-600 font-bold text-center p-2">{{ $message }}</p>
                    @enderror
                    <div class="flex w-full gap-3 pb-3">
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone->phone ?? '') }}" class="flex-1 rounded border border-gray-700 bg-gray-900 px-4 py-3 text-white outline-none transition focus:border-amber-400" placeholder="(00) 0000-0000">
                    <!-- Actions -->
                        <div>
                            <button type="submit" class="shrink-0 rounded-lg bg-amber-400 px-8 py-3 font-bold text-black transition hover:bg-amber-300">
                                Save
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Delete -->
                @if(auth()->user()->phone)
                    <x-phone.modal-delete :phone="auth()->user()->phone" />
                @endif
            </div>
        </div>
    </div>
@endsection