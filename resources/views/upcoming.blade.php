<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming</title>
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

<!-- Top AD section -->
@if(isset($latestTopAd) && $latestTopAd)
    <div class="w-full overflow-hidden">
        <img src="{{ asset($latestTopAd->File_Path) }}"
             alt="Top Advertisement"
             class="w-full h-full object-cover rounded-md" />
    </div>
@endif

<!-- Featured section -->
<section class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-center mb-8">Today's Market</h2>
    <div class="flex justify-center">
        <img src="{{ asset('img/index4.jpg') }}" alt="Featured Project" class="rounded-md shadow-lg">
    </div>
</section>

<!-- Hot today section -->
<section class="container mx-auto my-10">
    <h2 class="text-center text-2xl font-bold my-6">Hot Today</h2>
    <div class="flex justify-center items-center flex-wrap gap-6">
        <div class="bg-white w-[600px] h-[800px] p-4 rounded-lg shadow-md flex flex-col hover:scale-105">
            <img src="{{ asset('img/ssp3.jpeg') }}" alt="Hot today 1" class="w-full h-[60%] object-cover rounded mb-4">
            <h3 class="text-lg font-semibold">Havelock City Fourth and Final Phase is Ready for Handover</h3>
            <p class="text-gray-600 text-sm mt-2">[...]</p>
        </div>
        <div class="bg-white w-[600px] h-[800px] p-4 rounded-lg shadow-md flex flex-col hover:scale-105">
            <img src="{{ asset('img/images.jpeg') }}" alt="Hot today 2" class="w-full h-[60%] object-cover rounded mb-4">
            <h3 class="text-lg font-semibold">Housing Sales in Hyderabad Reports High Growth</h3>
            <p class="text-gray-600 text-sm mt-2">[...]</p>
        </div>
    </div>
</section>

<!-- Agencies section -->
<div class="container mx-auto p-6 bg-white shadow-lg rounded mt-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Upcoming Agencies</h1>

    @if($agencies->isEmpty())
        <p class="text-center text-gray-600">No upcoming agencies to display.</p>
    @else
        <div id="card-slider" class="overflow-x-auto cursor-grab scrollbar-hide">
            <div class="flex space-x-6 whitespace-nowrap px-2 py-4">
                @foreach($agencies as $agency)
                    <div class="min-w-[300px] max-w-[300px] bg-white border rounded-lg p-4 shadow hover:shadow-lg transition">
                        <img src="{{ asset('img/' . $agency->Image) }}" alt="Agency Image" class="w-full h-48 object-cover rounded mb-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $agency->Agency_Name }}</h2>
                        <p class="text-gray-700 mb-3">{{ $agency->Description }}</p>
                        <a href="{{ asset('img/' . $agency->Documents) }}" target="_blank" class="text-blue-500 hover:underline">View Document</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- HIDE SCROLLBAR STYLES -->
<style>
    .scrollbar-hide {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;     /* Firefox */
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;             /* Chrome, Safari, Opera */
    }
</style>

<!-- SLIDE LOGIC SCRIPT -->
<script>
    const slider = document.getElementById('card-slider');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('cursor-grabbing');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('cursor-grabbing');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('cursor-grabbing');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1.5;
        slider.scrollLeft = scrollLeft - walk;
    });

    // Touch support
    slider.addEventListener('touchstart', (e) => {
        isDown = true;
        startX = e.touches[0].pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('touchend', () => {
        isDown = false;
    });

    slider.addEventListener('touchmove', (e) => {
        if (!isDown) return;
        const x = e.touches[0].pageX - slider.offsetLeft;
        const walk = (x - startX) * 1.5;
        slider.scrollLeft = scrollLeft - walk;
    });
</script>
<!-- New Tools section -->
<section class="container mx-auto my-10">
    <h2 class="text-center text-2xl font-bold my-6">New Tools</h2>
    <div class="flex justify-center items-center flex-wrap gap-6">
        <div class="bg-white w-[600px] h-[800px] p-4 rounded-lg shadow-md flex flex-col hover:scale-105">
            <img src="{{ asset('img/cal1.jpg') }}" alt="Tool 1" class="w-full h-[60%] object-cover rounded mb-4">
            <h3 class="text-lg font-semibold">Property Calculator</h3>
            <p class="text-gray-600 text-sm mt-2">[...]</p>
        </div>
        <div class="bg-white w-[600px] h-[800px] p-4 rounded-lg shadow-md flex flex-col hover:scale-105">
            <img src="{{ asset('img/cal2.jpg') }}" alt="Tool 2" class="w-full h-[60%] object-cover rounded mb-4">
            <h3 class="text-lg font-semibold">Best Tools</h3>
            <p class="text-gray-600 text-sm mt-2">[...]</p>
        </div>
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
       
    </div>
</section>
@endif
<div class="bg-white h-20"></div>"
</div>


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
