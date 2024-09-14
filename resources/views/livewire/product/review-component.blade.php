<div class="p-6">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if (!$alreadyRated)
    
   
    <form wire:submit.prevent="submitReview">
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Rate this product</h2>
            <div class="flex items-center space-x-2 mb-2">
                <span class="text-xl font-bold">{{ $rating }}</span>
                <span class="text-gray-600">/ 5</span>
            </div>
            <div class="rating flex items-center space-x-1">
                @for ($i = 1; $i <= 5; $i++)
                    <label class="cursor-pointer relative group">
                        <input type="radio" wire:model.live="rating" value="{{ $i }}" class="hidden" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current transition-colors duration-300
                            group-hover:text-yellow-400 {{ $rating >= $i ? 'text-yellow-500' : 'text-gray-300' }}"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </label>
                @endfor
            </div>
            @error('rating')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="review">Review</label>
            <textarea wire:model="review" id="review" rows="4"
                class="w-full px-3 py-2 border rounded-lg"
                placeholder="Write your review here"></textarea>
            @error('review')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Submit Review
        </button>
    </form>

    @endif
</div>
