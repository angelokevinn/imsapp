<x-app-layout>
    <div class="w-full px-10 pt-5 flex flex-col gap-8 mb-11">
        <h1 class="text-2xl font-bold">Edit Product</h1>
        <form method="POST" action="{{ route('product.update', $product->id) }}" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-transform: uppercase;" value="{{ $product->name }}" required>
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-transform: uppercase;" value="{{ $product->price }}" required>
            </div>
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-transform: uppercase;" value="{{ $product->stock }}" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-transform: uppercase;" required>{{ $product->description }}</textarea>
            </div>
            <div>
                <label for="purchase_date" class="block text-sm font-medium text-gray-700">Purchase Date</label>
                <input type="date" name="purchase_date" id="purchase_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-transform: uppercase;" value="{{ $product->purchase_date }}" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            </div>
</x-app-layout>