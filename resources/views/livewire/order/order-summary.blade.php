<div class="mb-4 bg-slate-100">
    <div class="flex justify-between items-center p-2 border-b pb-2">
        <div class="flex items-center space-x-2">
            <span class=" rounded-full w-6 h-6 flex justify-center text-slate-100 bg-zinc-800 items-center">3</span>
            <h3 class="text-lg font-semibold">ORDER SUMMARY</h3>
        </div>
    </div>
    {{-- {{dd($orderItems)}} --}}
    @foreach($orderItems as $item)
    <div class="mt-2 bg-slate-50 p-4 rounded-lg">
        <div class="container my-5">
            <div class="row align-items-center gap-10 flex">
                <div class="col-md-2">
                    <img src="{{ $item->products->image ? asset('storage/image/product/' . $item->products->image) : asset('path/to/default-image.jpg') }}" alt="{{$item->products->name}}" class="img-fluid h-[8rem]">
                </div>
                <div class="col-md-7">
                    <h5>{{$item->products->name}}</h5>
                    <p><strong>{{$item->color_variant_id}} {{$item->size_variant_id}}</strong></p>
                    <h6><del>{{$item->products->formattedPrice}}</del> <strong>{{$item->products->formattedDiscountPrice}}</strong> <span class="text-success">{{$item->products->savingPercentage}}% Off</span></h6>
                </div>
                <div class="col-md-3 text-end">
                    <p><strong>Delivery within {{ \Carbon\Carbon::parse($item->updated_at)->addDays(4)->diffForHumans()  }}</strong> | <span class="text-success">Free</span></p>
                </div>
               
            </div>
           <div class="flex justify-end"  @click.prevent="showPayment = true">
           <button class="bg-zinc-900 text-white px-3 py-2 self-start mt-4 rounded-md">Continue</button>
           </div>
        </div>
    </div>
    @endforeach
</div>
