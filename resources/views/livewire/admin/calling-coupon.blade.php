<div>
    <div class="flex flex-1 justify-between">
       <div>        
          <h1 class="text-2xl font-bold mb-4">Manage Coupon</h1>
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
                     viewBox="0 0 48 48">
                  <path d="M 20.5 6 C 12.509634 6 6 12.50964 6 20.5 C 6 28.49036 12.509634 35 20.5 35 C 23.956359 35 27.133709 33.779044 29.628906 31.75 L 39.439453 41.560547 A 1.50015 1.50015 0 1 0 41.560547 39.439453 L 31.75 29.628906 C 33.779044 27.133709 35 23.956357 35 20.5 C 35 12.50964 28.490366 6 20.5 6 z M 20.5 9 C 26.869047 9 32 14.130957 32 20.5 C 32 23.602612 30.776198 26.405717 28.791016 28.470703 A 1.50015 1.50015 0 0 0 28.470703 28.791016 C 26.405717 30.776199 23.602614 32 20.5 32 C 14.130953 32 9 26.869043 9 20.5 C 9 14.130957 14.130953 9 20.5 9 z"></path>
                </svg>
              </div>
              
        </div>

        <div class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-600 rounded-full shadow-lg flex items-center">
            <a href="{{ route('coupon.create') }}" class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Coupon</span>
            </a>
        </div>
        
    </div>
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4 text-left text-gray-600">Code</th>
                    <th class="py-2 px-4 text-left text-gray-600">Discount Type</th>
                    <th class="py-2 px-4 text-left text-gray-600">Discount Value</th>
                    <th class="py-2 px-4 text-left text-gray-600">Expiration Date</th>
                    <th class="py-2 px-4 text-left text-gray-600">Status</th>
                    <th class="py-2 px-4 text-left text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                <tr class="border-b">
                    <td class="py-2 px-4">{{$coupon->code}}</td>
                    <td class="py-2 px-4">{{$coupon->discount_type}}</td>
                    <td class="py-2 px-4">{{$coupon->discount_value}}</td>
                    <td class="py-2 px-4">{{$coupon->expiration_date}}</td>
                    <td class="py-2 px-4">
                        <div class="inline-flex items-center">
                            <button 
                                wire:click="toggleStatus({{ $coupon->id }})"
                                class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors duration-200 focus:outline-none
                                {{ $coupon->status ? 'bg-green-500' : 'bg-red-500' }}"
                            >
                                <span class="sr-only">{{ $coupon->status ? 'Deactivate' : 'Activate' }}</span>
                                <span
                                    class="inline-block w-5 h-5 transform bg-white rounded-full transition-transform duration-200 ease-in-out
                                    {{ $coupon->status ? 'translate-x-5' : 'translate-x-0' }}"
                                ></span>
                            </button>
                            {{-- <span class="ml-3 text-sm font-medium {{ $coupon->status ? 'text-green-700' : 'text-red-700' }}">
                                {{ $coupon->status ? 'Active' : 'Inactive' }}
                            </span> --}}
                        </div>
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button wire:click="openModal({{ $coupon->id }})" class="flex justify-between border-none ring-1 ring-gray-300 font-bold focus:ring-gray-400 focus:ring-2 bg-white text-blue-500 px-4 py-2 rounded-2xl shadow hover:bg-blue-500 hover:text-white transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z" />
                            </svg>
                            Edit
                          </button>
                          
                        
                          <button wire:click="confirmDelete({{ $coupon->id }})" class="flex justify-between bg-white text-red-900 px-4 font-bold py-2 rounded-2xl shadow hover:bg-red-500 hover:text-white transition duration-300 border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-7 h-7 mr-2" fill="none" viewBox="0 0 30 30" stroke="currentColor">
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
      <!-- Edit Coupon Modal -->
    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-lg">
            <h3 class="text-lg font-semibold mb-4">Edit Coupon</h3>
            <form wire:submit.prevent="updateCoupon">
                <div class="mb-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">Coupon Code</label>
                    <input type="text" id="code" wire:model="code" class="mt-1 block w-full p-2 border rounded">
                    @error('code') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="discount_type" class="block text-sm font-medium text-gray-700">Discount Type</label>
                    <select id="discount_type" wire:model="discount_type" class="mt-1 block w-full p-2 border rounded">
                        <option value="">Select Type</option>
                        <option value="percentage">Percentage</option>
                        <option value="fixed">Fixed Amount</option>
                    </select>
                    @error('discount_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="discount_value" class="block text-sm font-medium text-gray-700">Discount Value</label>
                    <input type="number" id="discountValue" wire:model="discount_value" class="mt-1 block w-full p-2 border rounded">
                    @error('discount_value') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                    <input type="date" id="expirationDate" wire:model="expiration_date" class="mt-1 block w-full p-2 border rounded">
                    @error('expiration_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
            <p class="mb-4">Are you sure you want to delete this coupon?</p>
            <div class="flex justify-end gap-2">
                <button wire:click="deleteCoupon" class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded">
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
</div>

