<div>
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-4">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea id="description" wire:model="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-semibold mb-2">Price</label>
            <input type="number" step="0.01" id="price" wire:model="price" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="discount_price" class="block text-gray-700 font-semibold mb-2">Discount Price</label>
            <input type="number" step="0.01" id="discount_price" wire:model="discount_price" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity</label>
            <input type="number" id="quantity" wire:model="quantity" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="0" required>
        </div>

        <div class="mb-4">
            <label for="sku" class="block text-gray-700 font-semibold mb-2">SKU</label>
            <input type="text" id="sku" wire:model="sku" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" id="image" wire:model="image" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
            <select id="category_id" wire:model="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="brand" class="block text-gray-700 font-semibold mb-2">Brand</label>
            <input type="text" id="brand" wire:model="brand" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="status" class="inline-flex items-center">
                <input type="checkbox" id="status" wire:model="status" class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 text-gray-700 font-semibold">Active</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
            <button type="reset" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">Reset</button>
        </div>
    </form>
</div>
