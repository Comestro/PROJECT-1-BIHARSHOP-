<?php

namespace App\Livewire\Order;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function store()
    {
        $orderPrefix = 'OD'; 
        $validatedData = $this->validate([
            'total_amount' => 'required|numeric',
            'shipping_charge' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'coupon_code' => 'nullable|string', 
            'product_variant_models_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => $orderPrefix . rand(1000, 9999),  
            'total_amount' => $validatedData['total_amount'],
            'shipping_charge' => $validatedData['shipping_charge'] ?? 0,
            'coupon_code' => $this->coupon_code,
            'status' => $validatedData['status'] ?? false
        ]);

        if ($order) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_variant_models_id' => $validatedData['product_variant_models_id'],
                'quantity' => $validatedData['quantity'],
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

    public function render()
    {
        return view('livewire.order.add-to-cart');
    }
}