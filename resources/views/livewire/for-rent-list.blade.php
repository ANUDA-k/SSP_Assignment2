<div wire:poll.5s>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($properties as $property)
            <div wire:key="rent-{{ $property->id }}">
                @php
                    $imageArray = explode(',', $property->images);
                @endphp
                <a href="{{ route('forRentProfile', ['property' => $property->id]) }}"
                >
                    <div class="max-w-sm bg-white rounded-lg shadow-lg">
                        @foreach ($imageArray as $img)
                            <img src="{{ asset($img) }}" class="h-40 w-full object-cover mb-2">
                        @endforeach
                        <div class="p-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-500">{{ $property->price }}</span>
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">{{ $property->rooms }} Rooms</span>
                            </div>
                            <h3 class="text-green-600 text-lg font-bold">{{ $property->topic }}</h3>
                            <p class="text-sm text-gray-600">{{ $property->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-3">No properties available for rent.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $properties->links() }}
    </div>
</div>
