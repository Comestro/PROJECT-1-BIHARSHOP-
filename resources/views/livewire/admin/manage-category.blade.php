<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Manage Categories</h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium" href="javascript:void(0)">Categories /</a></li>
                <li class="font-medium text-primary">Manage Categories</li>
            </ol>
        </nav>
    </div>

    <!-- Search Input -->
    <div class="mb-4">
        <input type="text" wire:model="searchTerm" class="w-full p-2 border rounded" placeholder="Search categories...">
    </div>

    <!-- Category Table -->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Category Id</th>
                    <th scope="col" class="px-6 py-3">Category Image</th>
                    <th scope="col" class="px-6 py-3">Category Name</th>
                    <th scope="col" class="px-6 py-3">Category Slug</th>
                    <th scope="col" class="px-6 py-3">Category Description</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$category->id}}
                    </th>
                    <td class="px-6 py-4">
                        <img src="{{ $category->image ? asset('storage/image/category/' . $category->image) : asset('path/to/default-image.jpg') }}"
                            alt="Category Image"
                            class="w-12 h-12 object-cover border border-gray-300 dark:border-strokedark">
                    </td>
                    <td class="px-6 py-4">{{$category->name}}</td>
                    <td class="px-6 py-4">{{$category->cat_slug}}</td>
                    <td class="px-6 py-4">{{$category->cat_description}}</td>
                    <td class="px-6 py-4">
                        <button wire:click="openModal({{ $category->id }})" class="bg-blue-500 hover:bg-blue-800 text-white px-3 py-2 rounded">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Edit Category Modal -->
    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-lg">
            <h3 class="text-lg font-semibold mb-4">Edit Category</h3>
            <form wire:submit.prevent="updateCategory">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" id="name" wire:model="name" class="mt-1 block w-full p-2 border rounded">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Category Slug</label>
                    <input type="text" id="slug" wire:model="slug" class="mt-1 block w-full p-2 border rounded">
                    @error('slug') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Category Description</label>
                    <textarea id="description" wire:model="description" rows="3" class="mt-1 block w-full p-2 border rounded"></textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Category Image</label>
                    <input type="file" id="image" wire:model="image" class="mt-1 block w-full p-2 border rounded">
                    @if ($image)
                        <div class="mt-2">
                            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-32 h-32 object-cover border border-gray-300">
                        </div>
                    @elseif($existingImage)
                        <div class="mt-2">
                            <img src="{{ asset('storage/image/category/' . $existingImage) }}" alt="Current Image" class="w-32 h-32 object-cover border border-gray-300">
                        </div>
                    @endif
                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" wire:click="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
