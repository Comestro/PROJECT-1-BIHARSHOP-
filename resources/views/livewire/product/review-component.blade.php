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
        <h3 class="text-lg font-semibold mt-6 mb-2">Product Reviews</h3>
        @forelse($reviews as $review)
            <div class="p-4 border rounded-lg mb-4 bg-white">
                <div class="flex items-center mb-2">
                    <span class="font-semibold">{{ $review->user->name }}</span>
                    <span class="ml-2 text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                </div>
                <div class="mb-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="inline-block w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-300' }}"
                            viewBox="0 0 20 20" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 15.39l-3.4 1.785.7-4.073-3.059-2.978 4.246-.617L12 6.16l1.514 3.605 4.246.617-3.059 2.978.7 4.073L12 15.39z">
                            </path>
                        </svg>
                    @endfor
                </div>
                <p>{{ $review->review }}</p>
            </div>
        @empty
            <p>No reviews yet.</p>
        @endforelse
    </div>
</div>
