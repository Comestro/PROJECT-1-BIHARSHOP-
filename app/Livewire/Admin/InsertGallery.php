<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;

class InsertGallery extends Component
{
    use WithFileUploads;
    public $image;
    public $caption;
    public $status = false;

    public function store()
    {
        $validatedData = $this->validate([
            'caption' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        // Validate inputs based on the rules set in the class
        $validatedData = $this->validate();

        if ($this->photo) {
            $imageName = "IMG" . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/image/gallery', $imageName);
        } else {
            $imageName = null;
        }

         // Insert the category into the database
         $gallery = Gallery::create([
            'caption' =>$this->caption,
            'image' => $imageName,
        ]);

        // Redirect with a success or error message
        if ($gallery) {
            return redirect()->route('gallery.index')->with('success', 'Gallery added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add gallery.');
        }
    }

    public function render()
    {
        return view('livewire.admin.insert-gallery');
    }
}
