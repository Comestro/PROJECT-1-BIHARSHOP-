<div class="p-4 bg-white rounded-lg shadow-sm">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Product Highlights</h2>
    <ul class="list-disc list-inside text-gray-700 space-y-3">
        @forelse ($product->highlights as $highlight)
            <li class="flex items-start space-x-3">
                <!-- Icon for highlights -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-green-600 flex-shrink-0" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-base">{{ $highlight->highlights }}</span>
            </li>
        @empty
            <li class="text-gray-500 text-base">No highlights available</li>
        @endforelse
    </ul>
</div>
