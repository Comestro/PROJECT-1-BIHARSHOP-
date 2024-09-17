<div class="flex flex-wrap justify-between gap-4">
    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-green-400 to-green-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- User SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">{{$userCount}}</h4>
                <span class="text-sm">Total User</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-orange-400 to-orange-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- Eye SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4-9 4-9-4z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 10v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l9 4 9-4" />
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">{{$proCount}}</h4>
                <span class="text-sm">Total Product</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- Envelope SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M3 7a4 4 0 014-4h2.586a2 2 0 011.414.586l7.414 7.414a2 2 0 010 2.828l-6 6a2 2 0 01-2.828 0l-7.414-7.414A2 2 0 013 9.586V7z" />
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">{{$catCount}}</h4>
                <span class="text-sm">Total Category</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- Truck SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">{{$orderCount}}</h4>
                <span class="text-sm">Total Delivery</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->
</div>
