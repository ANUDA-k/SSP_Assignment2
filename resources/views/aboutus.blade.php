
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                            950: '#030712',
                        },
                    },
                },
            },
        }
    </script>
</head>
<body>
<main>

<!-- Header -->
</head>
<body class="bg-gray-50">

<header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center">
        <div class="flex items-center">
            <a href="#" class="w-16 h-16">
               <img src="{{ asset('img/logo top.png') }}" alt="Logo" class="w-full h-full object-cover rounded-md">
            </a>
        </div>
            </div>
            <nav class="flex-1">
    <ul class="flex justify-center space-x-10 text-lg text-green-800">
        <li><a href="{{ route('home') }}" class="hover:text-green-600">Home</a></li>
        <li><a href="{{ route('forsale') }}" class="hover:text-green-600">For Sale</a></li>
        <li><a href="{{ route('forrent') }}" class="hover:text-green-600">Rentals</a></li>
        <li><a href="{{ route('upcoming') }}" class="hover:text-green-600">Upcoming</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-green-600">About Us</a></li>
    </ul>
</nav>
            <div class="flex items-center space-x-6">
                <div class="flex flex-col items-end space-y-2 text-green-600">
                    <a href="{{ route('login') }}" class="text-lg font-semibold hover:text-green-800">log In</a>
                    <a href="{{ route('register') }}" class="text-lg font-semibold hover:text-green-800">sign Up</a>
                </div>
                <a href="{{ route('ads.create') }}" class="bg-red-700 text-white px-8 py-3 rounded-lg shadow-md text-lg font-bold">Post AD</a>
            </div>
        </div>
    </div>
</header>

<!-- Top Ad Section -->
@if(isset($latestTopAd) && $latestTopAd)
    <div class="top-ad-banner">
        <img src="{{ asset($latestTopAd->File_Path) }}" alt="Top Advertisement" class="w-full h-full object-cover rounded-md" />
    </div>
@endif

<!-- Newsletter Form Overlay -->
<div class="absolute inset-0 flex items-center justify-center z-0">
    <form class="bg-white shadow-md rounded-lg p-4 flex space-x-2">
        <input type="text" placeholder="Location" class="border border-gray-300 rounded-md p-2 w-48">
        <input type="text" placeholder="Type" class="border border-gray-300 rounded-md p-2 w-48">
        <button type="submit" class="bg-green-500 rounded-md px-4 py-2">Search</button>
    </form>
</div>

<!-- About Us + Newsletter Section -->
<section class="py-16 flex justify-center items-center">
    <div class="bg-white w-[600px] h-[800px] p-4 rounded-lg shadow-md flex flex-col">
        <img src="{{ asset('img/logo top.png') }}" alt="agency 2" class="w-full h-[60%] object-cover rounded mb-4">
        <h3 class="text-lg font-semibold text-center">SUBSCRIBE TO OUR NEWSLETTER</h3>

        <!-- Success/Error Alerts -->
        @if(session('success'))
            <script>alert('{{ session('success') }}');</script>
        @endif
        @if(session('error'))
            <script>alert('{{ session('error') }}');</script>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('about.subscribe') }}" class="mt-6 flex flex-col items-center">
            @csrf
            <input type="email" name="email" placeholder="Your Email" class="border-gray-300 border rounded-md p-2 w-full max-w-md mb-4">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-yellow-700">SUBSCRIBE</button>
        </form>
    </div>
</section>

<!-- Hero Section -->
@php
    $bottomAd = \App\Models\BottomAd::where('is_top', true)->first();
@endphp

@if($bottomAd)
<section class="relative transform translate-y-10">
    <div class="h-[300px] bg-cover bg-center"
         style="background-image: url('{{ asset($bottomAd->File_Path) }}');">
       
</section>
@endif
<div class="bg-white h-20"></div>"
</div>

<!-- Footer -->
<footer class="bg-gray-200 py-12 mt-10">
    <div class="container mx-auto px-6 flex flex-wrap justify-between gap-8">
        <!-- Discover -->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-4">Discover</h3>
            <ul class="space-y-2">
            <li><a href="{{ route('forrent') }}" class="text-gray-600 hover:text-green-600">Rentals</a></li>
                <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Apartments</a></li>
                <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Houses</a></li>
                <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Lands</a></li>
                <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-green-600">Log In</a></li>
                <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-green-600">Sign Up</a></li>
                <li><a href="{{ route('ads.create') }}" class="text-gray-600 hover:text-green-600">Post Ad</a></li>
                <li><a href="#" class="text-gray-600 hover:text-green-600">Post Ad</a></li>
            </ul>
        </div>

        <!-- What's New -->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-2">What's New?</h3>
            <ul class="space-y-2">
            <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">New Projects</a></li>
                <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">Today's Market</a></li>
                <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">Property News</a></li>
            </ul>
        </div>

        <!-- Help and Support -->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-4">Help and Support</h3>
            <ul class="space-y-2">
            <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Contact Us</a></li>
                <li><a href="{{ route('about.subscribe') }}" class="text-gray-600 hover:text-green-600">Newsletter</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Tools</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Property Insider</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Property Calculator</a></li>
            </ul>
        </div>

        <!-- Socials -->
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

    <!-- Bottom logo -->
    <div class="absolute py--10 right-16 mt-2">
        <img src="{{ asset('img/logo bottom.png') }}" alt="Logo" class="w-12 h-12">
    </div>

    <!-- Developer Credit -->
    <div class="mt-2">
        <p class="text-center text-gray-500 text-sm">Developed by Anuda Ranasinghe</p>
    </div>
</footer>

</main>
</body>
</html>
