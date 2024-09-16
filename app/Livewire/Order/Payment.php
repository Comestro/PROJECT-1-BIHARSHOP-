<?php

namespace App\Livewire\Order;
use App\Models\Payment as AddPayment;
use Illuminate\Support\Facades\Auth;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Request;
use App\Models\Coupon;
use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class Payment extends Component

{
    // public $order_id;
    // public $amount;
    // public $razorpay_payment_id;
    // public $status = false;

    // public function storePayment()
    // {
    //     $input = Request::all();
    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));  
        
    //     $payment = $api->payment->fetch($this->razorpay_payment_id);


    //         if (!empty($this->razorpay_payment_id)) {
    //             $response = $api->payment->fetch($this->razorpay_payment_id)->capture([
    //                 'amount' => $payment['amount']
    //             ]);
    //         } else {
    //             throw new Exception("Payment ID is empty.");
    //         }

    //     $user = Auth::user();
    
    //     $data = AddPayment::create([
    //         'user_id' => Auth::id(), 
    //         'order_id' =>  $this->order_id, 
    //         'receipt_no' => time() . $user->id,
    //         'payment_id' => $input['razorpay_payment_id'],
    //         'transaction_fee' =>  $this->amount,
    //         'amount' => $this->amount,
    //         'transaction_id' => time() . rand(11, 99) . date('yd'),
    //         'transaction_date' => now(),
    //         'payment_date' => now(),
    //         'payment_status' => $response->status,
    //         'currency' => $response->currency,
    //         'payment_card_id' => $response->card_id,
    //         'method' => $response->method,
    //         'wallet' => $response->wallet,
    //         'bank' => $response->bank,
    //         'payment_vpa' => $response->vpa,
    //         'ip_address' => Request::ip(),
    //         'international_payment' => $response->international,
    //         'error_reason' => $response->error_reason,
    //         'error_code' => $response->error_code,
    //         'error_description' => $response->error_description,
    //         'status' => 1,         
    //     ]);

    //     // Redirect with a success or error message
    //     if ($data) {
    //         return redirect('/user')->with('success', 'Payment done successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Unable to add payment.');
    //     }
    // }

    public $orders;
    public $subtotal = 0;
    public $discountPercentage = 20; // Default discount percentage (store-wide discount)
    public $deliveryFee = 15; // Example delivery fee
    public $total = 0;
    public $promoCode;
    public $discountAmount = 0;
    public $isCouponApplied = false;

    public $couponPrice = 0;
    public $errorMessage = '';

    public function mount(Order $orders)
    {
        $this->orders = $orders;
        $this->calculateSummary();
    }



    public function applyPromoCode()
    {
        $this->validate([
            'promoCode' => 'required|string',
        ]);

        $user = Auth::user();
        $coupon = Coupon::where('code', $this->promoCode)->first();

        if ($coupon) {
            if ($user->coupons->contains($coupon)) {
                $this->errorMessage = 'You have already used this promo code.';
                $this->isCouponApplied = false;
                $this->couponPrice = 0;
            } else {
                $this->isCouponApplied = true;
                $this->couponPrice = $this->calculateCouponDiscount($coupon);
                $user->coupons()->attach($coupon);

                // Store the coupon information in the session to persist after refresh
                session(['appliedCoupon' => $this->promoCode, 'couponPrice' => $this->couponPrice]);

                session()->flash('success', 'Promo code applied successfully!');
                $this->errorMessage = '';
                $this->calculateSummary(); // Recalculate to include coupon discount
            }
        } else {
            $this->isCouponApplied = false;
            $this->couponPrice = 0;
            $this->errorMessage = 'Invalid promo code.';
            session()->forget(['appliedCoupon', 'couponPrice']); // Remove coupon from session if invalid
        }
    }

    private function calculateCouponDiscount($coupon)
    {
        $originalPrice = $this->subtotal;

        if ($coupon->discount_type === 'fixed') {
            return $coupon->discount_value;
        } elseif ($coupon->discount_type === 'percentage') {
            return ($coupon->discount_value / 100) * $originalPrice;
        }

        return 0;
    }    

    #[On('refreshPriceBreakdown')]
    public function calculateSummary()
    {
        // Calculate subtotal based on order items
        $this->subtotal = $this->orders->orderItems->sum(function ($item) {
            return $item->products->discount_price * $item->quantity;
        });

        // Calculate general store discount
        $this->discountAmount = ($this->subtotal * $this->discountPercentage) / 100;

        // Calculate total by applying both general and coupon discounts
        $this->total = $this->subtotal - $this->discountAmount - $this->couponPrice + $this->deliveryFee;
    }


    public function render()
    {
        return view('livewire.order.payment');
    }
}