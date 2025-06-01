agency form<div class="max-w-2xl mx-auto bg-white p-8 shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Agencies Form</h2>
         <form action="{{ route('agencies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- 🔽 Put this just after the form tag -->
    @if ($errors->agencyErrors->any())
        <ul class="text-red-600 mt-4 list-disc list-inside">
            @foreach ($errors->agencyErrors->all() as $error)
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
            <input type="File" id="Document" name="Document" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-yellow-400" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Upload Image</label>
            <input type="File" id="Image" name="Image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-yellow-400" required>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-indigo-500">Submit</button>
    </form>
</div>

@if(session('success'))
    <div id="toast" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded shadow-lg opacity-100 transition-opacity duration-500">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500); // Remove after fade out
            }
        }, 3000); // 3 seconds
    </script>
@endif
