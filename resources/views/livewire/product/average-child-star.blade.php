<div class="flex items-center space-x-2">
    <div class="flex gap-1 bg-green-500 items-center justify-center  px-4 py-1 rounded-full">
    <span class="text-normal font-semibold  text-white rounded-full">{{ number_format($averageRating, 1) }} </span>

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current text-white"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
        </svg>
    </div>
    <span class="text-gray-600">({{ $totalReviews }} reviews)</span>
</div>