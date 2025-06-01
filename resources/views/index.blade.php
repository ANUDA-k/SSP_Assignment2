<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<main>
    <div class="bg-gray-50">

    <!--Top AD section-->
    <!-- @php
    $topAd = \App\Models\TopAd::where('is_top', true)->latest()->first();
@endphp -->

<!-- @if ($topAd)
    <div class="container mx-auto px-6 py-6">
        <img src="{{ asset($topAd->File_Path) }}" alt="Top Ad" class="w-full h-auto object-cover rounded-md shadow-lg">
    </div>
@endif -->
<!-- @if ($topAd)
    <div class="container mx-auto px-6 py-6">
        <img src="{{ asset('storage/' . $topAd->File_Path) }}" alt="Top Ad" class="w-full h-auto object-cover rounded-md shadow-lg">
    </div>
@endif -->
@if(isset($latestTopAd) && $latestTopAd)
    <div class="top-ad-banner">
        <img src="{{ asset($latestTopAd->File_Path) }}" alt="Top Advertisement" class="w-full h-full object-cover rounded-md" />
    </div>
@endif

<!--featured section-->
<section class="container mx-auto px-6 py-12">
    <h2 class="text-2*1 font-bold text-center mb-8">featured</h2>
    <div class="flex justify-center">
        <img src="img/index1.jpg" alt="Featured Project" class="rounded-md shadow-lg">
    </div>
</section>

<!--New projects-->
<section class="container mx-auto px-8 py-12">
    <h2 class="text-2xl font-bold text-center mb-8">new projects</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
        <div class="flex justify-center items-center">
            <img src="img/index4.jpg" alt="oroject 1" class="rounded-md shadow-lg">   
        </div>
        <div class="flex justify-center items-centere">
            <img src="img/index2.jpg" alt="project 2" class="rounded-md shadow-lg">
        </div>
    </div>
</section>

<!--locations e=sections-->
<section class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-center mb-8">Our locations</h2>
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-4">
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Colombo</button>
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Negambo</button>
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Matara</button>
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Kandy</button>
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Battaramulla</button>
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Kollupititya</button>
        <button class="px-4 py-2 bg-white border border-gray-900 rounded-full shadow-lg hover:border-gray-400 trasnsition">Gampaha</button>
    </div>
</section>

<!--hero section-->
<!-- <section class="relative transform translate-y-10">
    <div class="h-[300px] bg-cover bg-center" style="background-image: url('img/images (3).jpg');">
        <div class="absolute inset-0 bg-blue-800 opacity-40"></div>
    </div>
</section> -->
@php
    $bottomAd = \App\Models\BottomAd::where('is_top', true)->first();
@endphp

@if($bottomAd)
<section class="relative transform translate-y-10">
    <div class="h-[300px] bg-cover bg-center"
         style="background-image: url('{{ asset($bottomAd->File_Path) }}');">
        <div class="absolute inset-0 bg-blue-800 opacity-40"></div>
    </div>
</section>
@endif
<div class="bg-white h-20"></div>"
</div>
</main>
<!--Footer-->
<footer class="bg-gray-200 py-12 ">
    <div class="container mx-auto px-6 flex flex-wrap justify-between gap-8">
        <!--Discover-->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-4">Discover</h3>
            <ul class="space-y-2">
            <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Sale</a></li>
                <li><a href="{{ route('forrent') }}" class="text-gray-600 hover:text-green-600">Rentals</a></li>
                <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Apartments</a></li>
                <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Houses</a></li>
                <li><a href="{{ route('forsale') }}" class="text-gray-600 hover:text-green-600">Lands</a></li>
                <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-green-600">Log In</a></li>
                <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-green-600">Sign Up</a></li>
                <li><a href="{{ route('ads.create') }}" class="text-gray-600 hover:text-green-600">Post Ad</a></li>
            </ul>
        </div>

         <!--Whats new-->
         <div class="mb-4">
            <h3 class="text-lg font-bold mb-2">What's New?</h3>
            <ul class="space-y-2">
            <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">Upcoming</a></li>
                <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">New Projects</a></li>
                <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">Today's Market</a></li>
                <li><a href="{{ route('upcoming') }}" class="text-gray-600 hover:text-green-600">Property News</a></li>
            </ul>
         </div>

        <!--Help and Support-->
        <div class="mb-4">
            <h3 class="text-lg font-bold mb-4">Help and Support</h3>
            <ul class="space-y-2">
            <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">About Us</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Contact Us</a></li>
                <li><a href="{{ route('about.subscribe') }}" class="text-gray-600 hover:text-green-600">Newsletter</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Tools</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Property Insider</a></li>
                <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Property Calculator</a></li>
            </ul>
        </div>
        <div>
      <h3 class="text-lg font-bold mb-4">Socials</h3>
      <div class="grid grid-cols-2 gap-4 justify-center">
        <a href="#" class="hover:opacity-75 transition">
          <img src="img/facebook (1).png" alt="Facebook" class="w-12 h-12 mx-auto">
        </a>
        <a href="#" class="hover:opacity-75 transition">
          <img src="img/instagram (2).png" alt="Instagram" class="w-12 h-12 mx-auto">
        </a>
        <a href="#" class="hover:opacity-75 transition">
          <img src="img/whatsapp (1).png" alt="WhatsApp" class="w-12 h-12 mx-auto">
        </a>
        <a href="#" class="hover:opacity-75 transition">
          <img src="img/linkedin (1).png" alt="LinkedIn" class="w-12 h-12 mx-auto">
        </a>
      </div>
    </div>
  </div>

<!--Bottom logo-->
<div class="absolute py--10 right-16 mt-2">
<img src="{{ asset('img/logo bottom.png') }}" alt="Logo" class="w-12 h-12">
</div>
</div>

<!--developer-->
<div class="mt-2">
    <p class="text-center text-gray-500 text-sm">
        Developed by Anuda Ranasinghe
    </p>
</div>
</footer>

    
</body>
</html>
