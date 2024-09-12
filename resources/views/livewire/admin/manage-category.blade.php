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
        <input type="text" wire:model.live="searchTerm" class="w-full p-2 border rounded" placeholder="Search categories...">
    </div>

    <!-- Category Table -->



    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        category Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
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
                    
                    <td class="px-6 py-4">
                       {{$category->name}}
                    </td>
                    <td class="px-6 py-4">
                       {{$category->cat_slug}}
                    </td>
                    <td class="px-6 py-4">
                       {{$category->cat_description}}
                    </td>
                    <td class="px-6 py-4">
                      <!-- <form wire:submit.prevent='deletefun' method="post">
                        @csrf
                        @method('delete')
                        <input type="id" wire:model="id" value="{{$category->id}}" class="">
                        <input type="submit" value="delete" class="bg-red-500 hover:bg-red-800 text-white px-3 py-2 rounded ml-2">
                        </form>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


   
</div>