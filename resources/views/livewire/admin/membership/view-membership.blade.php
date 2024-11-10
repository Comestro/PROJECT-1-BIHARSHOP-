<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">

    {{-- {{dd($member)}} --}}
    <div class="grid grid-cols-1 gap-9">
        <div class="flex flex-col gap-9">
            <div class="container  p-6">
                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold mb-6">Membership Details </h1>
                    @if ($member)
                        <div class=" text-center flex justify-end space-x-2 mt-2">
                            <a href="{{ route('membership.edit', ['id' => $member->id]) }}"
                                class="bg-green-400 hover:bg-green-600  px-3  py-2 flex items-center text-white rounded-lg"><svg
                                    class="w-[22px] h-[22px] text-white-800  " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Verify Details</a>
                        </div>

                        <button wire:click="openModal({{ $member->id }})" class="flex justify-between border-none ring-1 ring-gray-300 font-bold focus:ring-gray-400 focus:ring-2 bg-white text-blue-500 px-4 py-2 rounded-3xl hover:bg-blue-500 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z" />
                            </svg>
                            Edit
                        </button>
                        <div class=" text-center flex justify-end space-x-2 mt-2">
                            <a href="{{ route('membership.edit', ['id' => $member->id]) }}"
                                class="bg-blue-400 hover:bg-blue-600  px-3  py-2 flex items-center text-white rounded-lg"><svg
                                    class="w-[22px] h-[22px] text-white-800  " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Edit Now</a>
                        </div>
                </div>



                <div class="bg-gray-100 shadow-lg rounded-lg p-6  mx-auto mt-8">
                    <table class="table-auto w-full text-left border-collapse">
                        <tbody>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Membership Id</th>
                                <td class="py-2 px-4">{{ $member->membership_id ?? 'N/A' }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Full Name</th>
                                <td class="py-2 px-4">{{ $member->name }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Date Of Birth</th>
                                <td class="py-2 px-4">{{ $member->date_of_birth }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Father's Name</th>
                                <td class="py-2 px-4">{{ $member->father_name }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Mother's Name</th>
                                <td class="py-2 px-4">{{ $member->mother_name }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Mobile No.</th>
                                <td class="py-2 px-4">{{ $member->mobile }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Whatsapp No.</th>
                                <td class="py-2 px-4">{{ $member->whatsapp }}</td>
                            </tr>

                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Email Id</th>
                                <td class="py-2 px-4">{{ $member->email }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Address</th>
                                <td class="py-2 px-4">
                                    {{ $member->home_address }}, {{ $member->city }}, {{ $member->state }},
                                    {{ $member->pincode }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Bank A/c No.</th>
                                <td class="py-2 px-4">{{ $member->account_no }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Bank Name</th>
                                <td class="py-2 px-4">{{ $member->bank_name }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Branch Name</th>
                                <td class="py-2 px-4">{{ $member->branch_name }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Pancard</th>
                                <td class="py-2 px-4">{{ $member->pancard }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Aadhar No.</th>
                                <td class="py-2 px-4">{{ $member->aadhar_card }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Payment Status</th>
                                <td class="py-2 px-4">{{ $member->isPaid ? 'Paid' : 'Pending' }}</td>
                            </tr>
                            @if ($member->isPaid)
                                <tr class="border-b  hover:bg-gray-200">
                                    <th class="py-2 px-4 font-semibold text-gray-700">Payment Amount</th>
                                    <td class="py-2 px-4">{{ $member->payment->amount ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b  hover:bg-gray-200">
                                    <th class="py-2 px-4 font-semibold text-gray-700">Transaction Date</th>
                                    <td class="py-2 px-4">{{ $member->payment->transaction_date ?? 'N/A' }}
                                    </td>
                                </tr>
                                <tr class="border-b  hover:bg-gray-200">
                                    <th class="py-2 px-4 font-semibold text-gray-700">Receipt No.</th>
                                    <td class="py-2 px-4">{{ $member->payment->receipt_no ?? 'N/A' }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('membership.index') }}"
                            class="text-green-600 hover:text-green-800 underline">Back to Membership List</a>
                    </div>


                </div>
            @else
                <p class="text-red-500">Data not found.</p>
                @endif
            </div>
        </div>


    </div>



    @if ($member->isPaid)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">Membership Id</th>
                        <th class="py-3 px-6 text-center">Member Name</th>
                        <th class="py-3 px-6 text-center">Total Amount</th>
                        <th class="py-3 px-6 text-center">View</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($referals as $item)
                        <tr class="border-b">
                            <td class="py-3 px-6 text-center">{{ $item->membership_id }}</td>
                            <td class="py-3 px-6 text-center">{{ $item->name }}</td>
                            <td class="py-3 px-6 text-center"> ₹
                                {{ $item->payment->amount ?? 'N/A' }}
                            </td>

                            <td class="py-3 px-6 text-center flex justify-center space-x-2">
                                <a href="{{ route('membership.view', ['id' => $item->id]) }}"
                                    class="bg-blue-400 hover:bg-blue-600 flex px-3 gap-1 py-2 text-white rounded-lg"><svg
                                        class="w-[22px] h-[22px] text-white-800  " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    View Member </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-lg">
            <h3 class="text-lg font-semibold mb-4">Approve Now</h3>
            <form wire:submit.prevent="approveNow">
                <div class="mb-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">Coupon Code</label>
                    <input type="text" id="code" wire:model="code" class="mt-1 block w-full p-2 border rounded">
                    @error('code') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="discount_type" class="block text-sm font-medium text-gray-700">Discount Type</label>
                    <select id="discount_type" wire:model="discount_type" class="mt-1 block w-full p-2 border rounded">
                        <option value="">Select Type</option>
                        <option value="percentage">Percentage</option>
                        <option value="fixed">Fixed Amount</option>
                    </select>
                    @error('discount_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="discount_value" class="block text-sm font-medium text-gray-700">Discount Value</label>
                    <input type="number" id="discountValue" wire:model="discount_value" class="mt-1 block w-full p-2 border rounded">
                    @error('discount_value') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                    <input type="date" id="expirationDate" wire:model="expiration_date" class="mt-1 block w-full p-2 border rounded">
                    @error('expiration_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" wire:click="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
