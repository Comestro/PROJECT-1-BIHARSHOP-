<?php

namespace App\Livewire\Product;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class RelatedProduct extends Component
{
    public $category;
    public $slug;
    public function mount( $cat, $slug){

    
        $this->category = Category::where('name',$cat)->first();
        $this->slug = $slug;
    
     
        
    }
    public function render()
    {   
       $data['product']= Product::where('category_id', $this->category->id)->where("slug","!=",$this->slug)->limit(6)->get();

        return view('livewire.product.related-product',$data);
    }
}
