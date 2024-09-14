<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\AttributeValue;
use App\Models\Attribute; // Include the Attribute model



class CallingAttributeValue extends Component
{
    public $value;
    public $attribute_id;
    public $isModalOpen = false;
    public $attributeValueId;
    public $confirmingDelete = false;

    protected $rules = [
        'attribute_id' => 'required|exists:attributes,id', // Ensure attribute_id validation
        'value' => 'required|string|max:255',
    ];

    public function render()
    {
        $attributeValues = AttributeValue::paginate(10);
        $attributes = Attribute::all(); 
        return view('livewire.admin.product.calling-attribute-value', compact('attributeValues', 'attributes'));
    }  

    public function openModal($attributeValueId)
    {
        $this->attributeValueId = $attributeValueId;
        $attributeValue = AttributeValue::find($this->attributeValueId);

        if ($attributeValue) {
            $this->name = $attributeValue->name;
            $this->isModalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function updateAttributeValue()
    {
        $this->validate();
    
        $attributeValue = AttributeValue::find($this->attributeValueId);
    
        if ($attributeValue) {
            $attributeValue->attribute_id = $this->attribute_id; 
            $attributeValue->value = $this->value; 
            $attributeValue->save(); 
    
            $this->closeModal(); 
    
            session()->flash('message', 'Attribute Value updated successfully.'); 
        } else {
            session()->flash('error', 'Attribute Value not found.'); 
        }
    }

    public function deleteAttributeValue()
    {
        if ($this->confirmingDelete) {
            $attributeValue = AttributeValue::find($this->attributeValueId);

            $attributeValue->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Attribute deleted successfully.');
        }
    }

    public function confirmDelete($attributeValueId)
    {
        $this->attributeValueId = $attributeValueId;
        $this->confirmingDelete = true;
    }

   

    
}