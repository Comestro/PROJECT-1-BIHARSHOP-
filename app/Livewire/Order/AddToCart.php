<?php

namespace App\Livewire\Order;
use App\Models\ProductVariant;
use App\Models\Product;

use Livewire\Component;

class AddToCart extends Component
{
    public $code;
    public $discount_type;

    public function store()
    {
        $validatedData = $this->validate([
            'user_id' => 'required|string|max:255|unique:coupons,code',
            'total_amount' => 'required|numeric',
            'shipping_charge' => 'nullable|numeric',
            'amount' => 'required|numeric',
            'status' => 'nullable|boolean',
        ]);

        // Ensure status is not null
        $validatedData['order_number'] = rand(0,999);
        $validatedData['payment_status'] = $this->payment_status;
        $validatedData['coupon_code'] = $this->coupon_code;

        $validatedData['status'] = $validatedData['status'] ?? false;

        $data = Order::create($validatedData);

        // Redirect with a success or error message
        if ($data) {
            return redirect()->route('cart')->with('success', 'Product successfully Added to Cart.');
        } else {
            return redirect()->back()->with('error', 'Unable to add product.');
        }
    }

    public function render()
    {
        return view('livewire.order.add-to-cart');
    }
}
