<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\ProductVariantModel;

class InsertProductVariant extends Component
{
    public $product;
    public $variants = [];

    protected $rules = [
        'variants.*.type' => 'required|string',
        'variants.*.value' => 'required|string',
        'variants.*.price' => 'required|numeric',
        'variants.*.stock' => 'required|integer',
    ];

    public function mount(Product $product)
    {
        // Load the product details for editing
        $this->product = $product;

        // Load product variants
        $this->variants = ProductVariantModel::where('product_id', $this->product->id)
            ->get()
            ->map(function ($variant) {
                return [
                    'id' => $variant->id,
                    'type' => $variant->variant_type,
                    'value' => $variant->variant_value,
                    'price' => $variant->price,
                    'stock' => $variant->stock,
                ];
            })->toArray();
    }

    public function addVariant()
    {
        $this->variants[] = ['type' => '', 'value' => '', 'price' => '', 'stock' => ''];
    }

    public function removeVariant($index)
    {
        if (isset($this->variants[$index]['id'])) {
            ProductVariantModel::find($this->variants[$index]['id'])->delete();
        }
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants); // Re-index the array
    }

    public function update()
    {
        $this->validate();



        // Update variants
        foreach ($this->variants as $variant) {
            if (isset($variant['id'])) {
                // Update existing variant
                ProductVariantModel::find($variant['id'])->update([
                    'variant_type' => $variant['type'],
                    'variant_value' => $variant['value'],
                    'price' => $variant['price'],
                    'stock' => $variant['stock'],
                ]);
            } else {
                // Create new variant
                ProductVariantModel::create([
                    'product_id' => $this->product->id,
                    'variant_type' => $variant['type'],
                    'variant_value' => $variant['value'],
                    'price' => $variant['price'],
                    'stock' => $variant['stock'],
                ]);
            }
        }

        session()->flash('message', 'Product and variants successfully updated.');
    }
    public function render()
    {
        return view('livewire.admin.product.insert-product-variant');
    }
}

