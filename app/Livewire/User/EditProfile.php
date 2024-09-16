<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfile extends Component
{
    public $firstName;
    public $lastName;
    public $isModalOpen = true; 

    public function mount()
    {
        $user = Auth::user();
        $this->firstName = $user->name;
        $this->lastName = ''; 
    }

    // Function to open modal
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    // Function to close modal
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // Function to update profile
    public function updateProfile()
    {
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $this->firstName;
        // Assuming you store the last name separately
        // $user->last_name = $this->lastName;
        $user->save();

        session()->flash('message', 'Profile updated successfully!');
        $this->closeModal(); // Close the modal after saving
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
