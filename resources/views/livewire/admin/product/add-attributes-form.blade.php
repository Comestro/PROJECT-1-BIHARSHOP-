<div>
    <div class="p-4 bg-gray-100 rounded-lg mb-4">
        <h3 class="text-lg font-semibold mb-2">Add Product Attributes</h3>
        <div class="grid grid-cols-2 gap-4">
            {{-- @foreach($attributes as $attribute)
                <div class="col-span-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ $attribute->name }}</label>
                    <select wire:change="addAttribute({{ $attribute->id }}, $event.target.value)" class="w-full px-3 py-2 border rounded-lg">
                        <option value="">Select {{ $attribute->name }}</option>
                        @foreach($attribute->values as $value)
                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach --}}
            @foreach($attributes as $attribute)
            <div class="col-span-1">
                <label class="block text-gray-700 text-sm font-bold mb-2">{{ $attribute['name'] }}</label>
                <select wire:change="addAttribute({{ $attribute['id'] }}, $event.target.value)" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select {{ $attribute['name'] }}</option>
                    @foreach($attribute['values'] as $value)
                        <option value="{{ $value['id'] }}">{{ $value['value'] }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        </div>

        <button wire:click="saveAttributes" class="bg-black text-white text-xs px-3 py-2 mt-4 rounded-md">Save Attributes</button>

        @if(session()->has('message'))
            <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
