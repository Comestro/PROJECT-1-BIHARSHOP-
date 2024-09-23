<?php

namespace App\Livewire\Admin;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use Livewire\Component;

class ManageGallery extends Component
{
    use WithFileUploads;
    public $searchTerm = '';

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

    // public function deleteCategory()
    // {
    //     if ($this->confirmingDelete) {
    //         $category = Gallery::find($this->categoryId);

    //         // Delete image
    //         if ($category->image) {
    //             Storage::delete('public/image/gallery/' . $category->image);
    //         }

    //         // Delete category
    //         $category->delete();

    //         $this->confirmingDelete = false;
    //         session()->flash('message', 'Category deleted successfully.');
    //     }
    // }

    // public function confirmDelete($categoryId)
    // {
    //     $this->categoryId = $categoryId;
    //     $this->confirmingDelete = true;
    // }
}
