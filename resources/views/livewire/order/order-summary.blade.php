<div class="my-4  px-5 py-2 bg-white border border-slate-200" x-show="showSummary">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <span class=" rounded-full w-6 h-6 flex justify-center text-slate-100 bg-zinc-800 items-center">3</span>
            <h3 class="text-md font-semibold">ORDER SUMMARY</h3>
        </div>
    </div>
    {{-- {{dd($orderItems)}} --}}
    <div class="mt-2 rounded-lg">
        <div class=" flex flex-col gap-5 divide-y">
            @foreach($orderItems as $item)
            <div class="flex pt-3 flex-col md:flex-row pb-0">
                <div>
                    <img src="{{asset('storage/image/product/' . $item->products->image)}}" alt="{{$item->products->name}}" class="size-32 overflow-hidden">
                </div>
                <div class="flex-1 flex flex-col gap-1">
                    <h5>{{$item->products->name}}</h5>
                    @php echo $item->sizeVariant ? "<p class='text-sm text-gray-500'>Size: " . $item->sizeVariant->variant_value . "</p>" : '' @endphp

                    @php echo $item->colorVariant ? ' <p class="text-sm text-gray-500"> Color: ' . $item->colorVariant->variant_value . "</p>" : "" @endphp

                    <h6><del class="text-sm font-semibold text-slate-500">{{$item->products->formattedPrice}}</del>
                        <strong class="text-xl font-semibold">{{$item->products->formattedDiscountPrice}}</strong> <span class="text-green-600 font-semibold">{{$item->products->savingPercentage}}% Off</span></h6>
                </div>
                <div class="col-md-3 text-end">
                    <p class="text-light text-xs">Delivery within {{ \Carbon\Carbon::parse($item->updated_at)->addDays(4)->diffForHumans()  }} | <span class="text-success"><del>₹50/-</del> Free</span></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-end" @click="showPayment = true, showSummary = false">
        <button class="bg-zinc-900 text-white px-3 py-2 self-start mt-4 rounded-md">Continue</button>
    </div>

</div>
