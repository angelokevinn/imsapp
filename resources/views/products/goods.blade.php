<x-app-layout>
    <div class="w-full px-10 pt-5 flex flex-col gap-8 mb-8">
        <!-- Alert Success -->
        @if (session('success'))
            <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-alert').style.display = 'none';
                }, 3000); // Alert will close after 3 seconds
            </script>
        @endif
        

        <div class="w-full flex items-center justify-between">
            <h1 class="text-2xl font-bold ml-2 text-center">
                Purchase Product List
            </h1>

            <!-- Add Product Button -->
            <a href="{{route('product.create')}}" class="self-end bg-[#09122C] w-[140px] flex flex-col items-center text-white px-2 py-1 shadow-md rounded-lg">
                <h3 class="text-md font-extrabold text-green-600">
                    Add Product
                </h3>
            </a>    
        </div>
        

        <!-- Table -->
        <div class="w-full flex rounded-2xl shadow-xl border overflow-x-auto">
            <table class="min-w-full bg-white shadow-xl rounded-2xl">
                <thead>
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Price (Each)</th>
                        <th class="py-2">Description</th>
                        <th class="py-2">Purchase Date</th>
                        <th class="py-2">Total</th>
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ $product->stock }}</td>
                            <td class="border px-4 py-2">IDR {{ $product->price }}</td>
                            <td class="border px-4 py-2">{{ $product->description }}</td>
                            <td class="border px-4 py-2">{{ $product->purchase_date }}</td>
                            <td class="border px-4 py-2">IDR {{ $product->price * $product->stock }}</td>
                            <td class="border px-4 py-2 flex justify-center gap-2">
                                <a href="{{ route('product.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-1 rounded">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
