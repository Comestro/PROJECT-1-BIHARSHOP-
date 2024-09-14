<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\AttributeValue;


class CallingAttributeValue extends Component
{
    public $value;
    public $attribute_id;
    public $isModalOpen = false;
    public $confirmingDelete = false;

    protected $rules = [
        'value' => 'required|string|max:255',
    ];


    public function render()
    {
        $attributeValues = AttributeValue::paginate(10);
        return view('livewire.admin.product.calling-attribute-value')->with('attributeValues', $attributeValues);
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
        $attributeValue->code = $this->code;
        $attributeValue->save();

        $this->closeModal();

        session()->flash('message', 'Attribute Value updated successfully.');
    }

    public function deleteAttributeValue()
    {
        if ($this->confirmingDelete) {
            $attributeValue = Attribute::find($this->attributeValueId);

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

    public function toggleStatus($attributeValueId)
        {
            $attributeValue = Attribute::find($attributeValueId);
            $attributeValue->status = !$attributeValue->status;
            $attributeValue->save();

            session()->flash('success', 'Attribute value status updated successfully.');
        }
        

    
}