<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditUser extends Component
{
    public $isOpen = false;
    public $lastName;
    public $firstName;

    public function mount()
    {
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        $this->firstName = $user->name;
        $this->lastName = $user->last_name ?? ''; // Load last name if available
    }

    // Function to open modal
    public function openModal()
    {
        $this->isOpen = true;
    }

    // Function to close modal
    public function closeModal()
    {
        $this->isOpen = false;
    }

    // Function to update profile
    public function updateProfile()
    {
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::id());

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        $user->name = $this->firstName;
        // Assuming you store the last name separately
        $user->last_name = $this->lastName;
        $user->save();

        session()->flash('message', 'Profile updated successfully!');
        $this->closeModal(); // Close the modal after saving
    }
       public function render()
    {
        return view('livewire.user.edit-user');
    }
}
