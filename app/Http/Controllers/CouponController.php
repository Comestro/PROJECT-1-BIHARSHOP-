<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;



class CouponController extends Controller
{
    //
   
    public function index()
    {
        // Fetch paginated list of coupons
        $coupons = Coupon::paginate(4);  

        return view('admin.coupon.manageCoupon')->with('coupons', $coupons);
    }

    public function create()
    {
        return view('admin.coupon.insertCoupon');
    }

    public function store(Request $request)
        {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'code' => 'required|string|max:255|unique:coupons,code',
                'discount_type' => 'required|in:percentage,fixed',
                'discount_value' => 'required|numeric|min:0',
                'expiration_date' => 'nullable|date|after_or_equal:today',
                'status' => 'nullable|boolean',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }

            // Prepare data for creation
            $couponData = [
                'code' => $request->code,
                'discount_type' => $request->discount_type,
                'discount_value' => $request->discount_value,
                'expiration_date' => $request->expiration_date,
                'status' => $request->has('status') ? $request->status : true, // default to active if not provided
            ];

            // Create the coupon
            $coupon = Coupon::create($couponData);

            // Redirect with a success or error message
            if ($coupon) {
                return redirect()->route('coupon.index')->with('success', 'Coupon added successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to add coupon.');
            }
        }

    public function edit(string $id)
        {
            // Find the coupon by ID
            $coupon = Coupon::find($id);

            // Check if the coupon exists
            if (!$coupon) {
                return redirect()->route('coupon.index')->with('error', 'No Coupon Found');
            }

            // Return the edit view with the coupon data
            return view('admin.coupon.editCoupon', compact('coupon'));
        }   
        
    public function update(Request $request, string $id)
        {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'code' => 'required|string|max:255|unique:coupons,code,' . $id,
                'discount_type' => 'required|string|in:fixed,percentage',
                'discount_value' => 'required|numeric|min:0',
                'expiration_date' => 'nullable|date|after_or_equal:today',
                'status' => 'required|boolean',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }
        
            // Find the coupon by ID
            $coupon = Coupon::find($id);
            if (!$coupon) {
                return response()->json([
                    'status' => 500,
                    'message' => "No Coupon Found"
                ], 500);
            }
        
            // Update the coupon
            $coupon->update([
                'code' => $request->code,
                'discount_type' => $request->discount_type,
                'discount_value' => $request->discount_value,
                'expiration_date' => $request->expiration_date,
                'status' => $request->status,
            ]);
        
            // Redirect based on the update result
            if ($coupon) {
                return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update coupon.');
            }
        } 
        
    public function destroy(string $id)
        {
            $coupon = Coupon::find($id);
            $coupon->delete();
            return redirect()->route('coupon.index')->with('success', 'Coupon deleted successfully.');
        }
}
