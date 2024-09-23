<div class="chart-container relative">
    <h2 class="text-xl font-bold">Total Orders</h2>

    <svg width="100%" height="300px" class="mt-9" viewBox="0 0 600 300" preserveAspectRatio="none">
        <!-- Background rectangle -->
        <rect width="600" height="300" fill="rgba(240, 240, 240, 0.5)" />

        <!-- Y-Axis Labels -->
        @for ($i = 0; $i <= 5; $i++)
            <text x="5" y="{{ 300 - ($i * 60) }}" font-size="10" fill="gray">{{ $i * 10 }}</text>
            <line x1="30" y1="{{ $i * 60 }}" x2="600" y2="{{ $i * 60 }}" stroke="rgba(200, 200, 200, 0.8)" stroke-width="1" />
        @endfor

        {{-- Total Orders path (blue) --}}
        <path id="total-orders-path" d="
            M 30 {{ 300 - $data['total_orders'][0] * 10 }} 
            @for ($i = 1; $i < count($data['total_orders']); $i++)
                L {{ $i * 200 + 30 }} {{ 300 - $data['total_orders'][$i] * 10 }}
            @endfor
            L {{ ($i - 1) * 200 + 30 }} 300 L 30 300 Z"
            fill="rgba(59, 130, 246, 0.2)"
            stroke="rgba(59, 130, 246, 1)"
            stroke-width="2"
        />

        {{-- New Users path (green) --}}
        <path id="new-users-path" d="
            M 30 {{ 300 - $data['new_users'][0] * 10 }} 
            @for ($i = 1; $i < count($data['new_users']); $i++)
                L {{ $i * 200 + 30 }} {{ 300 - $data['new_users'][$i] * 10 }}
            @endfor
            L {{ ($i - 1) * 200 + 30 }} 300 L 30 300 Z"
            fill="rgba(16, 185, 129, 0.2)"
            stroke="rgba(16, 185, 129, 1)"
            stroke-width="2"
        />

        <!-- Data points and tooltips -->
        @foreach ($data['total_orders'] as $i => $total)
            <g class="hover-group">
                <circle class="data-point" cx="{{ $i * 200 + 30 }}" cy="{{ 300 - $total * 10 }}" r="5" fill="rgba(59, 130, 246, 1)" />
                <text class="tooltip" x="{{ $i * 200 + 30 }}" y="{{ 300 - $total * 10 - 10 }}" text-anchor="middle" fill="rgba(59, 130, 246, 1)" font-size="10">
                    {{ $total }} Orders
                </text>
            </g>
        @endforeach
        @foreach ($data['new_users'] as $i => $total)
            <g class="hover-group">
                <circle class="data-point" cx="{{ $i * 200 + 30 }}" cy="{{ 300 - $total * 10 }}" r="5" fill="rgba(16, 185, 129, 1)" />
                <text class="tooltip" x="{{ $i * 200 + 30 }}" y="{{ 300 - $total * 10 - 10 }}" text-anchor="middle" fill="rgba(16, 185, 129, 1)" font-size="10">
                    {{ $total }} Users
                </text>
            </g>
        @endforeach
    </svg>

    <div class="flex justify-between mt-4">
        {{-- Display months --}}
        @foreach ($data['months'] as $month)
            <span class="text-xs">{{ $month }}</span>
        @endforeach
    </div>

    <div class="flex flex-row gap-3 sm:gap-0 sm:flex-row items-center justify-center mt-4 space-x-0 sm:space-x-4 space-y-2 sm:space-y-0">
        <div class="flex items-center sm:mb-1 mt-1 ">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
            <span class="text-xs md:text-sm text-gray-600">Total Orders</span>
        </div>
        <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-green-500 rounded-full"></span>
            <span class="text-xs md:text-sm text-gray-600">New Users</span>
        </div>
    </div>
</div>
