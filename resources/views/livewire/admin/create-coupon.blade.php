<div>
    <form wire:submit.prevent="store" method="POST" class="bg-white p-6 rounded-lg shadow-md relative">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="code" class="block text-gray-700">Code</label>
                <input type="text" id="code" wire:model="code" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="Coupon Code" />
                @error('code')
                <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="discount_type" class="block text-gray-700">Discount Type</label>
                <select
                    id="discount_type"
                    wire:model="discount_type"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed Amount</option>
                </select>
                @error('discount_type')
                <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="discount_value" class="block text-gray-700">Discount Value</label>
                <input
                    type="number"
                    id="discount_value"
                    wire:model="discount_value"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"
                    placeholder="Discount Value"
                    step="0.01" />
                @error('discount_value')
                <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="expiration_date" class="block text-gray-700">Expiration Date</label>
                <input
                    type="date"
                    id="expiration_date"
                    wire:model="expiration_date"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
                @error('expiration_date')
                <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div class="col-span-2">
                <label for="status" class="block text-gray-700">Status</label>
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="status"
                        wire:model="status"
                        class="mr-2"
                        checked />
                    @error('status')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                    <span>Active</span>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Coupon
            </button>
        </div>

        <!-- Loading Spinner, only visible when submitting -->
        <div wire:loading wire:target="store" class="absolute inset-0 top-[50%] left-[50%] bg-white bg-opacity-75 flex flex-col items-center justify-center z-10">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            <span class="mt-4 text-blue-500 font-semibold">Processing...</span>
        </div>
    </form>
</div>
