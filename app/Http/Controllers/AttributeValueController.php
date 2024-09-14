<?php

namespace App\Http\Controllers;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function index()
    {
        return view('admin.attribute.manageAttribute');
    }

    public function create()
    {
        return view('admin.attribute.insertAttribute');
    }

    // move on livewire admin.create-coupon component

    public function edit(string $id)
    {
        $attributeValue = AttributeValue::find($id);
        return view('admin.attribute.editAttribute', compact('attributeValue'));
    }

    public function update(Request $request, string $id)
        {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'value' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }

            $attributeValue = AttributeValue::find($id);
            if (!$attributeValue) {
                return response()->json([
                    'status' => 500,
                    'message' => "No Attribute Value Found"
                ], 500);
            }

            // Update the coupon
            $attributeValue->update([
                'value' => $request->value,
                'attribute_id' => $request->attribute_id,
            ]);

            // Redirect based on the update result
            if ($attributeValue) {
                return redirect()->route('attribute.create')->with('success', 'Attribute updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update attribute.');
            }
        }

    public function destroy(string $id)
        {
            $attribute = AttributeValue::find($id);
            $attribute->delete();
            return redirect()->route('attribute.create')->with('success', 'Attribute deleted successfully.');
        }
}
