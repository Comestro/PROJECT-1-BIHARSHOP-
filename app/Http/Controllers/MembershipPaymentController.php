<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\MembershipPayment;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MembershipPaymentController extends Controller
{
    public function saveMembershipPayment(Request $request)
    {
        try {
            $input = $request->all();
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            if (!empty($input['razorpay_payment_id'])) {
                $response = $payment->capture(['amount' => $payment['amount']]);
            } else {
                return redirect()->back()->with('error', 'Payment ID is empty.');
            }

            $user = Auth::user();
            if ($user) {

                $membership = Membership::where('token',$request->input('token'))->first();

                if (!$membership) {
                    return redirect()->back()->with('error', 'Data not found.');
                }  

                $newPayment = MembershipPayment::create([
                    'receipt_no' => time() . $user->id,
                    'payment_id' => $request->razorpay_payment_id,
                    'transaction_fee' => $payment->amount,
                    'amount' => 250,
                    'transaction_id' => time() . rand(11, 99) . date('yd'),
                    'transaction_date' => now(),
                    'payment_date' => now(),
                    'payment_status' => $response->status,
                    'currency' => $response->currency,
                    'payment_card_id' => $response->card_id ?? null,
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
                    'membership_id'=> $membership->id
                ]);

                if ($newPayment) {
                    $members = Membership::where('id',$membership->id)->first();
                    $members->update([
                        'isPaid' => 1,
                        'payment_status' => $response->status,
                        'membership_id'=> $membership->id
                    ]);

                    return redirect('/user/membership')->with('success', 'Payment done successfully.');
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