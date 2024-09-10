<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CreateCoupon extends Component
{
    public $code;
    public $discount_type;
    public $discount_value;
    public $expiration_date;
    public $status = false; // Set default value to false

    public function store()
    {
        $validatedData = $this->validate([
            'code' => 'required|string|max:255|unique:coupons,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'expiration_date' => 'nullable|date|after_or_equal:today',
            'status' => 'nullable|boolean',
        ]);

        // Ensure status is not null
        $validatedData['status'] = $validatedData['status'] ?? false;

        $coupon = Coupon::create($validatedData);

        // Redirect with a success or error message
        if ($coupon) {
            return redirect()->route('coupon.index')->with('success', 'Coupon added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add coupon.');
        }
    }

    public function render()
    {
        return view('livewire.admin.create-coupon');
    }
}
