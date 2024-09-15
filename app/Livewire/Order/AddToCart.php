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
    public $quantity = 1;
    public $product;
    public $color_variant_id;
    public $size_variant_id;

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
        'color_variant_id' => 'nullable|integer',
        'size_variant_id' => 'nullable|integer',
        'quantity' => 'required|integer|min:1',
    ]);

    // Find or create an order
    $order = Order::firstOrCreate(
        ['user_id' => Auth::id()],
        ['order_number' => $orderPrefix . rand(1000, 9999)]
    );

    if ($order) {
        // Check if the product with the same color and size already exists in the order
        $existingOrderItem = OrderItem::where('order_id', $order->id)
            ->where('color_variant_id', $validatedData['color_variant_id'])
            ->where('size_variant_id', $validatedData['size_variant_id'])
            ->first();

        if ($existingOrderItem) {
            // If the item exists, increase the quantity
            $existingOrderItem->quantity = $validatedData['quantity'];
            $existingOrderItem->save();
        } else {
            // Otherwise, create a new OrderItem
            OrderItem::create([
                'color_variant_id' => $validatedData['color_variant_id'],
                'size_variant_id' => $validatedData['size_variant_id'],
                'quantity' => $validatedData['quantity'],
                'order_id' => $order->id,
                'product_id' => $this->product->id,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product successfully added to Cart.');
    } else {
        return redirect()->back()->with('error', 'Unable to create order.');
    }
}



}
