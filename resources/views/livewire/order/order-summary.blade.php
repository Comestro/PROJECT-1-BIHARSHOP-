<div class="mb-4">
    <div class="flex justify-between items-center border-b pb-2">
        <div class="flex items-center space-x-2">
            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">3</span>
            <h3 class="text-lg font-semibold">ORDER SUMMARY</h3>
        </div>
    </div>
    {{-- {{dd($orderItems)}} --}}
    @foreach($orderItems as $item)
    <div class="mt-2 bg-gray-50 p-4 rounded-lg">
        <div class="container my-5">
            <div class="row align-items-center gap-10 flex">
                <div class="col-md-2">
                    <img src="{{ $item->product->image ? asset('storage/image/product/' . $item->product->image) : asset('path/to/default-image.jpg') }}" alt="{{$item->product->name}}" class="img-fluid h-[8rem]">
                </div>
                <div class="col-md-7">
                    <h5>{{$item->product->name}}</h5>
                    <p><strong>{{$item->color_variant_id}} {{$item->size_variant_id}}</strong></p>
                    <h6><del>{{$item->product->formattedPrice}}</del> <strong>{{$item->product->formattedDiscountPrice}}</strong> <span class="text-success">{{$item->product->savingPercentage}}% Off</span></h6>
                </div>
                <div class="col-md-3 text-end">
                    <p><strong>Delivery within {{ \Carbon\Carbon::parse($item->updated_at)->addDays(4)->diffForHumans()  }}</strong> | <span class="text-success">Free</span></p>
                </div>
            </div>
        </div>
    </div> 
    @endforeach   
</div>
