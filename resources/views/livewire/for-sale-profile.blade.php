<div>
    {{-- Loading Spinner --}}
    <div wire:loading.flex class="items-center justify-center h-96">
        <svg class="animate-spin h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
        <span class="ml-2 text-green-600 font-semibold">Loading Property Details...</span>
    </div>

    {{-- Main Content --}}
    <div wire:loading.remove wire:navigate.prefetch>
        <div class="bg-white min-h-screen py-6">
            {{-- Full Width Image --}}
            @php $imageArray = explode(',', $property->images); @endphp
            <div>
                <img src="{{ asset($imageArray[0]) }}" class="w-full h-[800px] object-cover rounded-b-lg" alt="Main Image">
            </div>

            {{-- Title and Price --}}
            <div class="max-w-screen-xl mx-auto text-center mt-6 px-4">
                <h1 class="text-3xl font-bold text-green-700">{{ $property->topic }}</h1>
                <p class="text-2xl font-semibold text-red-600 mt-1 text-left">{{ 'Rs. ' . number_format((float) $property->price) }}</p>
            </div>

            {{-- Basic Info --}}
            <div class="max-w-screen-xl mx-auto flex flex-wrap justify-center gap-6 text-sm text-gray-600 px-4 text-center">
                <span class="flex items-center gap-1"><i class="fas fa-bed text-green-600"></i> {{ $property->rooms }} Rooms</span>
                <span class="flex items-center gap-1"><i class="fas fa-bath text-green-600"></i> {{ $property->bathrooms }} Bathrooms</span>
                <span class="flex items-center gap-1"><i class="fas fa-ruler-combined text-green-600"></i> 200 sqft</span>
            </div>

            <hr class="my-6 border-gray-900 w-1/2">

            {{-- Description --}}
            <div class="max-w-screen-xl mx-auto mt-4 px-4 text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Details</h2>
                <p class="text-sm text-gray-700 leading-relaxed italic">
                    {!! nl2br(e($property->description)) !!}
                </p>
            </div>

            <hr class="my-6 border-gray-900 w-1/2">

            {{-- Features --}}
            <div class="max-w-screen-xl mx-auto bg-white p-6 rounded shadow-md mt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Property Features</h2>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="text-sm flex flex-col items-center"><i class="fas fa-swimming-pool text-2xl text-blue-500 mb-1"></i><span>Pool</span></div>
                    <div class="text-sm flex flex-col items-center"><i class="fas fa-car text-2xl text-gray-700 mb-1"></i><span>Parking</span></div>
                    <div class="text-sm flex flex-col items-center"><i class="fas fa-snowflake text-2xl text-blue-400 mb-1"></i><span>A/C</span></div>
                </div>
            </div>

            <hr class="my-6 border-gray-900 w-1/2">

            {{-- Contact Seller --}}
            <div class="max-w-screen-xl mx-auto bg-white p-6 rounded shadow-md mt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Contact Seller</h2>
                <div class="space-y-2 text-sm text-gray-700 text-center">
                    <div><i class="fas fa-phone mr-2 text-green-600"></i>{{ $property->contact }}</div>
                    <div><i class="fas fa-envelope mr-2 text-green-600"></i>{{ $property->email }}</div>
                </div>
            </div>

            {{-- Location Map --}}
            <div class="mt-10">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 px-4 text-center">Location</h2>
                <iframe
                    src="https://maps.google.com/maps?q={{ urlencode($property->location) }}&output=embed"
                    class="w-full h-80 border-0">
                </iframe>
            </div>
        </div>
    </div>
</div>
