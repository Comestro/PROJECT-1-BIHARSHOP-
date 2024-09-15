<div class="flex-1">


    <!-- Cart Item -->

    @foreach($orders->orderItems as $item)

    {{-- {{dd($item->products)}} --}}
    <!-- Cart Item -->
    <div class="flex items-center justify-between bg-white p-5 lg:py-10 rounded-lg shadow-md mb-4">

        <div class="flex items-center">

            <img src="{{ $item->products->image ? asset('storage/image/product/' . $item->products->image) : asset('path/to/default-image.jpg') }}" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
            <div class="ml-4">
                <p class="font-semibold"></p>
                <p class="text-sm text-gray-500">Size: {{$item->size_variant_id}}</p>
                <p class="text-sm text-gray-500">Color: {{$item->color_variant_id}}</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 ">
            <div class="flex justify-end ">
                <a href="" class="text-red-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
            </div>
            <div class="flex items-center">
                <p class="font-bold mr-4">$145</p>
                <div class="flex items-center">
                    <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                    <span class="mx-2">{{$item->quantity}}</span>
                    <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    {{-- <!-- Cart Item -->
    <div class="flex items-center justify-between bg-white p-5 lg:py-10 rounded-lg shadow-md mb-4">

        <div class="flex items-center">

            <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
            <div class="ml-4">
                <p class="font-semibold">Gradient Graphic T-shirt</p>
                <p class="text-sm text-gray-500">Size: Large</p>
                <p class="text-sm text-gray-500">Color: White</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 ">
            <div class="flex justify-end ">
                <a href="" class="text-red-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
            </div>
            <div class="flex items-center">
                <p class="font-bold mr-4">$145</p>
                <div class="flex items-center">
                    <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                    <span class="mx-2">1</span>
                    <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Item -->
    <div class="flex items-center justify-between bg-white p-5 lg:py-10 rounded-lg shadow-md mb-4">

        <div class="flex items-center">

            <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
            <div class="ml-4">
                <p class="font-semibold">Gradient Graphic T-shirt</p>
                <p class="text-sm text-gray-500">Size: Large</p>
                <p class="text-sm text-gray-500">Color: White</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 ">
            <div class="flex justify-end ">
                <a href="" class="text-red-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
            </div>
            <div class="flex items-center">
                <p class="font-bold mr-4">$145</p>
                <div class="flex items-center">
                    <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                    <span class="mx-2">1</span>
                    <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                </div>
            </div>
        </div>
    </div> --}}

</div>
