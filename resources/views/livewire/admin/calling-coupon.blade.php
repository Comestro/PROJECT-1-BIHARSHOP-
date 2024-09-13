<div>
    <div class="flex flex-1 justify-between">
       <div>        
          <h1 class="text-2xl font-bold mb-4">Manage Category</h1>
        </div>        
        <div class="">
            <div class="relative flex flex-1">
                <input type="search" 
                       class="border w-[200px] pl-8 pr-2 py-1 rounded-2xl border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2" 
                       placeholder="search here.." 
                       wire:model.live='search' />
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400" 
                     width="20" 
                     height="20" 
                     viewBox="0 0 48 48">
                  <path d="M 20.5 6 C 12.509634 6 6 12.50964 6 20.5 C 6 28.49036 12.509634 35 20.5 35 C 23.956359 35 27.133709 33.779044 29.628906 31.75 L 39.439453 41.560547 A 1.50015 1.50015 0 1 0 41.560547 39.439453 L 31.75 29.628906 C 33.779044 27.133709 35 23.956357 35 20.5 C 35 12.50964 28.490366 6 20.5 6 z M 20.5 9 C 26.869047 9 32 14.130957 32 20.5 C 32 23.602612 30.776198 26.405717 28.791016 28.470703 A 1.50015 1.50015 0 0 0 28.470703 28.791016 C 26.405717 30.776199 23.602614 32 20.5 32 C 14.130953 32 9 26.869043 9 20.5 C 9 14.130957 14.130953 9 20.5 9 z"></path>
                </svg>
              </div>
              
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4 text-left text-gray-600">Code</th>
                    <th class="py-2 px-4 text-left text-gray-600">Discount Type</th>
                    <th class="py-2 px-4 text-left text-gray-600">Discount Value</th>
                    <th class="py-2 px-4 text-left text-gray-600">Expiration Date</th>
                    <th class="py-2 px-4 text-left text-gray-600">Status</th>
                    <th class="py-2 px-4 text-left text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                <tr class="border-b">
                    <td class="py-2 px-4">{{$coupon->code}}</td>
                    <td class="py-2 px-4">{{$coupon->discount_type}}</td>
                    <td class="py-2 px-4">{{$coupon->discount_value}}</td>
                    <td class="py-2 px-4">{{$coupon->expiration_date}}</td>
                    <td class="py-2 px-4">
                        <button wire:click="toggleStatus({{ $coupon->id }})" class="text-blue-500 hover:text-blue-700">
                            @if($coupon->status)
                                
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium leading-5 bg-green-100 text-green-800 rounded-full">Activate</span>

                            @else
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium leading-5 bg-red-100 text-red-800 rounded-full">Deactivate</span>
                            @endif
                        </button>
                    </td>
                   <td class="py-2 px-4">
                        <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>

                    </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
