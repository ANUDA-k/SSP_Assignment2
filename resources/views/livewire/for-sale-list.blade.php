<div wire:poll.5s>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($properties as $property)
            <a 
                href="{{ route('forSaleProfile', ['property' => $property->id]) }}" 
                class="block max-w-sm bg-white rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300"
            >
                @php
                    $imageArray = explode(',', $property->images);
                @endphp
                @foreach ($imageArray as $img)
                    <img src="{{ asset($img) }}" class="h-40 w-full object-cover mb-2" alt="Property Image">
                @endforeach
                <div class="p-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-500">Rs. {{ $property->price }}</span>
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">{{ $property->rooms }} Rooms</span>
                    </div>
                    <h3 class="text-green-600 text-lg font-bold">{{ $property->topic }}</h3>
                    <p class="text-sm text-gray-600 line-clamp-3">{{ Str::limit($property->description, 100) }}</p>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-500 col-span-3">No property available for sale.</p>
        @endforelse
    </div>

    {{-- Pagination links --}}
    <div class="mt-6">
        {{ $properties->links() }}
    </div>
</div>

