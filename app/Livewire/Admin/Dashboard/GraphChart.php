<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;

class GraphChart extends Component
{
    public function render()
    {
            $currentMonth = now()->month;
        
            $total_orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereBetween('created_at', [
                    now()->subMonths(3)->startOfMonth(),
                    now()->endOfMonth()
                ])
                ->groupBy('month')
                ->pluck('total', 'month');
        
            $new_users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereBetween('created_at', [
                    now()->subMonths(3)->startOfMonth(),
                    now()->endOfMonth()
                ])
                ->groupBy('month')
                ->pluck('total', 'month');
        
            // Define the month labels
            $months = [
                now()->subMonths(2)->format('M'), // 2 months ago
                now()->subMonth()->format('M'),    // 1 month ago
                now()->format('M'),                // current month
            ];
        
            $orders_data = [0, 0, 0];
            $users_data = [0, 0, 0];
        
            foreach ($total_orders as $month => $total) {
                if ($month == now()->subMonths(2)->month) {
                    $orders_data[0] = $total; // 2 months ago
                } elseif ($month == now()->subMonth()->month) {
                    $orders_data[1] = $total; // 1 month ago
                } elseif ($month == now()->month) {
                    $orders_data[2] = $total; // current month
                }
            }
        
            foreach ($new_users as $month => $total) {
                if ($month == now()->subMonths(2)->month) {
                    $users_data[0] = $total; // 2 months ago
                } elseif ($month == now()->subMonth()->month) {
                    $users_data[1] = $total; // 1 month ago
                } elseif ($month == now()->month) {
                    $users_data[2] = $total; // current month
                }
            }
        
            $data = [
                'total_orders' => $orders_data,
                'new_users' => $users_data,
                'months' => $months
            ];
        return view('livewire.admin.dashboard.graph-chart',['data'=>$data]);
    }
}
