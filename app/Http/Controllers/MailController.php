<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){

        $userOrder=Order::where('user_id',Auth::id())->where('isOrdered',true)->first();
      
        if($userOrder)
        {
            $mailData=[
                'order_number'=>$userOrder->order_number,
                'status'=>$userOrder->status,
                'total_amount'=>$userOrder->total_amount,
                'payment_status'=>$userOrder->payment_status,
                'tracking_number'=>$userOrder->tracking_number,
                'payment_method'=>$userOrder->payment_method,
                
        
        ];
        }
        $userMail=$userOrder->user->email;
        // $orderSucessMail=Payment::where('user_id',Auth::id())
        
    //     $mailData=[
    //         'title'=>'Mail from me confrim',
    //     'body'=>'this is for email using smtp',
    // ];
        Mail::to($userMail)->send(new SendMail($mailData));

       
    }
}
