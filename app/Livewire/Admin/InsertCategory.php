<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class InsertCategory extends Component
{
    public $title;
    public $slug;

    use WithFileUploads;


    #[Validate('image|max:1024')]
    public $photo;

    public function updatedTitle($value)
    {
        // Automatically generate slug from title
        $this->slug = Str::slug($value);


    }
    public function render()
    {
        return view('livewire.admin.insert-category');
    }
}
