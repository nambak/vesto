<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class MyPageDashboard extends Component
{
    public User $user;
    public Collection $recentOrders;
    public Collection $shippingOrders;
    public int $wishlistCount = 0;
    public int $availableCoupons = 0;
    public int $totalPoints = 0;
    public array $orderStats = [
        'total'      => 0,
        'completed'  => 0,
        'processing' => 0,
        'cancelled'  => 0
    ];

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->loadDashboardData();
    }

    public function render(): View
    {
        return view('livewire.my-page-dashboard')
            ->layout('components.layouts.app', ['title' => '마이페이지']);
    }

    public function loadDashboardData(): void
    {
        $this->loadRecentOrders();
        $this->loadShippingOrders();
    }

    private function loadRecentOrders(): void
    {
        $this->recentOrders = Order::query()
            ->where('user_id', $this->user->id)
            ->with(['orderItems.product'])
            ->latest()
            ->limit(5)
            ->get();
    }

    private function loadShippingOrders(): void
    {
        $this->shippingOrders = Order::query()
            ->where('user_id', $this->user->id)
            ->whereIn('status', ['processing', 'shipped', 'out_for_delivery'])
            ->with(['orderItems.product'])
            ->latest()
            ->get();
    }
}