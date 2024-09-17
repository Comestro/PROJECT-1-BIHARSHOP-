<div>
    {{-- {{dd($addresses)}} --}}
    <div class="">
        <h4 class="text-xl font-bold mb-4">Addresses</h4>
    
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Alt Phone</th>
                    <th class="border px-4 py-2">Address Type</th>
                    <th class="border px-4 py-2">Landmark</th>
                    <th class="border px-4 py-2">Street</th>
                    <th class="border px-4 py-2">Area</th>
                    <th class="border px-4 py-2">Address Line</th>
                    <th class="border px-4 py-2">City</th>
                    <th class="border px-4 py-2">State</th>
                    <th class="border px-4 py-2">Postal Code</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td class="border px-4 py-2">{{ $address->id }}</td>
                        <td class="border px-4 py-2">{{ $address->name }}</td>
                        <td class="border px-4 py-2">{{ $address->phone }}</td>
                        <td class="border px-4 py-2">{{ $address->alt_phone }}</td>
                        <td class="border px-4 py-2">{{ $address->address_type }}</td>
                        <td class="border px-4 py-2">{{ $address->landmark }}</td>
                        <td class="border px-4 py-2">{{ $address->street ?? 'NULL' }}</td>
                        <td class="border px-4 py-2">{{ $address->area }}</td>
                        <td class="border px-4 py-2">{{ $address->address_line }}</td>
                        <td class="border px-4 py-2">{{ $address->city }}</td>
                        <td class="border px-4 py-2">{{ $address->state }}</td>
                        <td class="border px-4 py-2">{{ $address->postal_code }}</td>
                        <td class="border px-4 py-2">
                            <button class="px-4 py-2 rounded-lg text-white 
                                {{ $address->status == 1 ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $address->status == 1 ? 'Active' : 'Inactive' }}
                            </button>
                        </td>
                         </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
