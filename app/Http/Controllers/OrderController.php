<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //
   
    public function index()
    {
        // Fetch paginated list of coupons
        $orders = Order::paginate(4);  
        return view('admin.manageOrder', compact('order'));
    }

    public function create()
    {
        return view('admin.insertOrder');
    }

    public function manageOrder(){
        return view('admin.callingOrder');
     }

     
     public function viewOrder($orderId){
        $data['order']=Order::find($orderId);
        return view('admin.callingOrderItem',$data);
     }
     

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,processing,completed,canceled',
            'total_amount' => 'required|numeric',
            'shipping_charge' => 'nullable|numeric',
            'payment_status' => 'required|in:paid,unpaid,refunded',
            'payment_method' => 'nullable|string',
            'tracking_number' => 'nullable|string',
            'coupon_code' => 'nullable|string',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Generate a unique order number
        $orderNumber = 'ORD-' . strtoupper(Str::random(10));
    
        // Ensure the order number is unique
        while (Order::where('order_number', $orderNumber)->exists()) {
            $orderNumber = 'ORD-' . strtoupper(Str::random(10));
        }
    
        // Create the order
        $order = Order::create([
            'user_id' => $request->user_id,
            'order_number' => $orderNumber,
            'status' => $request->status,
            'total_amount' => $request->total_amount,
            'shipping_charge' => $request->shipping_charge,
            'payment_status' => $request->payment_status,
            'payment_method' => $request->payment_method,
            'tracking_number' => $request->tracking_number,
            'coupon_code' => $request->coupon_code,
        ]);
    
        if ($order) {
            return redirect()->route('order.index')->with('success', 'Order added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add Order.');
        }
    }


    public function edit(string $id)
        {
            // Find the coupon by ID
            $order = Order::find($id);

            // Check if the coupon exists
            if (!$order) {
                return redirect()->route('order.index')->with('error', 'No Order Found');
            }

            // Return the edit view with the coupon data
            return view('order.edit', compact('order'));
        }   


        public function update(Request $request, string $id)
    {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'order_number' => 'required|unique:orders,order_number,' . $id,
                'status' => 'required|in:pending,processing,completed,canceled',
                'total_amount' => 'required|numeric',
                'shipping_charge' => 'nullable|numeric',
                'payment_status' => 'required|in:paid,unpaid,refunded',
                'payment_method' => 'nullable|string',
                'tracking_number' => 'nullable|string',
                'coupon_code' => 'nullable|string',
            ]);
        
            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }
        
            // Find the order by ID
            $order = Order::find($id);
            if (!$order) {
                return response()->json([
                    'status' => 404,
                    'message' => "Order not found"
                ], 404);
            }
        
            // Ensure the order number is unique if it's being updated
            $orderNumber = $request->order_number;
            if ($order->order_number !== $orderNumber && Order::where('order_number', $orderNumber)->exists()) {
                return response()->json([
                    'status' => 422,
                    'errors' => ['order_number' => 'Order number must be unique.']
                ], 422);
            }
        
            // Update the order
            $order->update([
                'user_id' => $request->user_id,
                'order_number' => $orderNumber,
                'status' => $request->status,
                'total_amount' => $request->total_amount,
                'shipping_charge' => $request->shipping_charge,
                'payment_status' => $request->payment_status,
                'payment_method' => $request->payment_method,
                'tracking_number' => $request->tracking_number,
                'coupon_code' => $request->coupon_code,
            ]);
        
            if ($order) {
                return redirect()->route('order.index')->with('success', 'Order updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update order.');
            }
    }
        
        
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $order = Order::find($id);
            $order->delete();
            return redirect()->route('order.index')->with('error', 'Order deleted successfully.');
        }
}
