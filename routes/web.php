<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('admin', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('admin');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/mypage', MyPageDashboard::class)->name('mypage.dashboard');

    // 기타 마이페이지 관련 라우트들
    Route::get('/mypage/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/mypage/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/mypage/coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('/mypage/points', [PointController::class, 'history'])->name('points.history');
    Route::get('/mypage/style-analysis', [StyleAnalysisController::class, 'index'])->name('style-analysis');
    Route::get('/mypage/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__.'/auth.php';
