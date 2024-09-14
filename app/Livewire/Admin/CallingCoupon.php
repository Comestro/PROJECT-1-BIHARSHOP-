<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CallingCoupon extends Component
{
    
    public $search = "";
    public $couponId;
    public $code; 
    public $discount_type;
    public $discount_value;
    public $expiration_date;
    public $status;
    public $isModalOpen = false;
    public $confirmingDelete = false;

    protected $rules = [
        'code' => 'required|string|max:255|unique:coupons,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'expiration_date' => 'nullable|date|after_or_equal:today',
            'status' => 'nullable|boolean',
    ];


    public function openModal($couponId)
    {
        $this->couponId = $couponId;
        $coupon = Coupon::find($this->couponId);

        if ($coupon) {
            $this->code = $coupon->code;
            $this->discount_type = $coupon->discount_type;
            $this->discount_value = $coupon->discount_value;
            $this->expiration_date = $coupon->expiration_date;
            $this->isModalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function updateCoupon()
    {
        $this->validate();

        $coupon = Coupon::find($this->couponId);
        $coupon->code = $this->code;
        $coupon->discount_type = $this->discount_type;
        $coupon->discount_value = $this->discount_value;
        $coupon->expiration_date = $this->expiration_date;
        $coupon->save();
        $this->closeModal();

        session()->flash('message', 'Coupon updated successfully.');
    }

    public function deleteCoupon()
    {
        if ($this->confirmingDelete) {
            $coupon = Coupon::find($this->couponId);

            if ($coupon->image) {
                Storage::delete('public/image/coupon/' . $coupon->image);
            }
            $coupon->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Coupon deleted successfully.');
        }
    }

    public function confirmDelete($couponId)
    {
        $this->couponId = $couponId;
        $this->confirmingDelete = true;
    }


    
    public function render()
    {
        $data['coupons'] = Coupon::where('code','LIKE',"%".$this->search."%")->get();
        return view('livewire.admin.calling-coupon',$data);
    }
    public function toggleStatus($couponId)
        {
            $coupon = Coupon::find($couponId);
            $coupon->status = !$coupon->status;
            $coupon->save();

            session()->flash('success', 'Coupon status updated successfully.');
        }
        

   
    
}
