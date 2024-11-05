<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 px-5 gap-8">
    @foreach ($datas as $key => $item)
    <div class="group overflow-hidden rounded-lg shadow-lg transition-all duration-500 hover:shadow-2xl " onclick="this.classList.toggle('hovered')">
        <img class="w-full h-48 sm:h-64 object-cover object-top transition-transform duration-500 " src="{{ asset('storage/image/gallery/' . $item->image) }}" alt="Gallery Image {{ $key + 1 }}">

        <div class="text-slate-100 hover:text-slate-500 flex items-center justify-center  p-4 rounded-lg ">
            <h3 class=" text-lg sm:text-2xl font-bold">{{$item->caption}}</h3>
        </div>
    </div>
    @endforeach
</div>
