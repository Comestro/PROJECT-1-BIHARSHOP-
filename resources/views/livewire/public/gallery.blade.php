<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

    @foreach ($datas as $key => $item)
    <div class="relative group">
        <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('storage/image/gallery/' . $item->image) }}" alt="Gallery Image 1">
        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
            <h3 class="text-white text-lg font-bold">Image {{$key+1}} Description</h3>
        </div>
        <h2>{{$item->caption}}</h2>
    </div>
    @endforeach
</div>