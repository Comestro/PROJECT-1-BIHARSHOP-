<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;


class OrderItemController extends Controller
{
   
    public function index()
    {
        // Fetch paginated list of coupons
        $orderItem = OrderItem::paginate(4);  
        return view('admin.manageOrderItem', compact('orderItem'));
    }

    public function create()
    {
        return view('admin.insertOrderItem');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'product_variation_id' => 'required|exists:product_variations,id',
            'quantity' => 'required|integer|min:1',           
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
    
        $orderItem = OrderItem::create([
            'order_id' => $request->order_id,
            'product_variation_id' => $request->product_variation_id,
            'quantity' => $request->quantity,
        ]);
    
        if ($orderItem) {
            return redirect()->route('order.index')->with('success', 'Order added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add Order.');
        }
    }


    public function edit(string $id)
        {
            // Find the coupon by ID
            $orderItem = OrderItem::find($id);

            // Check if the coupon exists
            if (!$orderItem) {
                return redirect()->route('orderItem.index')->with('error', 'No Order Item Found');
            }

            // Return the edit view with the coupon data
            return view('orderItem.edit', compact('orderItem'));
        }   


        public function update(Request $request, string $id)
    {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'order_id' => 'required|exists:orders,id',
                'product_variation_id' => 'required|exists:product_variations,id',
                'quantity' => 'required|integer|min:1',               
            ]);
        
            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }
        
            // Find the order by ID
            $orderItem = OrderItem::find($id);
            if (!$orderItem) {
                return response()->json([
                    'status' => 404,
                    'message' => "Order not found"
                ], 404);
            }
                
            $orderItem->update([
                'order_id' => $request->order_id,
                'product_variation_id' => $request->product_variation_id,
                'quantity' => $request->quantity,
            ]);
        
            if ($orderItem) {
                return redirect()->route('orderItem.index')->with('success', 'Order updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update order.');
            }
    }
        
        
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $orderItem = OrderItem::find($id);
            $orderItem->delete();
            return redirect()->route('orderItem.index')->with('error', 'Order Item deleted successfully.');
        }
}
