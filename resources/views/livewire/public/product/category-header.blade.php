<div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
    @forelse ($categories as $category)
        <a wire:navigate href="{{ route('filter', ['cat_slug' => $category->cat_slug]) }}">
            <div class="h-32 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ $category->image ? asset('storage/image/category/' . $category->image) : asset('path/to/default-image.jpg') }}"
                    alt="{{ $category->name }}"
                    class="w-full h-36 object-cover object-center group-hover:scale-110 transition-transform duration-300" />
                <div class="  bg-gradient-to-t from-black to-transparent opacity-90 transition-opacity duration-300"></div>
               
            </div>
            <div class=" flex items-end justify-center">
                <h3 class="text-[14px] truncate font-semibold group-hover:opacity-100 transition-opacity duration-300">
                    {{ $category->name }}</h3>
            </div>
        </a>
    @empty
        <p>No categories available.</p>
    @endforelse
</div>
