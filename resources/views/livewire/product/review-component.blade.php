<div>
    <!-- resources/views/livewire/product/review-component.blade.php -->
    <div class="p-4 bg-gray-100 rounded-lg mb-4">
        <h3 class="text-lg font-semibold mb-2">Submit Your Review</h3>

        @if (session()->has('message'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
            {{ session('message') }}
        </div>
        @endif

        @auth
        <form wire:submit.prevent="submitReview">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">Rating</label>
                <input type="number" wire:model="rating" id="rating" min="1" max="5"
                    class="w-full px-3 py-2 border rounded-lg">
                @error('rating')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="review">Review</label>
                <textarea wire:model="review" id="review" rows="4" class="w-full px-3 py-2 border rounded-lg"></textarea>
                @error('review')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-black text-white text-xs px-3 py-2 rounded-md">Submit Review</button>
        </form>
        @else
        <div class="mt-4 p-2 bg-red-500 text-white rounded-md">
            Please <a href="{{ route('login') }}" class="underline">Login</a> to submit a review.
        </div>
        @endauth
        
    </div>
</div>