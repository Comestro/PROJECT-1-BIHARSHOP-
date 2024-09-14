<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Models\Attribute;
use App\Models\ProductVariantAttribute as ProductVariantAttr;


class ProductVariantAttribute extends Component

{
    public $product_variant_id;
    public $attribute_value_id;

    public function store()
    {
        $validatedData = $this->validate([
            'product_variant_id' => 'required',
            'attribute_value_id' => 'required',
        ]);

        // dd($validatedData);

        $ProductVariant = ProductVariantAttr::create($validatedData);
        $this->dispatch('refresh');
        // $this->reset('price',"stock");

    }

    public function render()
    {
        $data['product_variants'] = ProductVariant::all();
        $data['attribute_values'] = AttributeValue::all();
        $data['productVariantAttributes'] = ProductVariantAttr::all();
        return view('livewire.admin.product.product-variant-attribute', $data);
    }
}
