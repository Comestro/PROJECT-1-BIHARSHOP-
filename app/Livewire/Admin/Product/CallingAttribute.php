<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Attribute;


class CallingAttribute extends Component
{
    public $name;
    public $isModalOpen = false;
    public $confirmingDelete = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];


    public function render()
    {
        $attributes = Attribute::paginate(10);
        return view('livewire.admin.product.calling-attribute')->with('attributes', $attributes);
    }  

    public function openModal($attributeId)
    {
        $this->attributeId = $attributeId;
        $attribute = Attribute::find($this->attributeId);

        if ($attribute) {
            $this->name = $attribute->name;
            $this->isModalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function updateAttribute()
    {
        $this->validate();

        $attribute = Attribute::find($this->attributeId);
        $attribute->code = $this->code;
        $attribute->save();

        $this->closeModal();

        session()->flash('message', 'Attribute updated successfully.');
    }

    public function deleteAttribute()
    {
        if ($this->confirmingDelete) {
            $attribute = Attribute::find($this->attributeId);

            $attribute->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Attribute deleted successfully.');
        }
    }

    public function confirmDelete($attributeId)
    {
        $this->attributeId = $attributeId;
        $this->confirmingDelete = true;
    }

    public function toggleStatus($attributeId)
        {
            $attribute = Attribute::find($attributeId);
            $attribute->status = !$attribute->status;
            $attribute->save();

            session()->flash('success', 'Attribute status updated successfully.');
        }
        

    
}
