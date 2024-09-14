<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Validator;


class ProductVariantController extends Controller
{
    public function index()
    {
        return view('admin.product.callingProduct');
    }

    public function create()
    {
        return view('admin.product.insertProduct');
    }

    // move on livewire admin.create-coupon component

    public function edit(string $id)
    {
        $attribute = ProductVariant::find($id);
        return view('admin.attribute.editAttribute', compact('attribute'));
    }

    public function update(Request $request, string $id)
        {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }

            $attribute = ProductVariant::find($id);
            if (!$attribute) {
                return response()->json([
                    'status' => 500,
                    'message' => "No Attribute Found"
                ], 500);
            }

            // Update the coupon
            $attribute->update([
                'name' => $request->name,
            ]);

            // Redirect based on the update result
            if ($attribute) {
                return redirect()->route('attribute.index')->with('success', 'Attribute updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update attribute.');
            }
        }

    public function destroy(string $id)
        {
            $attribute = ProductVariant::find($id);
            $attribute->delete();
            return redirect()->route('attribute.index')->with('success', 'Attribute deleted successfully.');
        }
}