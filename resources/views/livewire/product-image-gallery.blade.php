<div class="flex p-2 md:h-[550px]">
    <!-- Thumbnail Images -->
    <div class="w-3/12 flex flex-col gap-4 overflow-x-auto md:overflow-visible">
        @foreach ($product->images as $photos)
            <img 
                src="{{ asset('/storage/image/product/' . $photos->image_path) }}" 
                alt="Thumbnail" 
                class="w-20 h-20 md:w-28 md:h-28 object-contain cursor-pointer thumbnail-image border border-gray-200 transition-transform" 
                wire:click="updateMainImage('{{ $photos->image_path }}')">
        @endforeach
    </div>

    <!-- Main Image -->
    <div class="w-9/12 flex">
        <img 
            id="main-image" 
            src="{{ asset('/storage/image/product/' . $mainImage) }}" 
            alt="Product Image" 
            class="object-contain w-full max-w-lg h-[300px] md:h-[450px]">
    </div>
</div>
