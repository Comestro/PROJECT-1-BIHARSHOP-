<div class="mb-2">
<form wire:submit.prevent="applyCoupon">
        <input type="text" wire:model="couponcode" placeholder="Enter promo code"
            class="w-full p-2 border border-gray-300 rounded">
        <button type="submit"
            class="w-full mt-2 bg-black text-white py-2 rounded hover:bg-gray-800 transition-colors">Apply</button>
    </form>

    @if (session('error'))
    <div class="text-red-500 text-xs ">{{session('error')}}</div>
    @endif

    @if (session('success'))
    <div class="text-green-500 text-xs">{{session('success')}}</div>
    
    @endif
</div>