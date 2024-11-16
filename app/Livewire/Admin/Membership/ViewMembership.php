<?php

namespace App\Livewire\Admin\Membership;
use App\Models\Membership;
use App\Models\MembershipPayment;

use Livewire\Component;


class ViewMembership extends Component
{

    public $id;
    public $isPaid;
    public $isVerified;
    public $membership_id;
    public $member;
    public $transaction_no;
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

    public function openModal()
    {
        $membership = Membership::find($this->id);

        if ($membership) {
            $this->isPaid = $membership->isPaid;
            $this->isVerified = $membership->isVerified;
            $this->membership_id = $membership->membership_id;
            $this->transaction_no = $membership->transaction_no;
            $this->isModalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function approveNow()
    {
        // $this->validate();

        $membership = Membership::find($this->id);
        $membership->isVerified = $this->isVerified;
        $membership->transaction_no = $this->transaction_no;
        $membership->isPaid = $this->isPaid;
        $membership->membership_id = $this->membership_id;
        if ($this->isVerified == 1) {
            $membership->payment_status = 'captured';
            $membership->status = 1;

            $newPayment = MembershipPayment::create([
                'receipt_no' => time() . $this->transaction_no,
                'payment_id' => $this->transaction_no,
                'transaction_fee' => 251,
                'amount' => 251,
                'transaction_id' => time() . $this->transaction_no ,
                'transaction_date' => now(),
                'payment_date' => now(),
                'payment_status' => 1,
                'currency' => 'INR',
                'ip_address' => 'Admin',
                'status' => 1,
                'membership_id'=> $this->member->id
            ]);

            if ($this->isVerified == 1 && $this->isPaid == 1) {
                // Retrieve the last membership_id
                $lastMembership = $membership->orderBy('membership_id', 'desc')->first();
        
                // Check if a last membership exists
                if ($lastMembership) {
                    // Extract the numeric part and increment it
                    preg_match('/\d+/', $lastMembership->membership_id, $matches);
                    $newId = isset($matches[0]) ? (int)$matches[0] + 1 : 1;
                } else {
                    // If no previous ID exists, start from 1
                    $newId = 1;
                }
        
                // Create new membership_id with prefix
                $data_id['membership_id'] = 'BSE' . $newId;
        
                // Update the membership with new ID
                $membership->update($data_id);
            }
        }
        $membership->save();
        $this->closeModal();

        session()->flash('message', 'Data updated successfully.');
    }
}
