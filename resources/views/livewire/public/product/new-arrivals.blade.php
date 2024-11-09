<div>
    <h1 class="text-3xl font-black text-center mb-8">New Arrivals</h1>


    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-[5%]">

        @foreach ($newArrivals as $item)
            <livewire:public.product.product-card :item="$item" />
        @endforeach
    </div>

    <!-- Loading spinner -->
    <div id="loading-spinner" class="hidden flex justify-center mt-4">
        <svg class="w-6 h-6 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v8l4 4M4 12a8 8 0 118 8 8 8 0 01-8-8z" />
        </svg>
    </div>

    <!-- View All Button -->
    <div class="flex flex-1 justify-center mt-10 px-[5%]">
        <button wire:click="loadMore"
            class="w-full md:w-40 px-2 py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">
            View All
        </button>
    </div>

    <div class="border border-b-0 bg-slate-200 my-12 mx-[5%]"></div>
</div>
