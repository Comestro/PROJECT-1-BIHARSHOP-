<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
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
                $response = $payment->capture(['amount' => $payment['amount']]); // Note: Razorpay amount is in paise (for INR)
            } else {
                return redirect()->back()->with('error', 'Payment ID is empty.');
            }

            $user = Auth::user();

            if ($user) {
                // Find the order using the order_id
                $order = Order::find($request->input('order_id'));

                if (!$order) {
                    return redirect()->back()->with('error', 'Order not found.');
                }

                // Create the payment record
                $newPayment = Payment::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'receipt_no' => time() . $user->id,
                    'payment_id' => $request->razorpay_payment_id,
                    'transaction_fee' => $payment->amount,
                    'amount' => $request->input('amount'),
                    'transaction_id' => time() . rand(11, 99) . date('yd'),
                    'transaction_date' => now(),
                    'payment_date' => now(),
                    'payment_status' => $response->status,
                    'currency' => $response->currency,
                    'payment_card_id' => $response->card_id ?? null, // Handle nullable response fields
                    'method' => $response->method ?? null,
                    'wallet' => $response->wallet ?? null,
                    'bank' => $response->bank ?? null,
                    'payment_vpa' => $response->vpa ?? null,
                    'ip_address' => $request->ip(),
                    'international_payment' => $response->international ?? false,
                    'error_reason' => $response->error_reason ?? null,
                    'error_code' => $response->error_code ?? null,
                    'error_description' => $response->error_description ?? null,
                    'status' => 1,
                ]);

                // Update the order if payment was created
                if ($newPayment) {
                    $order->update([
                        'total_amount' => $request->input('amount'),
                        'status' => 'processing',
                        'payment_status' => 'paid',
                        'payment_method' => $response->method
                    ]);

                    return redirect('/user')->with('success', 'Payment done successfully.');
                } else {
                    return redirect()->back()->with('error', 'Unable to add payment.');
                }
            } else {
                return redirect()->back()->with('error', 'User authentication failed.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

}
