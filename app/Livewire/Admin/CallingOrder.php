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

        $data['orders'] = Order::where('order_number', 'LIKE', "%" . $this->search . "%")->get();
        if ($this->userId) {
            $data['orders'] = Order::where('order_number', 'LIKE', "%" . $this->search . "%")
                ->where('user_id', $this->userId)->get();
        }
        if ($this->filterStatus) {
            $data['orders'] = Order::where('status', $this->filterStatus)->get();
        }

        if ($this->filterMonth) {
            $data['orders'] = Order::whereMonth('created_at', $this->filterMonth)->get();
        }
        return view('livewire.admin.calling-order', $data);
    }
}
