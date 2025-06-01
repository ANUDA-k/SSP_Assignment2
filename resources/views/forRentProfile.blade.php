<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-ZwI4uY7o8nnPbEeC+8N9hvRzUlHDCxFwM95ZzCRK0MCsWcNjsD5XJCIKybUB7l2J6kUbxyMQrs9m4GmrgM4zHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            theme:{
                extend:{
                    colors:{
                        'gray':{
                            '50':'#f9fafb',
                            '100':'#f3f4f6',
                            '200':'#e5e7eb',
                            '300':'#d1d5db',
                            '400':'#9ca3af',
                            '500':'#6b7280',
                            '600':'#4b5563',
                            '700':'#374151',
                            '800':'#1f2937',
                            '900':'#111827',
                            '950':'#030712',                         

                        },

                    },
                },
            },
        }
    </script>


</head>

<body>

<!-- Header -->
<header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center">
            <a href="#" class="w-16 h-16">
                <img src="{{ asset('img/logo top.png') }}" alt="Logo" class="w-full h-full object-cover rounded-md">
            </a>
        </div>
        <nav class="flex-1 tetx-sm text-green-800 mt-10">
            <ul class="flex justify-center space-x-10 text-lg" style="margine-top:20px;">
            <li><a href="{{ route('home') }}" class="hover:text-green-600">Home</a></li>
        <li><a href="{{ route('forsale') }}" class="hover:text-green-600">For Sale</a></li>
        <li><a href="{{ route('forrent') }}" class="hover:text-green-600">Rentals</a></li>
        <li><a href="{{ route('upcoming') }}" class="hover:text-green-600">Upcoming</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-green-600">About Us</a></li>
            </ul>
        </nav>
        <div class="flex items-center space-x-6">
            <div class="flex flex-col items-end space-y-2 text-green-400">
                <a href="{{ url('/login') }}" class="text-lg font-semibold hover:text-green-800">log In</a>
                <a href="{{ url('/register') }}" class="text-lg font-semibold hover:text-green-800">sign Up</a>
            </div>
            <a href="{{ url('/post-ad') }}" class="bg-red-700 text-white px-8 py-3 rounded-lg shadow-md text-lg font-bold">Post AD</a>
        </div>
    </div>
</header>

<!-- Full Width Image -->
<div class="relative h-64"> <!-- Try h-48 or h-56 for less height -->
    <img src="{{ asset($property->Images) }}" alt="Main Property Image" class="w-full h-full object-cover">
</div>

<!-- Title and Description -->
<div class="max-w-screen-lg mx-auto mt-6">
    <h1 class="text-3xl font-bold text-green-600">{{ $property->Topic }}</h1>
    <div class="flex items-center space-x-4 mt-4">
        <span>{{ $property->Rooms }} Rooms</span>
        <span>{{ $property->Bathrooms }} Bathrooms</span>
    </div>
    <p class="text-xl font-bold mt-4">Price: {{ $property->Price }}</p>
    <hr class="border-t-2 border-gray-300 my-6">
    <h2 class="text-xl font-semibold mb-4">Details</h2>
    <p class="text-gray-700">{!! nl2br(e($property->Description)) !!}</p>
</div>

<!-- Property Features -->
<section class="bg-white rounded-lg shadow-md p-6 mt-8 max-w-screen-lg mx-auto">
    <h2 class="text-lg font-semibold mb-4 text-center">PROPERTY FEATURES</h2>
    <div class="flex justify-center space-x-8">
        <div class="flex justify-center space-x-2">
            <span class="text-2xl"></span>
            <p>{{ $property->Bathrooms }} Bathrooms</p>
        </div>
        <div class="flex items-center space-x-2">
            <span class="text-2xl"></span>
            <p>Parking</p>
        </div>
        <div class="flex items-center space-x-8">
            <span class="text-2xl"></span>
            <p>Garden</p>
        </div>
    </div>
</section>

<!-- Contact Seller -->
<section class="bg-white rounded-lg shadow-md p-6 mt-8 max-w-screen-lg mx-auto">
    <h2 class="text-lg font-semibold mb-4 text-center">CONTACT SELLER</h2>
    <div class="flex justify-center space-x-8">
        <a href="tel:{{ $property->Contact }}" class="text-green-600">{{ $property->Contact }}</a>
        <a href="mailto:{{ $property->Email }}" class="text-green-600">{{ $property->Email }}</a>
    </div>
