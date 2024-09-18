<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Payment;

class PaymentTable extends Component
{
    public $payments;
    public function mount()
    {
        $this->payments = Payment::latest()->take(10)->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.payment-table');
    }
}
