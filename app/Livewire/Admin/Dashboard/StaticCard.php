<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class StaticCard extends Component
{
    public $catCount = 0;
    public $proCount = 0;
    public $userCount = 0;
    public $orderCount = 0;

    public function mount(){
        
        $this->catCount = Category::all()->count();
        $this->proCount = Product::all()->count();
        $this->userCount = User::all()->count();
        $this->orderCount = Order::all()->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.static-card');
    }
}
