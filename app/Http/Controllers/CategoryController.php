<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(4);
        return view("admin.manageCategory")->with('categories', $categories);
    }

    public function create(){
        return view('admin.insertCategory');
    }

    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'cat_description' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Return validation errors if any
    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ], 422);
    }

    // Handle the file upload
    if ($request->hasFile('image')) {
        $image = "C" . time() . "." . $request->image->extension();
        $request->image->move(public_path("image/category"), $image);
    } else {
        $image = null;
    }

    // Generate the slug
    $slug = Str::slug($request->name);

    // Create the category
    $category = Category::create([
        'name' => $request->name,
        'cat_description' => $request->cat_description,
        'cat_slug' => $slug,
        'image' => $image,
    ]);

    // Redirect based on the creation result
    if ($category) {
        return redirect()->route('category.index')->with('success', 'Category added successfully.');
    } else {
        return redirect()->back()->with('error', 'Unable to add category.');
    }
}

    public function edit(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'No category Found');
        }

        // Assuming you have a view named 'products.edit' to display the edit form
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cat_description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Find the category by its ID
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 500,
                'message' => "No category found"
            ], 500);
        }
    
        // Handle the file upload if a new image is provided
        $image = $category->image; // Default to current image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image && file_exists(public_path("image/category/{$category->image}"))) {
                unlink(public_path("image/category/{$category->image}"));
            }
    
            // Store the new image
            $image = "C" . time() . "." . $request->image->extension();
            $request->image->move(public_path("image/category"), $image);
        }
    
        // Generate the slug for the category
        $slug = Str::slug($request->name);
    
        // Update the category with the new data
        $category->update([
            'name' => $request->name,
            'cat_description' => $request->cat_description,
            'cat_slug' => $slug,
            'image' => $image,
        ]);
    
        // Redirect based on the update result
        if ($category) {
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to update category.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('error', 'Category deleted successfully.');
    }
    
}
