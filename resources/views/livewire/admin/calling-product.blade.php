<div>

    <div class="flex flex-1 justify-between">
        <div>
           <h1 class="text-2xl font-bold mb-4">Manage Product</h1>
         </div>
         <div class="">
             <div class="relative flex flex-1">
                 <input type="search"
                        class="border w-[300px] pl-8 pr-2 py-2 rounded-2xl border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2"
                        placeholder="search here.."
                        wire:model.live='search' />
                 <svg xmlns="http://www.w3.org/2000/svg"
                      class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400"
                      width="20"
                      height="20"
                      viewBox="0    0 48 48">
                   <path d="M 20.5 6 C 12.509634 6 6 12.50964 6 20.5 C 6 28.49036 12.509634 35 20.5 35 C 23.956359 35 27.133709 33.779044 29.628906 31.75 L 39.439453 41.560547 A 1.50015 1.50015 0 1 0 41.560547 39.439453 L 31.75 29.628906 C 33.779044 27.133709 35 23.956357 35 20.5 C 35 12.50964 28.490366 6 20.5 6 z M 20.5 9 C 26.869047 9 32 14.130957 32 20.5 C 32 23.602612 30.776198 26.405717 28.791016 28.470703 A 1.50015 1.50015 0 0 0 28.470703 28.791016 C 26.405717 30.776199 23.602614 32 20.5 32 C 14.130953 32 9 26.869043 9 20.5 C 9 14.130957 14.130953 9 20.5 9 z"></path>
                 </svg>
               </div>

         </div>
         <div class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-full shadow-lg flex items-center">
            <a href="{{ route('product.create') }}" class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Product</span>
            </a>
        </div>
     </div>

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

        <table class="min-w-full divide-y mt-5 divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->formattedPrice }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->sku }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $product->category ? $product->category->name : 'No Category' }}
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if($product->image)
                                <img src="{{ asset('storage/image/product/' . $product->image) }}" alt="Product Image" class="w-16 h-16 object-cover">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="px-6 py-4  whitespace-nowrap text-sm text-gray-500">
                            <button
                            wire:click="toggleStatus({{ $product->id }})"
                            class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors duration-200 focus:outline-none
                            {{ $product->status ? 'bg-green-500' : 'bg-red-500' }}"
                        >
                            <span class="sr-only">{{ $product->status ? 'Deactivate' : 'Activate' }}</span>
                            <span
                                class="inline-block w-5 h-5 transform bg-white rounded-full transition-transform duration-200 ease-in-out
                                {{ $product->status ? 'translate-x-5' : 'translate-x-0' }}"
                            ></span>
                        </button>


                        </td>
                        <td class="px-6 py-4 flex items-center whitespace-nowrap text-sm font-medium flex space-x-2">
                            <a href="{{ route('product.edit', $product->slug) }}" class="flex justify-between border-none ring-1 ring-gray-300 font-bold focus:ring-gray-400 focus:ring-2 bg-white text-blue-500 px-4 py-2 rounded-3xl shadow hover:bg-blue-500 hover:text-white ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z" />
                                  </svg>
                                Edit
                            </a>

                            <button wire:click="openModal({{ $product->id }})" class="flex items-center justify-between bg-white text-red-900 px-4 font-bold py-2 rounded-3xl shadow hover:bg-red-500 hover:text-white transition duration-300 border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 11v6m4-6v6m-5-6h10M4 7h16M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7H6z" />
                                </svg>
                                Delete
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     <!-- Delete Confirmation Modal -->
     @if ($isOpen)
     <div class="fixed inset-0 flex items-center justify-center z-50">
         <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <div class="flex items-center mb-4">
            <img width="40" height="40" src="https://img.icons8.com/color-glass/48/error--v1.png" alt="error--v1"/>

             <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
            </div>
             <p>Are you sure you want to delete this product?</p>
             <div class="flex justify-end mt-4">
                 <button type="button" wire:click="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded mr-2">
                     Cancel
                 </button>
                 <button type="button" wire:click="delete" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">
                     Delete
                 </button>
             </div>
         </div>
     </div>
     <div class="fixed inset-0 bg-black opacity-50"></div>
 @endif

</div>


