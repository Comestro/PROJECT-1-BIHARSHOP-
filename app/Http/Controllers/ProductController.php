<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.manageProduct');
    }

    public function create(){

        return view('admin.product.insertProduct');
    }

    // made with livewire

    // public function store(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //         'discount_price' => 'nullable|numeric|min:0|lt:price',
    //         'quantity' => 'required|integer|min:0',
    //         'sku' => 'nullable|string|max:100',
    //         'category_id' => 'required|exists:categories,id',
    //         'brand' => 'nullable',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     // Check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 422,
    //             'errors' => $validator->messages()
    //         ], 422);
    //     }

    //     // Handle the file upload
    //     if ($request->hasFile('image')) {
    //         $image = "P" . time() . "." . $request->image->extension();
    //         $request->image->move(public_path("image/product"), $image);
    //     } else {
    //        $image = NULL;
    //     }

    //     $slug = Str::slug($request->name);

    //     $product = Product::create([
    //         'name' => $request->name,
    //         'slug' => $slug,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'discount_price' => $request->discount_price,
    //         'quantity' => $request->quantity,
    //         'sku' => $request->sku,
    //         'category_id' => $request->category_id,
    //         'brand' => $request->brand,
    //         'image' => $image,
    //     ]);

    //     if($product){
    //         return redirect()->route('product.index')->with('success', 'Product added successfully.');
    //     }
    //     else{
    //         return redirect()->back()->with('error', 'Unable to add Product.');

    //     }
    // }

    public function edit(string $slug)
    {

        return view('admin.product.viewProduct', ['slug' => $slug]);
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $slug)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'slug' => 'required|string|max:255|unique:products,slug,' . $id,
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //         'discount_price' => 'nullable|numeric|min:0|lt:price',
    //         'quantity' => 'required|integer|min:0',
    //         'sku' => 'nullable|string|max:100|unique:products,sku,' . $id,
    //         'category_id' => 'required|exists:categories,id',
    //         'brand' => 'nullable',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 422,
    //             'error' => $validator->messages()
    //         ], 422);
    //     }

    //     $product = Product::where('slug', $slug)->first();
    //     if (!$product) {
    //         return response()->json([
    //             'status' => 500,
    //             'message' => "No Product Found"
    //         ], 500);
    //     }

    //     // Handle the file upload
    //     $image = $product->image; // Default to current image
    //     if ($request->hasFile('image')) {
    //         // Delete the old image if it exists
    //         if ($product->image && file_exists(public_path("image/product/{$product->image}"))) {
    //             unlink(public_path("image/product/{$product->image}"));
    //         }

    //         $image = "P" . time() . "." . $request->image->extension();
    //         $request->image->move(public_path("image/product"), $image);
    //     }

    //     // Generate the slug
    //     $slug = Str::slug($request->name);

    //     // Update the product
    //     $product->update([
    //         'name' => $request->name,
    //         'slug' => $slug,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'discount_price' => $request->discount_price,
    //         'quantity' => $request->quantity,
    //         'sku' => $request->sku,
    //         'category_id' => $request->category_id,
    //         'brand' => $request->brand,
    //         'image' => $image,
    //     ]);

    //     if($product){
    //         return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Unable to update product.');
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('error', 'Product deleted successfully.');
    }
   
    

}
