<?php

namespace App\Http\Controllers;

use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductVariationController extends Controller
{
    //  * Display a listing of the resource.
    public function index()
    {
        $productVariations = ProductVariation::paginate(4);  
        return view('admin.manageProductVariation', compact('productVariation'));
    }

   
    //  * Show the form for creating a new resource.
    
    public function create()
    {
        return view('admin.insertProductVariation');
    }

    
    //  * Store a newly created resource in storage.  
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'sku' => 'required|string|max:255|unique:product_variations,sku',
            'color' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Create a new product variation
        $productVariation = ProductVariation::create([
            'product_id' => $request->product_id,
            'sku' => $request->sku,
            'color' => $request->color,
            'size' => $request->size,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
    
        // Check if the product variation was created successfully
        if ($productVariation) {
            return redirect()->route('product-variations.index')->with('success', 'Product variation added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add product variation.');
        }
    }

    
    //  * Display the specified resource.
    
    public function show(ProductVariation $productVariation)
    {
        //
    }

  
    //  * Show the form for editing the specified resource.
    
    public function edit(ProductVariation $productVariation,$id)
    {
        $product = ProductVariation::find($id);
        // Check if the product variation exists
        if (!$productVariation) {
            return redirect()->route('product-variations.index')->with('error', 'No Product Variation Found');
        }
        // Return the edit view with the product variation data
        return view('admin.product_variation.edit', compact('productVariation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVariation $productVariation,$id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'sku' => 'required|string|max:100|unique:product_variations,sku,' . $id,
            'price' => 'required|numeric|min:0',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'product_id' => 'required|exists:products,id', // Assuming you need to validate the product association
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Find the ProductVariation by its ID
        $productVariation = ProductVariation::find($id);
        if (!$productVariation) {
            return response()->json([
                'status' => 500,
                'message' => "No Product Variation Found"
            ], 500);
        }
    
        // Update the ProductVariation
        $productVariation->update([
            'sku' => $request->sku,
            'price' => $request->price,
            'color' => $request->color,
            'size' => $request->size,
            'stock' => $request->stock,
            'product_id' => $request->product_id, // Assuming you need to update the associated product
        ]);
    
        // Redirect with a success message
        return redirect()->route('product-variations.index')->with('success', 'Product Variation updated successfully.');
    }

    
    //  * Remove the specified resource from storage.
     
    public function destroy(ProductVariation $productVariation,$id)
    {
        $productVariation = ProductVariation::find($id);
        $productVariation->delete();
        return redirect()->route('product-variations.index')->with('error', 'Product deleted successfully.');
    }
}
