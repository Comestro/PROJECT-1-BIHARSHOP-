<?php

namespace App\Livewire\Order;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariantModel;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AddToCart extends Component

{
    public $user_id;
    public $discount_type;
    public $coupon_code;
    public $shipping_charge;
    public $product_variant_models_id;
    public $quantity;
    public $product;

    public function mount(Product $product){
        $this->product = $product;
    }

    public function render()
    {        
        $productVariants = ProductVariantModel::where('product_id',$this->product->id)->get();
        return view('livewire.order.add-to-cart')->with('productVariants', $productVariants);
    }

    public function store()
    {
        $orderPrefix = 'OD'; 
        $validatedData = $this->validate([
            'product_variant_models_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => $orderPrefix . rand(1000, 9999),  
        ]);

        if ($order) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_variant_models_id' => $this->product_variant_models_id,
                'quantity' => $this->quantity,
            ]);

            if ($orderItem) {
                return redirect()->route('cart')->with('success', 'Product successfully added to Cart.');
            } else {
                return redirect()->back()->with('error', 'Unable to add product to Cart.');
            }
        } else {
            return redirect()->back()->with('error', 'Unable to create order.');
        }
    }

   
}