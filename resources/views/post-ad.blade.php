@extends('layouts.app')

@section('content')

<header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="w-16 h-16">
                <img src="{{ asset('img/logo top.png') }}" alt="Logo" class="w-full h-full object-cover rounded-md">
            </a>
        </div>
        <nav class="flex-1 text-green-800 mt-10">
            <ul class="flex justify-center space-x-10 text-lg">
                <li><a href="{{ url('/') }}" class="hover:text-green-600">Home</a></li>
                <li><a href="{{ url('/for-sale') }}" class="hover:text-green-600">For Sale</a></li>
                <li><a href="{{ url('/for-rent') }}" class="hover:text-green-600">Rentals</a></li>
                <li><a href="{{ url('/upcoming') }}" class="hover:text-green-600">Upcoming</a></li>
                <li><a href="{{ url('/about-us') }}" class="hover:text-green-600">About Us</a></li>
            </ul>
        </nav>
        <div class="flex items-center space-x-6">
            <div class="flex flex-col items-end space-y-2 text-green-400">
                <a href="{{ url('/login') }}" class="text-lg font-semibold hover:text-green-800">Log In</a>
                <a href="{{ url('/register') }}" class="text-lg font-semibold hover:text-green-800">Sign Up</a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container mx-auto mt-10">
        <!-- Form Section -->
        <div class="max-w-2xl mx-auto bg-white border rounded-lg shadow-md px-6 py-6 space-y-6">
            <div class="flex justify-center mb-6">
                <a href="#" class="w-16 h-16">
                    <img src="{{ asset('img/logo top.png') }}" alt="Logo" class="w-full h-full object-cover rounded-md">
                </a>
            </div>

            <!-- Livewire Form Component -->
            @livewire('post-ad')
        </div>

        <!-- Livewire Property Cards Section -->
      
    </div>
</main>

<footer class="bg-gray-200 py-12 mt-10">
    <div class="container mx-auto px-6 flex flex-wrap justify-between gap-8">

        

        <div>
            <h3 class="text-lg font-bold mb-4">Socials</h3>
            <div class="grid grid-cols-2 gap-4 justify-center">
                <a href="#"><img src="{{ asset('img/facebook (1).png') }}" alt="Facebook" class="w-12 h-12 mx-auto"></a>
                <a href="#"><img src="{{ asset('img/instagram (2).png') }}" alt="Instagram" class="w-12 h-12 mx-auto"></a>
                <a href="#"><img src="{{ asset('img/whatsapp (1).png') }}" alt="WhatsApp" class="w-12 h-12 mx-auto"></a>
                <a href="#"><img src="{{ asset('img/linkedin (1).png') }}" alt="LinkedIn" class="w-12 h-12 mx-auto"></a>
            </div>
        </div>
    </div>

    <div class="absolute py--10 right-16 mt-2">
        <img src="{{ asset('img/logo bottom.png') }}" alt="Logo" class="w-12 h-12">
    </div>

    <div class="mt-2">
        <p class="text-center text-gray-500 text-sm">
            Developed by Anuda Ranasinghe
        </p>
    </div>
</footer>

@endsection