</section>

<!-- Hero Section -->
<section class="relative transform translate-y-10">
    <div class="h-[300px] bg-cover bg-center" style="background-image: url('{{ asset('img/images (3).jpg') }}');">
        <div class="absolute inset-0 bg-blue-800 opacity-40"></div>
    </div>
</section>
<div class="bg-white h-20"></div>

<!-- Footer -->
<footer class="bg-gray-200 py-12">
    <div class="container mx-auto px-6 flex flex-wrap justify-between gap-8">
        <!-- Discover -->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-4">Discover</h3>
            <ul class="space-y-2">
                <li><a href="{{ url('/forsale') }}" class="text-gray-600 hover:text-green-600">sale</a></li>
                <li><a href="{{ url('/forrent') }}" class="text-gray-600 hover:text-green-600">rentals</a></li>
                <li><a href="{{ url('/forsale') }}" class="text-gray-600 hover:text-green-600">apartments</a></li>
                <li><a href="{{ url('/forsale') }}" class="text-gray-600 hover:text-green-600">houses</a></li>
                <li><a href="{{ url('/forsale') }}" class="text-gray-600 hover:text-green-600">lands</a></li>
                <li><a href="{{ url('/login') }}" class="text-gray-600 hover:text-green-600">Log In</a></li>
                <li><a href="{{ url('/register') }}" class="text-gray-600 hover:text-green-600">Sign Up</a></li>
                <li><a href="{{ url('/postad') }}" class="text-gray-600 hover:text-green-600">Post Ad</a></li>
            </ul>
        </div>

        <!-- What's New -->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-2">What's New?</h3>
            <ul class="space-y-2">
                <li><a href="{{ url('/upcoming') }}" class="text-gray-600 hover:text-green-600">Upcoming</a></li>
                <li><a href="{{ url('/upcoming') }}" class="text-gray-600 hover:text-green-600">New Projects</a></li>
                <li><a href="{{ url('/upcoming') }}" class="text-gray-600 hover:text-green-600">Today's Market</a></li>
                <li><a href="{{ url('/upcoming') }}" class="text-gray-600 hover:text-green-600">Property News</a></li>
            </ul>
        </div>

        <!-- Help and Support -->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-4">Help and Support</h3>
            <ul class="space-y-2">
                <li><a href="{{ url('/aboutus') }}" class="text-gray-600 hover:text-green-600">About Us</a></li>
                <li><a href="{{ url('/aboutus') }}" class="text-gray-600 hover:text-green-600">Contact Us</a></li>
                <li><a href="{{ url('/aboutus') }}" class="text-gray-600 hover:text-green-600">Newsletter</a></li>
                <li><a href="{{ url('/aboutus') }}" class="text-gray-600 hover:text-green-600">Tools</a></li>
                <li><a href="{{ url('/aboutus') }}" class="text-gray-600 hover:text-green-600">Property Insider</a></li>
                <li><a href="{{ url('/aboutus') }}" class="text-gray-600 hover:text-green-600">Property Calculator</a></li>
            </ul>
        </div>

        <!-- Socials -->
        <div>
            <h3 class="text-lg font-bold mb-4">Socials</h3>
            <div class="grid grid-cols-2 gap-4 justify-center">
                <a href="#"><img src="{{ asset('img/facebook (1).png') }}" alt="Facebook" class="w-12 h-12 mx-auto hover:opacity-75 transition"></a>
                <a href="#"><img src="{{ asset('img/instagram (2).png') }}" alt="Instagram" class="w-12 h-12 mx-auto hover:opacity-75 transition"></a>
                <a href="#"><img src="{{ asset('img/whatsapp (1).png') }}" alt="WhatsApp" class="w-12 h-12 mx-auto hover:opacity-75 transition"></a>
                <a href="#"><img src="{{ asset('img/linkedin (1).png') }}" alt="LinkedIn" class="w-12 h-12 mx-auto hover:opacity-75 transition"></a>
            </div>
        </div>
    </div>

    <!-- Bottom Logo -->
    <div class="absolute py--10 right-16 mt-2">
        <img src="{{ asset('img/logo bottom.png') }}" alt="Logo" class="w-12 h-12">
    </div>

    <!-- Developer Credit -->
    <div class="mt-2">
        <p class="text-center text-gray-500 text-sm">
            Developed by Anuda Ranasinghe
        </p>
    </div>
</footer>

</body>
</html>
