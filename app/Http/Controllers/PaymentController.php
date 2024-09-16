<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function saveOnlinePayment(Request $request)
    {
        try {
            $input = $request->all();
            
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            
            // Fetch the payment object using Razorpay's API
            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            // Capture the payment if Razorpay payment ID exists
            if (!empty($input['razorpay_payment_id'])) {
                $response = $payment->capture(['amount' => $payment['amount']]);
            } else {
                return redirect()->back()->with('error', 'Payment ID is empty.');
            }

            // Save payment details to the database
            $user = Auth::user();

            // dd(time() . $user->id);
            if($user){
                $newPayment = Payment::create([
                    'user_id' => $user->id,
                    'order_id' => $request->input('order_id'),
                    'receipt_no' => time() . $user->id,
                    'payment_id' => $request->razorpay_payment_id,
                    'transaction_fee' => $payment->amount,
                    'amount' => $request->input('amount'),
                    'transaction_id' => time() . rand(11, 99) . date('yd'),
                    'transaction_date' => now(),
                    'payment_date' => now(),
                    'payment_status' => $response->status,
                    'currency' => $response->currency,
                    'payment_card_id' => $response->card_id,
                    'method' => $response->method,
                    'wallet' => $response->wallet,
                    'bank' => $response->bank,
                    'payment_vpa' => $response->vpa,
                    'ip_address' => $request->ip(),
                    'international_payment' => $response->international,
                    'error_reason' => $response->error_reason,
                    'error_code' => $response->error_code,
                    'error_description' => $response->error_description,
                    'status' => 1,
                ]);
                if ($newPayment) {
                    dd('done');
                    return redirect('/user')->with('success', 'Payment done successfully.');
                } else {
                    dd('payissue');
                    return redirect()->back()->with('error', 'Unable to add payment.');
                }
            }
            else{
                dd('user');
                return redirect()->back()->with('error', 'Unable to add payment.');

            }
            // Redirect based on payment success
           
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
