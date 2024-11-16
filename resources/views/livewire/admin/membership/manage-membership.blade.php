<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <!-- Other code -->

    <div class="flex flex-1 justify-between items-center mb-10">
        <div>
            <h1 class="text-2xl font-bold mb-4">Manage Membership</h1>
        </div>
        <div class=" flex gap-2  items-center">
            <div class="relative flex flex-1">
                <input type="search"
                    class="border w-[300px] pl-8 pr-2 py-2 rounded border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2"
                    placeholder="search here.." wire:model.live='searchTerm' />
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400" width="20"
                    height="20" viewBox="0 0 48 48">
                    <path
                        d="M 20.5 6 C 12.509634 6 6 12.50964 6 20.5 C 6 28.49036 12.509634 35 20.5 35 C 23.956359 35 27.133709 33.779044 29.628906 31.75 L 39.439453 41.560547 A 1.50015 1.50015 0 1 0 41.560547 39.439453 L 31.75 29.628906 C 33.779044 27.133709 35 23.956357 35 20.5 C 35 12.50964 28.490366 6 20.5 6 z M 20.5 9 C 26.869047 9 32 14.130957 32 20.5 C 32 23.602612 30.776198 26.405717 28.791016 28.470703 A 1.50015 1.50015 0 0 0 28.470703 28.791016 C 26.405717 30.776199 23.602614 32 20.5 32 C 14.130953 32 9 26.869043 9 20.5 C 9 14.130957 14.130953 9 20.5 9 z">
                    </path>
                </svg>
            </div>
        </div>
                <form action="{{ route('membership.export') }}" method="GET" class=" flex gap-2">
                    <div class="flex  items-center space-x-2">
                        <input type="date" name="start_date" class="px-4 py-2  border rounded" required>
                        <input type="date" name="end_date" class="px-4 py-2 border rounded" required>
                    </div>
                    <button type="submit" class="px-4 py-2 flex items-center bg-orange-400 text-white hover:bg-orange-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Download Report
                    </button>
                </form>
       
    </div>
    <!-- Category Table -->
    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center ">
                <tr>
                    <th scope="col" class="px-6 py-3 text-start">S.no</th>
                    <th scope="col" class="px-6 py-3 text-start">Name</th>
                    <th scope="col" class="px-6 py-3 text-start">Membership Id</th>
                    <th scope="col" class="px-6 py-3">Order Zone</th>
                    <th scope="col" class="px-6 py-3">Verification Status</th>
                    <th scope="col" class="px-6 py-3">Payment</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberships as $key=>$member)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{$key+1}}
                        </th>
                        {{-- <td class="px-6 py-4">
                            <img src="{{ $member->image ? asset('storage/image/membership/'. $member->image,) : asset('path/to/default-image.jpg') }}"
                                alt="Membership Image" class="w-12 h-12 object-cover border border-gray-300 ">
                        </td> --}}
                        <td class="px-6 py-4">{{ $member->name }}</td>
                        <td class="px-6 py-4 border text-sm border-gray-200 ">  {{ $member->membership_id ?? 'Not Found' }}</td>
                        <td class="px-6 py-2 border text-sm border-gray-200 text-center">
                            @if($member->isOrdered == 'g')
                                <span class="bg-green-400 text-white px-3 py-1 rounded-full">Green</span>
                            @else
                                <span class="bg-red-400 text-white px-3 py-1 rounded-full">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-2 border text-sm border-gray-200 text-center">
                            @if($member->status == 1)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">Approved</span>
                           
                            @elseif($member->status === 'processing')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">Processing</span>
                            @elseif($member->status === 'canceled')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">Canceled</span>
                            @else()
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Pending</span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-2 border text-sm border-gray-200 text-center">
                            @if($member->isPaid == 1)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">Completed</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex">
                            <td class=" text-center flex justify-center space-x-2">
                                <a href="{{ route('membership.view', ['id' => $member->id]) }}" class="bg-blue-400 hover:bg-blue-600 flex px-3 gap-1 py-2 text-white rounded-lg"><svg class="w-[22px] h-[22px] text-white-800  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  View</a>
                             </td>
                            {{-- <td class=" text-center flex justify-center space-x-2">
                                <a href="{{ route('membership.edit', ['id' => $member->id]) }}" class="bg-blue-400 hover:bg-blue-600 flex px-3 gap-1 py-2 text-white rounded-lg"><svg class="w-[22px] h-[22px] text-white-800  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  Edit</a>
                             </td> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
