<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
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


    {{-- Header --}}
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <div class="flex items-center space-x-4">
                <a href="#" class="w-16 h-16">
                    <img src="{{ asset('img/logo top.png') }}" alt="Logo" class="w-full h-full object-cover rounded-md">
                </a>
            </div>
            <nav class="flex-1">
                <ul class="flex justify-center space-x-10 text-lg text-green-800">
                    <li><a href="/" class="hover:text-green-600">Home</a></li>
                    <li><a href="/forsale" class="hover:text-green-600">For Sale</a></li>
                    <li><a href="/forrent" class="hover:text-green-600">Rentals</a></li>
                    <li><a href="/upcoming" class="hover:text-green-600">Upcoming</a></li>
                    <li><a href="/aboutus" class="hover:text-green-600">About Us</a></li>
                </ul>
            </nav>
            <div class="flex items-center space-x-6">
                <div class="flex flex-col items-end space-y-2 text-green-600">
                    <a href="/login" class="text-lg font-semibold hover:text-green-800">Log In</a>
                    <a href="/register" class="text-lg font-semibold hover:text-green-800">Sign Up</a>
                </div>
                <a href="/post-ad" class="bg-red-700 text-white px-6 py-2 rounded-lg shadow-md font-bold">Post AD</a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Panel</h1>

        {{-- Upload Top Ad Image --}}
        <div class="bg-white p-6 rounded shadow mb-6">
            <form action="{{ route('topads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="top_ad_image" class="block mb-2 font-medium">Select Top Ad Image</label>
                <input type="file" name="top_ad_image" id="top_ad_image" accept="image/*" class="mb-4 block w-full border p-2 rounded" required>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Upload</button>
            </form>

            @if(session('topad_success'))
                <p class="text-green-600 mt-4">{{ session('topad_success') }}</p>
            @endif

            @if($errors->any())
                <ul class="text-red-600 mt-4 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>


<div class="bg-white p-6 rounded shadow mb-6">
    <form action="{{ route('bottomads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="bottom_ad_image" class="block mb-2 font-medium">Select Bottom Ad Image</label>
        <input type="file" name="bottom_ad_image" id="bottom_ad_image" accept="image/*" class="mb-4 block w-full border p-2 rounded" required>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Upload</button>
    </form>

    @if(session('bottomad_success'))
        <p class="text-green-600 mt-4">{{ session('bottomad_success') }}</p>
    @endif

    @if($errors->any())
        <ul class="text-red-600 mt-4 list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>


<div class="bg-white p-6 rounded shadow mb-6">
    <h2 class="text-xl font-bold mb-4">Bottom AD</h2>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border text-center">Image</th>
                <th class="py-2 px-4 border text-center">Path</th>
                <th class="py-2 px-4 border text-center">Is Bottom</th>
                <th class="py-2 px-4 border text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bottomAds as $ad)
            <tr>
                <td class="py-2 px-4 border text-center">
                    <img src="{{ asset($ad->File_Path) }}" alt="Bottom Ad" class="h-16 mx-auto">
                </td>
                <td class="py-2 px-4 border text-center">{{ $ad->File_Path }}</td>
                <td class="py-2 px-4 border text-center">
                    {{ $ad->is_top ? 'Yes' : 'No' }}
                </td>
                <td class="py-2 px-4 border text-center">
    {{-- Delete Form --}}
    <form action="{{ route('delete.bottom.ad', $ad->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
    </form>

    {{-- Set as Bottom Form --}}
    <form action="{{ route('set.bottom.ad', $ad->id) }}" method="POST" class="inline-block ml-2">
        @csrf
        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Set as Bottom</button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--Agency submission-->
<div class="max-w-2xl mx-auto bg-white p-8 shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Agencies Form</h2>
         <form action="{{ route('agencies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       
    
        @if ($errors->any())
    <ul class="text-red-600 mt-4 list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <div class="mb-4">
            <label for="agency_name" class="block text-sm font-medium text-gray-600">Agency Name</label>
            <input type="text" id="Agency_name" name="Agency_Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea id="Description" name="Description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-yellow-400" required></textarea>
        </div>

        <div class="mb-4">
            <label for="document" class="block text-sm font-medium text-gray-600">Upload Document</label>
            <input type="File" id="Documents" name="Documents" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-yellow-400" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Upload Image</label>
            <input type="File" id="Image" name="Image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-yellow-400" required>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-indigo-500">Submit</button>
    </form>
