<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

use function Laravel\Prompts\select;

class CallingOrder extends Component
{
    public $search = "";
    public $userId;
    public $filterMonth = null;
    public $filterStatus = null;
    public function mount($userId)
    {
        $this->userId = $userId;
    }
    public function render()
    {
        $query = Order::query();

        if ($this->search) {
            $query->where('order_number', 'LIKE', "%" . $this->search . "%");
        }

        if ($this->userId) {
            $query->where('user_id', $this->userId);
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        $data['orders'] = $query->get();

        return view('livewire.admin.calling-order', $data);
    }
}
