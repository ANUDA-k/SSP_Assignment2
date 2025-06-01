@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">User Profile</h1>

    <div class="flex items-center space-x-6 mb-6">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-full w-24 h-24">
        @endif

        <div>
            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="space-x-4">
        <a href="{{ route('profile.show') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
            Edit Profile
        </a>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection


