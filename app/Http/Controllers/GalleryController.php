<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Contracts\Validation\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.manageGallery');
    }

    public function create()
    {
        return view('admin.gallery.insertGallery');
    }

    // move on livewire admin.create-gallery component

    public function edit(string $id)
        {
            $gallery = Gallery::find($id);
            return view('admin.gallery.editGallery', compact('gallery'));
        }

    public function update(Request $request, string $id)
        {
            // Validate the request data
            $validator = Validator::make($request->all(), [ 
                'caption' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }

            // Find the data by ID
            $gallery = Gallery::find($id);
            if (!$gallery) {
                return response()->json([
                    'status' => 500,
                    'message' => "No Data Found"
                ], 500);
            }

            $image = $gallery->image;
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($gallery->image && file_exists(public_path("image/gallery/{$gallery->image}"))) {
                    unlink(public_path("image/gallery/{$gallery->image}"));
                }
        
                // Store the new image
                $image = "IMG" . time() . "." . $request->image->extension();
                $request->image->move(public_path("image/gallery"), $image);
            }
        
            // Update the gallery
            $gallery->update([
                'caption' => $request->caption,
                'image' => $image,
                'status' => $request->status,
            ]);

            // Redirect based on the update result
            if ($gallery) {
                return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update data.');
            }
        }

    public function destroy(string $id)
        {
            $gallery = Gallery::find($id);
            $gallery->delete();
            return redirect()->route('gallery.index')->with('success', 'Data deleted successfully.');
        }
}
