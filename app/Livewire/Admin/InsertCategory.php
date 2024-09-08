<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;

class InsertCategory extends Component
{
    public $title;
    public $slug;

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
