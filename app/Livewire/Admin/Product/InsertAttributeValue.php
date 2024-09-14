<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\AttributeValue;
use App\Models\Attribute;


class InsertAttributeValue extends Component

{ 
    public $value;
    public $attribute_id;

    public function store()
    {
        $validatedData = $this->validate([
            'value' => 'required|string|max:255',
            'attribute_id' => 'required'
        ]);

        $attributeValue = AttributeValue::create($validatedData);

        // Redirect with a success or error message
        if ($attributeValue) {
            return redirect()->route('attribute-value.create')->with('success', 'Attribute added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add attribute.');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.insert-attribute-value', [
            'attributes' => Attribute::all() // Load categories for dropdown
        ]);
    }
}    

