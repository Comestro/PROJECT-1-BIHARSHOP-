<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;


class CreateCoupon extends Component
{
    public $code;
    public $discount_type;
    public $discount_value;
    public $expiration_date;
    public $status;
    public function store()
    {
        // Validate the request data
        $validatedData = $this->validate([
            'code' => 'required|string|max:255',
            'discount_type' => 'required|string|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'expiration_date' => 'required|date|after:today',
            'status' => 'boolean' // Ensure status is validated as a boolean
        ]);

        // Create the coupon
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