</div>

@if(session('success'))
    <div id="popup-success" style="
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #22c55e; /* Tailwind green-500 */
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        font-weight: 600;
        z-index: 1000;
    ">
        {{ session('success') }}
        <button onclick="document.getElementById('popup-success').style.display='none'" 
            style="
                margin-left: 12px;
                background: none;
                border: none;
                color: white;
                font-size: 18px;
                font-weight: bold;
                cursor: pointer;
            "></button>
    </div>

    <script>
        // Auto hide after 4 seconds
        setTimeout(function() {
            var popup = document.getElementById('popup-success');
            if (popup) popup.style.display = 'none';
        }, 4000);
    </script>
@endif
<!-- Agencies Table -->
<div x-data="editingModal">

    <!-- Agencies List Table -->
    <div class="container mx-auto p-6 bg-white shadow-lg rounded mt-10">
        <h1 class="text-2xl font-bold mb-4 text-center">Agencies List</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-center">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Agency Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Document</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agencies as $agency)
                        <tr class="border-b hover:bg-gray-100  text-center">
                            <td class="px-4 py-2">{{ $agency->id }}</td>
                            <td class="px-4 py-2">{{ $agency->Agency_Name }}</td>
                            <td class="px-4 py-2">{{ $agency->Description }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ asset('img/' . $agency->Documents) }}" class="text-blue-600 hover:underline" target="_blank">View</a>
                            </td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('img/' . $agency->Image) }}" alt="Agency Image" class="w-20 h-20 object-cover rounded" />
                            </td>
                            <td class="px-4 py-2">
                                <button 
                                    @click="editing = true; agencyId = {{ $agency->id }}; description = '{{ addslashes($agency->Description) }}'"
                                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700"
                                >Edit</button>
                                <form method="POST" action="{{ route('agencies.addToUpcoming', $agency->id) }}" style="display:inline;">
    @csrf
    <button type="submit"
        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 ml-2"
    >Add</button>
</form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  


    <!-- Modal -->
            <!-- Modal -->
            <div x-show="editing" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
            <div class="bg-white p-6 rounded shadow w-96" @click.away="editing = false">
                <h2 class="text-xl font-bold mb-4">Edit Description</h2>
                <textarea x-model="description" class="w-full border p-2 rounded mb-4" rows="4"></textarea>
                <div class="flex justify-end space-x-2">
                    <button @click="editing = false" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                    <button 
                        @click="updateDescription"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                    >Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for AJAX -->
    <script>
    function updateDescription() {
        fetch(`/agencies/${this.agencyId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ Description: this.description })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the row manually or refresh the page
                location.reload(); // for now just refresh
            } else {
                alert('Update failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('editingModal', () => ({
            editing: false,
            agencyId: null,
            description: '',
            updateDescription
        }));
    });
</script>


    <!-- Modal -->
   

<div class="bg-white p-6 rounded shadow mb-6">
    <h2 class="text-xl font-bold mb-4">Newsletter Subscriptions</h2>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Subscribed On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $newsletter)
            <tr>
                <td class="py-2 px-4 border text-center">{{ $newsletter->N_id }}</td>
                <td class="py-2 px-4 border text-center">{{ $newsletter->email }}</td>
                <td class="py-2 px-4 border text-center">
                {{ \Carbon\Carbon::parse($newsletter->created_at)->format('d M Y') }}
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Newsletters -->
    



<!--Edit Form (Optional)-->


<body class="bg-gray-100 text-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-4">Welcome, Admin</h1>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</body>


        

    {{-- Footer --}}
    <footer class="bg-gray-200 py-12">
        <div class="container mx-auto px-6 flex flex-wrap justify-between gap-8">
            <div class="mb-4">
                <h3 class="text-lg font-bold mb-4">Discover</h3>
                <ul class="space-y-2">
                    <li><a href="/forsale" class="text-gray-600 hover:underline">For Sale</a></li>
                    <li><a href="/forrent" class="text-gray-600 hover:underline">For Rent</a></li>
                    <li><a href="/upcoming" class="text-gray-600 hover:underline">Upcoming</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>

