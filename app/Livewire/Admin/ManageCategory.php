<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Storage;
class ManageCategory extends Component
{

    use WithFileUploads;
    public $searchTerm = '';
    // public $id;

    // public function deletefun(){
    //     $id=$this->id;
    //     $data = Category::find($id);
    //     return redirect()->route('admin.manage.category')->with('success','Category deleted successfully');
    //     // $data['child']=Category::where('id',$id)->where('parent_category_id',!null)->first();
    //     // if($data['child']){
    //     //     return redirect()->route('admin.manage.category')->with('error','delete child first before deleting parent');
    //     // }

    // }


    public $categoryId;
    public $name;
    public $slug;
    public $description;
    public $image;
    public $existingImage;
    public $isModalOpen = false;
    public $confirmingDelete = false;


    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        // Fetch categories based on the search term
        $categories = Category::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('cat_description', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.admin.manage-category', [
            'categories' => $categories,
        ]);
    }

    public function openModal($categoryId)
    {
        $this->categoryId = $categoryId;
        $category = Category::find($this->categoryId);
        $this->name = $category->name;
        $this->slug = $category->cat_slug;
        $this->description = $category->cat_description;
        $this->existingImage = $category->image;
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset(['image', 'existingImage']);
    }

    public function updateCategory()
    {
        $this->validate();

        $category = Category::find($this->categoryId);
        $category->name = $this->name;
        $category->cat_slug = $this->slug;
        $category->cat_description = $this->description;

        if ($this->image) {
            // Delete old image
            if ($this->existingImage) {
                Storage::delete('public/image/category/' . $this->existingImage);
            }

            // Store new image
            $imagePath = $this->image->store('image/category', 'public');
            $category->image = basename($imagePath);
        }

        $category->save();

        $this->closeModal();

        session()->flash('message', 'Category updated successfully.');
    }

    public function deleteCategory()
    {
        if ($this->confirmingDelete) {
            $category = Category::find($this->categoryId);

            // Delete image
            if ($category->image) {
                Storage::delete('public/image/category/' . $category->image);
            }

            // Delete category
            $category->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Category deleted successfully.');
        }
    }

    public function confirmDelete($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->confirmingDelete = true;
    }
}
