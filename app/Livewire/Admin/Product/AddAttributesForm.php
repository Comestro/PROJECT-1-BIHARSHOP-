<?php

namespace App\Livewire\Admin\Product;

use App\Models\Attribute;
use Livewire\Component;

class AddAttributesForm extends Component
{
    public $product;
    public $selectedAttributes = [];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addAttribute($attributeId, $valueId)
    {
        $this->selectedAttributes[$attributeId] = $valueId;
    }

    public function saveAttributes()
    {
        // Save the selected attributes to the product
        // Implementation needed here
        session()->flash('message', 'Product attributes saved successfully.');
    }
    public function render()
    {
        $data['attributes'] = [
            [
                'id' => 1,
                'name' => 'Size',
                'values' => [
                    ['id' => 1, 'value' => 'Small'],
                    ['id' => 2, 'value' => 'Medium'],
                    ['id' => 3, 'value' => 'Large']
                ]
            ],
            [
                'id' => 2,
                'name' => 'Color',
                'values' => [
                    ['id' => 1, 'value' => 'Red'],
                    ['id' => 2, 'value' => 'Blue'],
                    ['id' => 3, 'value' => 'Green']
                ]
            ]
        ];
        return view('livewire.admin.product.add-attributes-form', $data);
    }
}
