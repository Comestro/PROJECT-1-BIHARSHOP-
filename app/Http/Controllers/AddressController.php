<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::all();
        return view('admin.address.index', compact('address'));
    }

    public function create(){
        return view('admin.insertAddress');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'landmark' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'country' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in users table
        ]);
    
        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Create the address
        $address = Address::create([
            'landmark' => $request->landmark,
            'street' => $request->street,
            'area' => $request->area,
            'address_line' => $request->address_line, 
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'user_id' => $request->user_id,
        ]);
    
        // Redirect based on the creation result
        if ($address) {
            return redirect()->route('address.index')->with('success', 'Address added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add address.');
        }
    }
    

    public function edit(string $id)
    {
        $address = Address::find($id);
        if (!$address) {
            return redirect()->route('address.index')->with('error', 'No address Found');
        }

        return view('address.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'landmark' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'country' => 'required|string|max:255',
        ]);
    
        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Find the address by its ID
        $address = Address::find($id);
        if (!$address) {
            return response()->json([
                'status' => 404,
                'message' => "No address found"
            ], 404);
        }
    
        // Update the address
        $address->update([
            'landmark' => $request->landmark,
            'street' => $request->street,
            'area' => $request->area,
            'address_line' => $request->address_line,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);
    
        // Redirect based on the update result
        return redirect()->route('address.index')->with('success', 'Address updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->route('address.index')->with('error', 'Address deleted successfully.');
    }
}
