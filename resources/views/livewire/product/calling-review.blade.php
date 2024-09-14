<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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