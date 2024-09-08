<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OptionValue;

class OptionValueController extends Controller
{
   
    public function index(){
        // Fetch paginated list of OptionValues
        $optionValue = OptionValue::paginate(4);  
        return view('admin.manageOptionValue', compact('optionValue'));
    }

    public function create(){
        return view('admin.insertOptionValue');
    }    


    public function store(Request $request){
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'variation_option_id' => 'required|exists:product_variation_options,id',
                'value' => 'required|string|max:255',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages(),
                ], 422);
            }

            // Create the variation option value
            $variationValue = OptionValue::create([
                'variation_option_id' => $request->variation_option_id,
                'value' => $request->value,
            ]);

            // Return response
            if ($variationValue) {
                return redirect()->back()->with('success', 'Variation Option Value added successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to add Variation Option Value.');
            }
    }

    public function edit($id){
            $variationValue = OptionValue::find($id);

            if (!$variationValue) {
                return redirect()->back()->with('error', 'No Variation Option Value Found.');
            }
            return view('variationOptionValue.edit', compact('variationValue'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'variation_option_id' => 'required|exists:product_variation_options,id',
            'value' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        $variationValue = OptionValue::find($id);

        if (!$variationValue) {
            return redirect()->back()->with('error', 'No Variation Option Value Found.');
        }

        $variationValue->update([
            'variation_option_id' => $request->variation_option_id,
            'value' => $request->value,
        ]);
        return redirect()->back()->with('success', 'Variation Option Value updated successfully.');
    }

    public function destroy(string $id)
    {
        $variationValue = OptionValue::find($id);
        $variationValue->delete();
        return redirect()->back()->with('error', 'Product deleted successfully.');
    }


}
