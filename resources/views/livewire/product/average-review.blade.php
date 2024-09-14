<div class="px-6">
    <!-- Display Average Rating -->
    <div class="">
        <h2 class="text-2xl font-semibold">Average Rating</h2>
        <div class="flex items-center space-x-2">
            <div class="flex items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current {{ $i <= $averageRating ? 'text-yellow-500' : 'text-gray-300' }}"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                @endfor
            </div>
            <span class="text-xl font-bold">{{ number_format($averageRating, 1) }} / 5</span>
            <span class="text-gray-600">({{ $totalReviews }} reviews)</span>
        </div>
    </div>

    <!-- Your existing rating form goes here -->

</div>
