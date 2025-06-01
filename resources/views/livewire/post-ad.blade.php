<div>
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
        <input type="text" wire:model="topic" placeholder="Topic" class="w-full py-2 px-4 bg-gray-200 rounded-md">
        @error('topic') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="number" wire:model="rooms" placeholder="Rooms" class="w-full py-2 px-4 bg-gray-200 rounded-md">
        <input type="number" wire:model="bathrooms" placeholder="Bathrooms" class="w-full py-2 px-4 bg-gray-200 rounded-md">
        <input type="text" wire:model="price" placeholder="Price" class="w-full py-2 px-4 bg-gray-200 rounded-md">
        <textarea wire:model="description" placeholder="Description" class="w-full py-2 px-4 bg-gray-200 rounded-md"></textarea>
        <input type="text" wire:model="contact" placeholder="Contact" class="w-full py-2 px-4 bg-gray-200 rounded-md">
        <input type="email" wire:model="email" placeholder="Email" class="w-full py-2 px-4 bg-gray-200 rounded-md">

        <select wire:model="property_type" class="w-full border p-2 rounded bg-gray-200">
            <option value="">Select Property Type</option>
            <option value="House">House</option>
            <option value="Apartment">Apartment</option>
            <option value="Land">Land</option>
        </select>

        <div class="flex space-x-6 items-center">
            <label><input type="radio" wire:model="ad_type" value="sale" class="mr-2">Sale</label>
            <label><input type="radio" wire:model="ad_type" value="rent" class="mr-2">Rent</label>
        </div>

        <input type="file" wire:model="images" multiple class="w-full py-2 px-4 bg-gray-200 rounded-md">
        @error('images.*') <span class="text-red-500">{{ $message }}</span> @enderror

        <div class="grid grid-cols-2 gap-4 mt-6">
            <button type="submit" class="bg-green-500 text-white py-2 rounded">CONFIRM</button>
            <button type="reset" class="bg-green-500 text-white py-2 rounded" wire:click="$reset">CANCEL</button>
        </div>
    </form>
</div>
