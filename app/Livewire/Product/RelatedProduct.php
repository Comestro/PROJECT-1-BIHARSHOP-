<?php

namespace App\Livewire\Product;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class RelatedProduct extends Component
{
    public $category;
    public function mount( $cat){

    
        $this->category = Category::where('name',$cat)->first();
     
        
    }
    public function render()
    {   
       $data['product']= Product::where('category_id', $this->category->id)->limit(4)->get();

        return view('livewire.product.related-product',$data);
    }
}
