<?php
namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Attribute; // Import your model

class AttributesForm extends Component
{
    public $product;
    public $productAttributes = []; // Define as an array
    public $selectedAttributes = [];

    public function mount($product)
    {
        $this->product = $product;
        $this->productAttributes = Attribute::with('values')->get();

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
        return view('livewire.admin.product.attributes-form');
    }
}
