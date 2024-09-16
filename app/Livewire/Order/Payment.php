<?php

namespace App\Livewire\Order;
use App\Models\Payment as AddPayment;
use Illuminate\Support\Facades\Auth;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Request;
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

    public function render()
    {
        return view('livewire.order.payment');
    }
}