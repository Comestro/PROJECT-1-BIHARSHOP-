<?php

namespace App\Livewire\Product;
use App\Models\Product;
use App\Models\ProductHighlight;
use Livewire\Component;

class Highlight extends Component
{
    public $product;
    public $highlights = [];

    public function mount(Product $product)
    {
        $this->product = $product;

        if ($product && $product->highlights) {
            // Load existing highlights
            $this->highlights = $product->highlights->pluck('highlights')->toArray();
        }
    }

    public function saveHighlights()
    {
        $this->validate([
            'highlights' => 'required|array|min:1',
            'highlights.*' => 'required|string|max:255',
        ]);

        // Delete existing highlights for the product
        ProductHighlight::where('product_id', $this->product->id)->delete();

        // Save new highlights
        foreach ($this->highlights as $highlight) {
            ProductHighlight::create([
                'product_id' => $this->product->id,
                'highlights' => $highlight,
            ]);
        }

        session()->flash('message', 'Highlights saved successfully!');
    }

    public function addHighlight()
    {
        $this->highlights[] = '';
    }

    public function removeHighlight($index)
    {
        unset($this->highlights[$index]);
        $this->highlights = array_values($this->highlights); 
    }

    public function render()
    {
        return view('livewire.product.highlight');
    }
}
