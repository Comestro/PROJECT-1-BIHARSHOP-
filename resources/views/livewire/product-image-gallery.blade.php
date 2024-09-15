<div>
    <!-- Main Image -->
    <img id="main-image" src="{{ asset('/storage/image/product/' . $mainImage) }}" alt="Product Image" class="w-full h-auto mb-4">

    <!-- Thumbnail Images -->
    <div class="grid grid-cols-4 gap-4">
        @foreach ($product->images as $photos)
            <img src="{{ asset('/storage/image/product/' . $photos->image_path) }}" alt="Thumbnail" class="w-full h-auto cursor-pointer thumbnail-image" wire:click="updateMainImage('{{ $photos->image_path }}')">
        @endforeach
    </div>
</div>
