<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <!-- Other code -->

    <div class="flex flex-1 justify-between">
       <div>        
          <h1 class="text-2xl font-bold mb-4">Manage Category</h1>
        </div>        
        <div class="">
            <div class="relative flex flex-1">
                <input type="search" 
                       class="border w-[300px] pl-8 pr-2 py-2 rounded-2xl border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2" 
                       placeholder="search here.." 
                       wire:model.live='searchTerm' />
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400" 
                     width="20" 
                     height="20" 
                     viewBox="0 0 48 48">
                  <path d="M 20.5 6 C 12.509634 6 6 12.50964 6 20.5 C 6 28.49036 12.509634 35 20.5 35 C 23.956359 35 27.133709 33.779044 29.628906 31.75 L 39.439453 41.560547 A 1.50015 1.50015 0 1 0 41.560547 39.439453 L 31.75 29.628906 C 33.779044 27.133709 35 23.956357 35 20.5 C 35 12.50964 28.490366 6 20.5 6 z M 20.5 9 C 26.869047 9 32 14.130957 32 20.5 C 32 23.602612 30.776198 26.405717 28.791016 28.470703 A 1.50015 1.50015 0 0 0 28.470703 28.791016 C 26.405717 30.776199 23.602614 32 20.5 32 C 14.130953 32 9 26.869043 9 20.5 C 9 14.130957 14.130953 9 20.5 9 z"></path>
                </svg>
              </div>
              
        </div>
        <div class="bg-blue-500 text-white px-4  hover:bg-blue-600 rounded-full shadow-lg flex items-center">
            <a wire:navigate href="{{ route('category.create') }}" class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="te text-sm">Add Category</span>
            </a>
        </div>
    </div>
    <!-- Category Table -->
    <div class="relative overflow-x-auto mt-5">
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
                    <td class="px-6 py-4 flex gap-2">
                        <button wire:click="openModal({{ $category->id }})" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-3xl flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 4.879a3 3 0 014.242 4.242l-1.5 1.5a3 3 0 01-4.242-4.242l1.5-1.5zM4 16v4h4l9-9-4-4-9 9z"/>
                            </svg>
                            <span>Edit</span>
                        </button>
                        
                        <button wire:click="confirmDelete({{ $category->id }})" class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded-3xl flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L6 6M18 18L18 6M6 6L5 4H19L18 6M9 10V16M15 10V16"/>
                            </svg>
                            <span>Delete</span>
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
                    <button type="button" wire:click="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($confirmingDelete)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-lg">
            <h3 class="text-lg font-semibold mb-4">Confirm Deletion</h3>
            <p class="mb-4">Are you sure you want to delete this category?</p>
            <div class="flex justify-end gap-2">
                <button wire:click="deleteCategory" class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded">
                    Delete
                </button>
                <button wire:click="$set('confirmingDelete', false)" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
