<div><h1 class="text-3xl font-black text-center mb-8">New Arrivals</h1>


<div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-[5%]">

    @foreach ($newArrivals as $item )
    <livewire:public.product.product-card :item="$item" />

    @endforeach
</div>

<!-- view all button -->
<div class="flex flex-1 justify-center mt-10 px-[5%]">
    <button class=" w-full md:w-40 px-2  py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">View All</button>
</div>

<div class="border border-b-0 bg-slate-200 my-12 mx-[5%]"></div></div>