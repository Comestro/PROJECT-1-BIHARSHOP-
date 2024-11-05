<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 px-5 gap-8">
    @foreach ($datas as $key => $item)
    <div class="group overflow-hidden rounded-lg shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105" onclick="this.classList.toggle('hovered')">
        <img class="w-full h-48 sm:h-64 object-cover object-top transition-transform duration-500 group-hover:scale-110 hovered:scale-110" src="{{ asset('storage/image/gallery/' . $item->image) }}" alt="Gallery Image {{ $key + 1 }}">

        <div class="absolute flex items-center justify-center inset-0 bg-gradient-to-t from-black via-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 p-4 rounded-lg hovered:opacity-100 sm:hovered:opacity-100">
            <h3 class="text-white text-lg sm:text-2xl font-bold">{{$item->caption}}</h3>
        </div>
    </div>
    @endforeach
</div>
