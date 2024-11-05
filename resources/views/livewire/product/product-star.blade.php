<!-- Display Average Rating -->
<div class="">
    <div class="flex  items-center gap-2">
        <div class="flex flex-col md:flex items-center">
            <div class="flex items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-4 fill-current {{ $i <= $averageRating ? 'text-yellow-500' : 'text-gray-300' }}"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                @endfor
                <span class="text-sm font-semibold text-zinc-800 ml-1">{{ number_format($averageRating, 1) }}</span>

            </div>
           </div>
            <span class="text-gray-600 text-xs sm:text-sm flex truncate">| {{$totalReviews}} {{ $totalReviews == 1? "review":"reviews" }}</span>
        </div>
        <span class="text-gray-600 hidden md:flex">({{ $totalReviews }} {{ $totalReviews == 1 ? 'review' : 'reviews' }})</span>
    </div>
</div>

<!-- Your existing rating form goes here -->
