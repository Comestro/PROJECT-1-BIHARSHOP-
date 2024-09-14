<div>
    <div class="p-4 bg-gray-100 rounded-lg mb-4">
        <h3 class="text-lg font-semibold mb-2">Add Product Attributes</h3>
        <form wire:submit.prevent="store" method="POST">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Product Size</label>
                    <select wire:model="attribute_value_id" class="w-full px-3 py-2 border rounded-lg">
                        <option value="">Select Size</option>
                        @foreach ($attribute_values as $item)
                            <option value="{{ $item->id }}">{{ $item->attribute->name }} - {{ $item->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Product Price</label>
                    <select wire:model="product_variant_id" class="w-full px-3 py-2 border rounded-lg">
                        <option value="">Select Price</option>
                        @foreach ($product_variants as $item)
                            <option value="{{ $item->id }}">{{ $item->formattedPrice }} - {{ $item->stock }} Units
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="bg-black text-white text-xs px-3 py-2 mt-4 rounded-md">Save
                Attributes</button>

            <div wire:loading wire:target="store"
                class="absolute inset-0 top-[50%] left-[50%] bg-white bg-opacity-75 flex flex-col items-center justify-center z-10">
                <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
                <span class="mt-4 text-blue-500 font-semibold">Processing...</span>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto mt-5">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4 text-left text-gray-600">Sr. no.</th>
                    <th class="py-2 px-4 text-left text-gray-600">Variant Name</th>
                    <th class="py-2 px-4 text-left text-gray-600">Variant value</th>
                    <th class="py-2 px-4 text-left text-gray-600">Price</th>
                    <th class="py-2 px-4 text-left text-gray-600">Stock</th>
                    <th class="py-2 px-4 text-center text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productVariantAttributes as $item)
                    <tr class="border-b capitalize">
                        <td class="py-2 px-4">{{ $loop->index + 1 }}</td>
                        <td class="py-2 px-4">{{ $item->attributeValue->attribute->name }}</td>
                        <td class="py-2 px-4">{{ $item->attributeValue->value }}</td>
                        <td class="py-2 px-4">{{ $item->attribute }}</td>
                        <td class="py-2 px-4">{{ $item->attribute_value_id }}</td>
                        <td class="px-6 py-4 flex gap-2 ">
                            <button wire:click="openModal({{ $item->id }})"
                                class="flex justify-between border-none ring-1 ring-gray-300 font-bold focus:ring-gray-400 focus:ring-2 bg-white text-blue-500 px-4 py-2 rounded-3xl  hover:bg-blue-500 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z" />
                                </svg>
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
