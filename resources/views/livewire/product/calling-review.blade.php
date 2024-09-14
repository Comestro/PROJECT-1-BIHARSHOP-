<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach ($callingReview as $review )
    <div class="bg-white p-4 rounded-lg shadow-md">
        <div class="flex items-center mb-2">
            <span class="text-yellow-500">{{$review->rating}}</span>
            <span class="ml-2 text-gray-600">{{$review->user->name}}</span>
        </div>
        <p class="text-gray-700 mb-2">{{$review->review}}</p>
        <span class="text-sm text-gray-500">{{}  }</span>
    </div>

    @endforeach


</div>