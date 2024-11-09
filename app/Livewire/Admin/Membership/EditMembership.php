<?php

namespace App\Livewire\Admin\Membership;
use App\Models\Membership;
use App\Models\MembershipPayment;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Storage;
use Livewire\Component;

class EditMembership extends Component
{
    use WithFileUploads;
    public $member;
    public $referal_id;
    public $name;
    public $date_of_birth;
    public $nationality;
    public $marital_status;
    public $religion;
    public $father_name;
    public $mother_name;
    public $home_address;
    public $city;
    public $state;
    public $pincode;
    public $mobile;
    public $whatsapp;
    public $email;
    public $nominee_name;
    public $nominee_relation;
    public $bank_name;
    public $branch_name;
    public $account_no;
    public $ifsc;
    public $user_id;
    public $image;
    public $pancard;
    public $aadhar_card;
    public $photo;
    public $id;
    public $existingImage;
    public $status;
    public $currentImage;
    public $isVerified;
    public $isPaid;
    public $transaction_no;
    public $membership_id;

    public function mount(Membership $member){
        $this->member = $member;
        $this->currentImage=$member->image;
        $this->name = $member->name;
        $this->date_of_birth = $member->date_of_birth;
        $this->nationality = $member->nationality;
        $this->marital_status = $member->marital_status;
        $this->religion = $member->religion;
        $this->father_name = $member->father_name;
        $this->mother_name = $member->mother_name;
        $this->home_address = $member->home_address;
        $this->city = $member->city;
        $this->state = $member->state;
        $this->pincode = $member->pincode;
        $this->mobile = $member->mobile;
        $this->whatsapp = $member->whatsapp;
        $this->email = $member->email;
        $this->nominee_name = $member->nominee_name;
        $this->nominee_relation = $member->nominee_relation;
        $this->bank_name = $member->bank_name;
        $this->branch_name = $member->branch_name;
        $this->account_no = $member->account_no;
        $this->ifsc = $member->ifsc;
        $this->user_id = $member->user_id;
        $this->pancard = $member->pancard;
        $this->aadhar_card = $member->aadhar_card;
        $this->photo = $member->photo;
        $this->existingImage = $member->image;
        $this->isPaid = $member->isPaid;
        $this->isVerified = $member->isVerified;
        $this->status = $member->status;
        $this->transaction_no = $member->transaction_no;
        $this->membership_id = $member->membership_id;
        $this->referal_id = $member->referal_id;
    }


    public function updateMembership()
    {
         $this->validate(  [
            'name' => 'required|string|max:255',
            // 'date_of_birth' => 'required|string|max:255',
            // 'nationality' => 'required|string|max:255',
            // 'marital_status' => 'required|string|max:255',
            // 'religion' => 'required|string|max:255',
            // 'father_name' => 'required|string|max:255',
            // 'mother_name' => 'required|string|max:255',
            // 'home_address' => 'required|string|max:255',
            // 'mobile' => 'required|string|max:255',
            // 'city' => 'required|string|max:255',
            // 'state' => 'required|string|max:255',
            // 'pincode' => 'required|numeric',
            // 'email' => 'required|email',
            // 'nominee_name' => 'required|string|max:255',
            // 'nominee_relation' => 'required|string|max:255',
            // 'bank_name' => 'required|string|max:255',
            // 'account_no' => 'required|string|max:255',
            // 'ifsc' => 'required|string|max:255',
            // 'pancard' => 'required|string|max:255',
            // 'aadhar_card' => 'required|string|max:255',
    ]);

    

        $membership = Membership::find($this->member->id);

        $membership->name = $this->name;
        $membership->date_of_birth = $this->date_of_birth;
        $membership->referal_id = $this->referal_id;
        $membership->nationality = $this->nationality;
        $membership->marital_status = $this->marital_status;
        $membership->religion = $this->religion;
        $membership->father_name = $this->father_name;
        $membership->mother_name = $this->mother_name;
        $membership->home_address = $this->home_address;
        $membership->city = $this->city;
        $membership->pincode = $this->pincode;
        $membership->state = $this->state;
        $membership->mobile = $this->mobile;
        $membership->whatsapp = $this->whatsapp;
        $membership->email = $this->email;
        $membership->nominee_name = $this->nominee_name;
        $membership->nominee_relation = $this->nominee_relation;
        $membership->bank_name = $this->bank_name;
        $membership->branch_name = $this->branch_name;
        $membership->account_no = $this->account_no;
        $membership->ifsc = $this->ifsc;
        $membership->pancard = $this->pancard;
        $membership->transaction_no = $this->transaction_no;
        $membership->aadhar_card = $this->aadhar_card;
        $membership->status = $this->status;
        $membership->isVerified = $this->isVerified;
        $membership->isPaid = $this->isPaid;
        $membership->membership_id = $this->membership_id;

        if($this->isPaid){
            $membership->payment_status = 'captured';
            $membership->status = 1;

            $newPayment = MembershipPayment::create([
                'receipt_no' => time() . $this->transaction_no,
                'payment_id' => $this->transaction_no,
                'transaction_fee' => 251,
                'amount' => 251,
                'transaction_id' => time() . rand(11, 99) . date('yd'),
                'transaction_date' => now(),
                'payment_date' => now(),
                'payment_status' => $this->status,
                'currency' => 'INR',
                'ip_address' => 'Admin',
                'status' => 1,
                'membership_id'=> $this->member->id
            ]);
        }
        if ($this->membership_id) {
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

        // image work
        if($this->photo){      
            $image = $this->photo;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs("/image/membership", $imageName, "public");
            $data['image'] = $imageName;
            $membership->update( $data);
        }       

        $this->status = $membership->save();
           if($this->status){

                return redirect('/admin/membership')->with('success', 'Membership updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Unable to update data.');
           }
        }
        
    public function render()
    {
        $membership = Membership::find($this->id);
        return view('livewire.admin.membership.edit-membership');
    }

    // public function toggleStatus()
    // {
    //     $data = Membership::find($this->id);
    //     if ($data) {
    //         $data->status = !$data->status;
    //         $data->save();
    //         $this->render();
    //     }
    // }
}
