<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VariationOption;

class VariationOptionController extends Controller
{
    public function index()
    {
        $variation = VariationOption::paginate(4);
        return view('admin.manageVariation', compact('variation'));
    }

    public function create(){
        return view('admin.insertVariation');
    }    

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        $data = VariationOption::create([
            'name' => $request->name,        
        ]);

        if($data){
            return redirect()->route('variation.index')->with('success', 'Variation added successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Unable to add variation.');
 
        }
    }

    public function edit(string $id)
    {
        $variation = VariationOption::find($id);
        if (!$variation) {
            return redirect()->route('variation.index')->with('error', 'No variation Found');
        }

        // Assuming you have a view named 'products.edit' to display the edit form
        return view('variation.edit', compact('variation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
    
        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Find the category by its ID
        $data = VariationOption::find($id);
        if (!$data) {
            return response()->json([
                'status' => 500,
                'message' => "Not found"
            ], 500);
        }
    
        // Update the category with the new data
        $data->update([
            'name' => $request->name,
        ]);
    
        // Redirect based on the update result
        if ($data) {
            return redirect()->route('variation.index')->with('success', 'Variation updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to update variation.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = VariationOption::find($id);
        $data->delete();
        return redirect()->route('category.index')->with('error', 'Variation deleted successfully.');
    }
    
}
