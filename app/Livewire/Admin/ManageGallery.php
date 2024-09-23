<?php

namespace App\Livewire\Admin;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use Livewire\Component;
use Storage;


class ManageGallery extends Component
{
    use WithFileUploads;
    public $searchTerm = '';

    public $galleryId;
    public $caption;
    public $image;
    public $existingImage;
    public $isModalOpen = false;
    public $confirmingDelete = false;


    protected $rules = [
        'caption' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        // Fetch categories based on the search term
        $datas = Gallery::where('caption', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('created_at', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.admin.manage-gallery', [
            'datas' => $datas,
        ]);
    }

    // public function openModal($categoryId)
    // {
    //     $category = Gallery::find($this->categoryId);
    //     $this->name = $category->name;
    //     $this->slug = $category->cat_slug;
    //     $this->description = $category->cat_description;
    //     $this->existingImage = $category->image;
    //     $this->isModalOpen = true;
    // }

    // public function closeModal()
    // {
    //     $this->isModalOpen = false;
    //     $this->reset(['image', 'existingImage']);
    // }

    // public function updateCategory()
    // {
    //     $this->validate();

    //     $category = Gallery::find($this->categoryId);
    //     $category->name = $this->name;
    //     $category->cat_slug = $this->slug;
    //     $category->cat_description = $this->description;

    //     if ($this->image) {
    //         // Delete old image
    //         if ($this->existingImage) {
    //             Storage::delete('public/image/category/' . $this->existingImage);
    //         }

    //         // Store new image
    //         $imagePath = $this->image->store('image/category', 'public');
    //         $category->image = basename($imagePath);
    //     }

    //     $category->save();

    //     $this->closeModal();

    //     session()->flash('message', 'Category updated successfully.');
    // }

    public function deleteGallery()
    {
        if ($this->confirmingDelete) {
            $gallery = Gallery::find($this->galleryId);

            // Delete image
            if ($gallery->image) {
                Storage::delete('public/image/gallery/' . $gallery->image);
            }

            // Delete category
            $gallery->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Data deleted successfully.');
        }
    }

    public function confirmDelete($galleryId)
    {
        $this->galleryId = $galleryId;
        $this->confirmingDelete = true;
    }

    public function toggleStatus($galleryId)
    {
        $gallery = Gallery::find($galleryId);
        $gallery->status = !$gallery->status;
        $gallery->save();

        session()->flash('success', 'Status updated successfully.');
    }
}
