<div class="px-4 sm:px-6 md:px-8 lg:px-10">
    <!-- Display Average Rating -->
    <div class="space-y-3">
        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">Average Rating</h2>
        <div class="flex flex-wrap items-center space-x-2 sm:space-x-3">
            <div class="flex">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 fill-current {{ $i <= $averageRating ? 'text-yellow-500' : 'text-gray-300' }}"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                @endfor
            </div>
            <div class="flex flex-col">
                <span class="text-sm sm:text-md md:text-lg font-semibold">{{ number_format($averageRating, 1) }} / 5</span>
                <span class="text-xs sm:text-sm md:text-base text-gray-600">({{ $totalReviews }} reviews & {{$totalRating}} rating)</span>
            </div>
        </div>
    </div>

    <!-- Your existing rating form goes here -->

</div>
