<?php

namespace App\Livewire\Admin\Product;
use App\Models\Attribute;
use Livewire\Component;

class InsertAttribute extends Component

    { 
        public $name;
    
        public function store()
        {
            $validatedData = $this->validate([
                'name' => 'required|string|max:255'
            ]);
    
            $attribute = Attribute::create($validatedData);
    
            // Redirect with a success or error message
            if ($attribute) {
                return redirect()->route('attribute.create')->with('success', 'Attribute added successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to add attribute.');
            }
        }
    
        public function render()
        {
            return view('livewire.admin.product.insert-attribute');
        }
    }    

