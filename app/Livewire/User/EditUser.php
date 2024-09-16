<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class EditUser extends Component
{
    public $isOpen = false;
    public $firstName;
    public $email;

    public function mount()
    {
        $user = Auth::user();

        // Redirect if the user is not authenticated
        if (!$user) {
            return redirect()->route('login');
        }

        // Populate the form fields with user's data
        $this->firstName = $user->name;
        $this->email = $user->email;
    }

    // Function to open the modal
    public function openModal()
    {
        $this->isOpen = true;
    }

    // Function to close the modal
    public function closeModal()
    {
        $this->isOpen = false;
    }

    // Function to update profile
    public function updateProfile()
    {
        $this->validate([
            'firstName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(), // Ensure unique email
        ]);
    
        $user = User::find(Auth::id());
    
        // Redirect if the user is not found
        if (!$user) {
            return redirect()->route('login');
        }
    
        // Update user details
        $user->name = $this->firstName;
        $user->email = $this->email;
    
        $user->save();
    
        // Flash message to notify the user of success
        session()->flash('message', 'Profile updated successfully!');
    
        // Close the modal after saving
        $this->closeModal();
    }
    

    public function render()
    {
        return view('livewire.user.edit-user');
    }
}
