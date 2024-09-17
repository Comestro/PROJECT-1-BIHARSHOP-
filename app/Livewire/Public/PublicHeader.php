<?php

namespace App\Livewire\Public;

use Livewire\Component;

class PublicHeader extends Component
{
    public $dropdownVisible = false;

    public function showDropdown()
    {
        $this->dropdownVisible = true;
    }

    public function hideDropdown()
    {
        $this->dropdownVisible = false;
    }
    public function render()
    {
        return view('livewire.public.public-header');
    }
}
