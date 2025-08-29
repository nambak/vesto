<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                        @if($user->profile_image)
                        <img src="{{ $user->profile_image }}" alt="Profile" class="w-16 h-16 rounded-full object-cover">
                        @else
                        <span class="text-white font-bold text-xl">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        @endif
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">안녕하세요, {{ $user->name }}님!</h1>
                        <p class="text-slate-600">{{ $user->email }}</p>
                        <p class="text-sm text-slate-500">마지막 로그인: {{ $user->last_login_at?->format('Y.m.d H:i') ?? '첫 로그인' }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <button wire:click="refreshData" class="px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg font-medium transition-colors">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        새로고침
                    </button>
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg font-medium transition-colors">
                        프로필 편집
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">총 주문</p>
                    <p class="text-3xl font-bold text-slate-900">{{ number_format($orderStats['total']) }}</p>
                    <p class="text-sm text-green-600">완료 {{ $orderStats['completed'] }}건</p>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">위시리스트</p>
                    <p class="text-3xl font-bold text-slate-900">{{ number_format($wishlistCount) }}</p>
                    <p class="text-sm text-slate-500">관심 상품</p>
                </div>
                <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">사용 가능 쿠폰</p>
                    <p class="text-3xl font-bold text-slate-900">{{ number_format($availableCoupons) }}</p>
                    <p class="text-sm text-blue-600">할인 혜택</p>
                </div>
                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">적립금</p>
                    <p class="text-3xl font-bold text-slate-900">{{ number_format($totalPoints) }}</p>
                    <p class="text-sm text-green-600">포인트</p>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Orders -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-slate-900">최근 주문 내역</h2>
                    <a href="{{ route('orders.index') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        전체보기
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="divide-y divide-slate-200">
                @forelse($recentOrders as $order)
                <div class="p-6 hover:bg-slate-50 transition-colors">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-2">
                                <span class="text-sm font-medium text-slate-900">주문번호: #{{ $order->order_number }}</span>
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                        @if($order->status === 'completed') bg-green-100 text-green-800
                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status === 'shipped') bg-yellow-100 text-yellow-800
                                        @else bg-slate-100 text-slate-600 @endif">
                                        {{ $order->status_label }}
                                    </span>
                            </div>
                            <p class="text-sm text-slate-600 mb-2">
                                {{ $order->orderItems->count() }}개 상품 • {{ $order->created_at->format('Y.m.d') }}
                            </p>
                            <p class="text-lg font-semibold text-slate-900">₩{{ number_format($order->total_amount) }}</p>
                        </div>
                        <div class="flex -space-x-2">
                            @foreach($order->orderItems->take(3) as $item)
                            <div class="w-12 h-12 bg-slate-100 rounded-lg border-2 border-white overflow-hidden">
                                @if($item->product->image_url)
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @if($order->orderItems->count() > 3)
                            <div class="w-12 h-12 bg-slate-800 rounded-lg border-2 border-white flex items-center justify-center">
                                <span class="text-xs text-white font-medium">+{{ $order->orderItems->count() - 3 }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <p class="text-slate-600">아직 주문 내역이 없습니다</p>
                    <a href="{{ route('products.index') }}" class="inline-block mt-3 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        쇼핑하러 가기
                    </a>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Shipping Status -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-slate-900">배송 현황</h2>
                    <span class="text-sm text-slate-500">{{ $shippingOrders->count() }}건</span>
                </div>
            </div>
            <div class="divide-y divide-slate-200 max-h-96 overflow-y-auto">
                @forelse($shippingOrders as $order)
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-slate-900">#{{ $order->order_number }}</span>
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($order->status === 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status === 'shipped') bg-yellow-100 text-yellow-800
                                @elseif($order->status === 'out_for_delivery') bg-orange-100 text-orange-800
                                @endif">
                                {{ $order->status_label }}
                            </span>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-3">
                        <div class="flex justify-between text-xs text-slate-600 mb-1">
                            <span>주문완료</span>
                            <span>배송중</span>
                            <span>배송완료</span>
                        </div>
                        <div class="w-full bg-slate-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-300
                                    @if($order->status === 'processing') w-1/3
                                    @elseif($order->status === 'shipped') w-2/3
                                    @elseif($order->status === 'out_for_delivery') w-5/6
                                    @elseif($order->status === 'delivered') w-full
                                    @endif">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="flex -space-x-1">
                            @foreach($order->orderItems->take(2) as $item)
                            <div class="w-8 h-8 bg-slate-100 rounded border-2 border-white overflow-hidden">
                                @if($item->product->image_url)
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-slate-600">{{ $order->orderItems->count() }}개 상품</p>
                            <p class="text-sm font-medium text-slate-900">₩{{ number_format($order->total_amount) }}</p>
                        </div>
                        @if($order->tracking_number)
                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            배송추적
                        </button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="p-8 text-center">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <p class="text-slate-600">배송 중인 상품이 없습니다</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h3 class="text-lg font-bold text-slate-900 mb-4">빠른 메뉴</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('wishlist.index') }}" class="flex flex-col items-center p-4 rounded-lg border border-slate-200 hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                    <div class="w-12 h-12 bg-red-50 group-hover:bg-red-100 rounded-lg flex items-center justify-center mb-2">
                        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-700">위시리스트</span>
                </a>

                <a href="{{ route('coupons.index') }}" class="flex flex-col items-center p-4 rounded-lg border border-slate-200 hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                    <div class="w-12 h-12 bg-yellow-50 group-hover:bg-yellow-100 rounded-lg flex items-center justify-center mb-2">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-700">쿠폰함</span>
                </a>

                <a href="{{ route('points.history') }}" class="flex flex-col items-center p-4 rounded-lg border border-slate-200 hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                    <div class="w-12 h-12 bg-green-50 group-hover:bg-green-100 rounded-lg flex items-center justify-center mb-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-700">적립금</span>
                </a>

                <a href="{{ route('style-analysis') }}" class="flex flex-col items-center p-4 rounded-lg border border-slate-200 hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                    <div class="w-12 h-12 bg-purple-50 group-hover:bg-purple-100 rounded-lg flex items-center justify-center mb-2">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-700">스타일 DNA</span>
                </a>
            </div>
        </div>
    </div>
</div>