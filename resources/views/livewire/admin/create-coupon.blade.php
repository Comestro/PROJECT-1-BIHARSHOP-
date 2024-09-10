<div>
    <form wire:submit="store"  method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="code" class="block text-gray-700">Code</label>
                <input type="text" id="code" wire:model="code" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="Coupon Code"
                />
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
            </div>
            <div>
                <label for="expiration_date" class="block text-gray-700">Expiration Date</label>
                <input
                    type="date"
                    id="expiration_date"
                    wire:model="expiration_date"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"
                />
            </div>
            <div class="col-span-2">
                <label for="status" class="block text-gray-700">Status</label>
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="status"
                        wire:model="status"
                        class="mr-2"
                        checked
                    />
                    <span>Active</span>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
                Save Coupon
            </button>
        </div>
    </form>
</div>
