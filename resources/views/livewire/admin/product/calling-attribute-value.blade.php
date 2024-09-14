<div>
    <!-- Heading -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold mb-4">Manage Attributes</h1>
    </div>

    <!-- Attribute Values Table -->
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4 text-center text-gray-600">Sr. no.</th>
                    <th class="py-2 px-4 text-center text-gray-600">Attribute Name</th>
                    <th class="py-2 px-4 text-center text-gray-600">Value</th>
                    <th class="py-2 px-4 text-center text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributeValues as $attribute)
                <tr class="border-b capitalize hover:bg-gray-100">
                    <td class="py-2 px-4 text-center">{{ $loop->index + 1 }}</td>
                    <td class="py-2 px-4 text-center">{{ $attribute->attribute->name }}</td>
                    <td class="py-2 px-4 text-center">{{ $attribute->value }}</td>
                    <td class="px-6 py-4 text-center flex gap-2 justify-center">
                        <!-- Edit Button -->
                        <button wire:click="openModal({{ $attribute->id }})" class="flex items-center border border-gray-300 font-bold bg-white text-blue-500 px-4 py-2 rounded-3xl hover:bg-blue-500 hover:text-white focus:ring-2 focus:ring-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z" />
                            </svg>
                            Edit
                        </button>
                        
                        <!-- Delete Button -->
                        <button wire:click="confirmDelete({{ $attribute->id }})" class="flex items-center bg-white text-red-900 px-4 font-bold py-2 rounded-3xl shadow hover:bg-red-500 hover:text-white transition duration-300 border-none ring-1 ring-gray-300 focus:ring-2 focus:ring-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2" fill="none" viewBox="0 0 30 30" stroke="currentColor">
                                <path d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
                            </svg>
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

 <!-- Edit Modal -->
@if($isModalOpen)
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-lg">
        <h3 class="text-lg font-semibold mb-4">Edit Attribute</h3>
        <form wire:submit.prevent="updateAttributeValue">
            <div class="mb-4">
                <label for="attribute_id" class="block text-gray-700 font-semibold mb-2">Attribute Name</label>
                <select id="attribute_id" wire:model="attribute_id" class="w-full px-3 py-2 capitalize border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Attribute</option>
                    <!-- Loop through the attributes instead of attributeValues -->
                    @foreach($attributes as $attribute)
                        <option value="{{ $attribute->id }}" class="text-black">{{ $attribute->name }}</option>
                    @endforeach
                </select>
                @error('attribute_id')
                <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
                <input type="text" id="value" wire:model="value" class="mt-1 block w-full p-2 border rounded">
                @error('value') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-lg">
            <div class="flex items-center mb-4">
                <img width="40" height="40" src="https://img.icons8.com/color-glass/48/error--v1.png" alt="error--v1"/>
                <h3 class="text-lg font-semibold ml-2">Confirm Deletion</h3>
            </div>
            <p class="mb-4">Are you sure you want to delete this attribute?</p>
            <div class="flex justify-end gap-2">
                <button wire:click="deleteAttributeValue" class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Delete
                </button>
                <button wire:click="$set('confirmingDelete', false)" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded flex items-center">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
