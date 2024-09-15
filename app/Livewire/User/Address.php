<?php

namespace App\Livewire\User;
use App\Models\Address as AddAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Address extends Component
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

    
        $data = AddAddress::create([
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

        // Redirect with a success or error message
        if ($data) {
            return redirect('/user')->with('success', 'Address added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add address.');
        }
    }

    public function render()
    {
        $addresses = AddAddress::where('user_id',Auth::id())->get();
        return view('livewire.user.address',['addresses' =>$addresses]);
    }
}
