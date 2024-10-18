<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Category;

class InsertCategory extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $cat_description;
    public $photo;  // For image file upload
    public $parent_category_id;

    // Method to define validation rules
    public function rules()
    {
        return [
            'parent_category_id' => 'nullable|exists:categories,id',
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'cat_description' => ['required', 'string', 'max:255'],
            'photo' => ['nullable'],
        ];
    }
    // Method to update the slug automatically when the title is updated
    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    // Method to handle the form submission
    public function store()
    {
        // Validate inputs based on the rules set in the class
        $validatedData = $this->validate();

        if ($this->photo) {
            $imageName = "C" . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/image/category', $imageName, "public");
        } else {
            $imageName = null;
        }

        // dd($validatedData);

        // Insert the category into the database
        $category = Category::create([
            'parent_category_id' =>$this->parent_category_id,
            'name' => $this->title,
            'cat_description' => $this->cat_description,
            'cat_slug' => $this->slug,
            'image' => $imageName,
        ]);

        // Redirect with success or error message
        if ($category) {
            session()->flash('success', 'Category added successfully.');
            return redirect()->route('category.index');
        } else {
            session()->flash('error', 'Unable to add category.');
        }
    }

    // Render the Livewire view for this component
    public function render()
    {
        $data['categories'] = Category::where('parent_category_id',NULL)->get();
        return view('livewire.admin.insert-category', $data);
    }
    // public function callingparent(){

    //     $parentname=
    //     return route('category.callingparent',$parentname);
    // }
}
