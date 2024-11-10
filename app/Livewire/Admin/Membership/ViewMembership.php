<?php

namespace App\Livewire\Admin\Membership;
use App\Models\Membership;
use App\Models\MembershipPayment;

use Livewire\Component;


class ViewMembership extends Component
{

    public $id;
    public $isModalOpen = false;
    public $confirmingDelete = false;

    public function mount(Membership $member){
        $this->id = $member->id;
    }    

    public function render()
    {
        // dd($this->id);

        $member=Membership::find($this->id);
        if($member){
           if ($member->isPaid) {
              $referals = Membership::where('referal_id', $member->id)->where('isPaid',1)->limit(2)->get();
                 return view('livewire.admin.membership.view-membership', ['member' => $member, 'referals' => $referals]);
          }
          else{
            return view('livewire.admin.membership.view-membership',['member' => $member]);
          }
        }
    }

    public function openModal($couponId)
    {
        $this->couponId = $couponId;
        $coupon = Membership::find($this->id);

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

    public function approve()
    {
        $this->validate();

        $coupon = Coupon::find($this->id);
        $coupon->code = $this->code;
        $coupon->discount_type = $this->discount_type;
        $coupon->discount_value = $this->discount_value;
        $coupon->expiration_date = $this->expiration_date;
        $coupon->save();
        $this->closeModal();

        session()->flash('message', 'Data updated successfully.');
    }
}
