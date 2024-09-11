<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OptionValue;


class ProductImageController extends Controller
{
    //
    public function index(){
        // Fetch paginated list of productImage
        $productImage = ProductImage::paginate(4);  
        return view('admin.manageProductImage', compact('productImage'));
    }

    public function create(){
        return view('admin.insertProductImage');
    }   
    
    
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = "P" . time() . "." . $request->image->extension();
            $request->image->move(public_path("images/products"), $imagePath);  // Move to the desired folder
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'Image is required',
            ], 422);
        }

        // Create the product image record
        $productImage = ProductImage::create([
            'product_id' => $request->product_id,
            'image_path' => $imagePath,
        ]);

        if ($productImage) {
            return redirect()->route('product.show', $request->product_id)->with('success', 'Product image added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add product image.');
        }
    }

    public function edit($id)
    {
        $productImage = ProductImage::find($id);
            if (!$productImage) {
            return redirect()->back()->with('error', 'Product image not found.');
        }
            return view('productImages.edit', compact('productImage'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Only allow certain image file types
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the product image by ID
        $productImage = ProductImage::find($id);

        // Check if the product image exists
        if (!$productImage) {
            return redirect()->back()->with('error', 'Product image not found.');
        }

        // Handle image upload if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($productImage->image_path && file_exists(public_path("images/products/{$productImage->image_path}"))) {
                unlink(public_path("images/products/{$productImage->image_path}"));
            }

            // Upload new image
            $imagePath = "P" . time() . "." . $request->image->extension();
            $request->image->move(public_path("images/products"), $imagePath);
            $productImage->image_path = $imagePath;
        }
        $productImage->save();
        return redirect()->route('product.show', $productImage->product_id)->with('success', 'Product image updated successfully.');
    }


    public function destroy($id)
{
    // Find the product image by ID
    $productImage = ProductImage::find($id);

    // Check if the product image exists
    if (!$productImage) {
        return redirect()->back()->with('error', 'Product image not found.');
    }

    // Delete the image file from the server if it exists
    if ($productImage->image_path && file_exists(public_path("images/products/{$productImage->image_path}"))) {
        unlink(public_path("images/products/{$productImage->image_path}"));
    }

    // Delete the product image record from the database
    $productImage->delete();

    // Redirect back with a success message
    return redirect()->route('product.show', $productImage->product_id)->with('success', 'Product image deleted successfully.');
}

}
