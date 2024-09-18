<?php

namespace App\Livewire\Public\Checkout;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $landmark;
    public $name;
    public $phone;
    public $street;
    public $area;
    public $address_line;
    public $city;
    public $state;
    public $postal_code;  
    public $user_id;  
    public $alt_phone;  
    public $address_type;  
    public $status = false;
    public $order;
    public $address;
    public $showAddress=false;

    public $addressId;
    public $selectedAddress;


    public function toggleAddress()
    {
        if($this->showAddress){
            
            $this->showAddress=false;
        }
        else{
            $this->showAddress=true;
        }

    }


    

    public function store()
    {
        $validatedData = $this->validate([
            'address_line' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'status' => 'nullable|boolean',
        ]);

    
        $data = Address::create([
            'landmark' => $this->landmark,
            'name' => $this->name,
            'phone' => $this->phone,
            'street' => $this->street,
            'area' => $this->area,
            'address_line' => $this->address_line,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'alt_phone' => $this->alt_phone,
            'address_type' => $this->address_type,
            'user_id' => Auth::id(),          
            'status' => 0
        ]);

     $this->dispatch('refreshAddress');
    if ($data) {
        return redirect('/checkout')->with('success', 'Address added successfully.');
    } else {
        return redirect()->back()->with('error', 'Unable to add address.');
    }
       
    }

    public function mount(Order $order){
        $this->order= $order;
        $this->address= Auth::user()->addresses;

        if($this->order->address_id != null){
            $this->selectedAddress = Address::find($this->order->address_id);
        }

    }

    public function changeAddressToggle(){
        $this->selectedAddress = null;
    }
  
    public function updateAddressId()
    {
        $this->selectedAddress = Address::find($this->addressId);
        
        $order = Order::where('user_id',Auth::id())->where('isOrdered',0)->first();
        $order->address_id = $this->selectedAddress->id;
        $order->save();

        session()->flash('message', 'Address updated successfully.');
    }

    public function render()
    {

        return view('livewire.public.checkout.checkout');
    }
}
