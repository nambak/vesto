<x-layouts.app>
    <x-slot name="title">{{ $product->name }} - Vesto</x-slot>

    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- 상품 기본 정보 -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                    <!-- 상품 이미지 갤러리 -->
                    <div class="space-y-4" x-data="{ selectedImage: '{{ $product->image_url }}' }">
                        <!-- 메인 이미지 -->
                        <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden relative group">
                            @if($product->image_url)
                                <img :src="selectedImage"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105 cursor-zoom-in">

                                <!-- 줌 아이콘 -->
                                <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-50 to-gray-100">
                                    <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- 썸네일 이미지들 -->
                        @if($product->image_url || ($product->additional_images && count($product->additional_images) > 0))
                            <div class="grid grid-cols-4 gap-2">
                                <!-- 메인 이미지 썸네일 -->
                                @if($product->image_url)
                                    <button @click="selectedImage = '{{ $product->image_url }}'"
                                            :class="{ 'ring-2 ring-blue-500': selectedImage === '{{ $product->image_url }}' }"
                                            class="aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 transition-colors">
                                        <img src="{{ $product->image_url }}"
                                             alt="메인 이미지"
                                             class="w-full h-full object-cover">
                                    </button>
                                @endif

                                <!-- 추가 이미지 썸네일들 -->
                                @if($product->additional_images)
                                    @foreach($product->additional_images as $index => $additionalImage)
                                        <button @click="selectedImage = '{{ $additionalImage }}'"
                                                :class="{ 'ring-2 ring-blue-500': selectedImage === '{{ $additionalImage }}' }"
                                                class="aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-transparent hover:border-gray-300 transition-colors">
                                            <img src="{{ $additionalImage }}"
                                                 alt="추가 이미지 {{ $index + 1 }}"
                                                 class="w-full h-full object-cover"
                                                 loading="lazy">
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        @endif

                        <!-- 이미지 개수 표시 -->
                        @if($product->additional_images && count($product->additional_images) > 0)
                            <div class="text-center">
                                <span class="text-sm text-gray-500">
                                    총 {{ ($product->image_url ? 1 : 0) + count($product->additional_images) }}개의 이미지
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- 상품 정보 -->
                    <div class="space-y-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            @if($product->sku)
                                <p class="text-sm text-gray-500">SKU: {{ $product->sku }}</p>
                            @endif
                        </div>

                        <!-- 가격 -->
                        <div class="space-y-2">
                            @if($product->isOnSale())
                                <div class="flex items-center space-x-3">
                                    <span class="text-3xl font-bold text-red-600">
                                        ₩{{ number_format($product->getEffectivePrice()) }}
                                    </span>
                                    <span class="text-xl text-gray-500 line-through">
                                        ₩{{ number_format($product->price) }}
                                    </span>
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-md text-sm font-medium">
                                        {{ $product->getDiscountPercentage() }}% OFF
                                    </span>
                                </div>
                            @else
                                <span class="text-3xl font-bold text-gray-900">
                                    ₩{{ number_format($product->price) }}
                                </span>
                            @endif
                        </div>

                        <!-- 평점 -->
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-sm text-gray-600">4.0 (24 리뷰)</span>
                        </div>

                        <!-- 재고 정보 -->
                        <div class="flex items-center space-x-2">
                            @if($product->stock_quantity > 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    재고 {{ $product->stock_quantity }}개
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    품절
                                </span>
                            @endif
                        </div>

                        <!-- 태그 -->
                        @if($product->tags && count($product->tags) > 0)
                            <div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($product->tags as $tag)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- 액션 버튼 -->
                        <div class="space-y-4 pt-6">
                            @if($product->stock_quantity > 0 && $product->is_active)
                                <flux:button variant="primary" class="w-full py-3">
                                    장바구니에 추가
                                </flux:button>

                                @auth
                                    <flux:button variant="outline" class="w-full py-3">
                                        위시리스트에 추가
                                    </flux:button>
                                @endauth
                            @else
                                <flux:button variant="outline" class="w-full py-3" disabled>
                                    구매 불가
                                </flux:button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- 탭 섹션 -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                <div x-data="{ activeTab: 'description' }" class="w-full">
                    <!-- 탭 헤더 -->
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8 px-8">
                            <button @click="activeTab = 'description'"
                                    :class="{ 'border-blue-500 text-blue-600': activeTab === 'description', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'description' }"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                상품 상세
                            </button>
                            <button @click="activeTab = 'specifications'"
                                    :class="{ 'border-blue-500 text-blue-600': activeTab === 'specifications', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'specifications' }"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                제품 사양
                            </button>
                            <button @click="activeTab = 'reviews'"
                                    :class="{ 'border-blue-500 text-blue-600': activeTab === 'reviews', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'reviews' }"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                리뷰 (24)
                            </button>
                            <button @click="activeTab = 'shipping'"
                                    :class="{ 'border-blue-500 text-blue-600': activeTab === 'shipping', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'shipping' }"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                배송 정보
                            </button>
                        </nav>
                    </div>

                    <!-- 탭 내용 -->
                    <div class="p-8">
                        <!-- 상품 상세 -->
                        <div x-show="activeTab === 'description'" class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">상품 설명</h3>
                                <div class="prose max-w-none text-gray-700">
                                    <p>{{ $product->description ?: '상품 설명이 준비 중입니다.' }}</p>

                                    <div class="mt-6">
                                        <h4 class="font-semibold text-gray-900 mb-2">주요 특징</h4>
                                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                                            <li>고품질 소재로 제작된 프리미엄 제품</li>
                                            <li>세련된 디자인과 뛰어난 실용성</li>
                                            <li>다양한 스타일링에 활용 가능</li>
                                            <li>편안한 착용감과 내구성</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 제품 사양 -->
                        <div x-show="activeTab === 'specifications'" class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">제품 사양</h3>
                                <div class="space-y-3">
                                    @if($product->weight)
                                        <div class="flex justify-between py-3 border-b border-gray-100">
                                            <span class="text-gray-600 font-medium">무게</span>
                                            <span class="text-gray-900">{{ $product->weight }}g</span>
                                        </div>
                                    @endif
                                    @if($product->dimensions)
                                        <div class="flex justify-between py-3 border-b border-gray-100">
                                            <span class="text-gray-600 font-medium">크기</span>
                                            <span class="text-gray-900">
                                                {{ implode(' x ', $product->dimensions) }}cm
                                            </span>
                                        </div>
                                    @endif
                                    <div class="flex justify-between py-3 border-b border-gray-100">
                                        <span class="text-gray-600 font-medium">소재</span>
                                        <span class="text-gray-900">고급 원단</span>
                                    </div>
                                    <div class="flex justify-between py-3 border-b border-gray-100">
                                        <span class="text-gray-600 font-medium">제조국</span>
                                        <span class="text-gray-900">한국</span>
                                    </div>
                                    <div class="flex justify-between py-3 border-b border-gray-100">
                                        <span class="text-gray-600 font-medium">브랜드</span>
                                        <span class="text-gray-900">Vesto</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 리뷰 -->
                        <div x-show="activeTab === 'reviews'" class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">고객 리뷰</h3>
                                <flux:button variant="outline">리뷰 작성</flux:button>
                            </div>

                            <!-- 평점 요약 -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-center space-x-4">
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-gray-900">4.0</div>
                                        <div class="flex justify-center mt-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <div class="text-sm text-gray-600 mt-1">24개 리뷰</div>
                                    </div>
                                    <div class="flex-1 space-y-2">
                                        @foreach([5, 4, 3, 2, 1] as $star)
                                            <div class="flex items-center space-x-2">
                                                <span class="text-sm text-gray-600 w-8">{{ $star }}점</span>
                                                <div class="flex-1 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $star == 4 ? '60%' : ($star == 5 ? '25%' : '5%') }}"></div>
                                                </div>
                                                <span class="text-sm text-gray-600 w-8">{{ $star == 4 ? '15' : ($star == 5 ? '6' : '1') }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- 리뷰 목록 -->
                            <div class="space-y-6">
                                @for($i = 1; $i <= 3; $i++)
                                    <div class="border-b border-gray-200 pb-6 last:border-b-0">
                                        <div class="flex items-start space-x-4">
                                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                                <span class="text-sm font-medium text-gray-700">{{ chr(64 + $i) }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-2 mb-2">
                                                    <h4 class="font-medium text-gray-900">사용자{{ $i }}</h4>
                                                    <div class="flex">
                                                        @for($j = 1; $j <= 5; $j++)
                                                            <svg class="w-4 h-4 {{ $j <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                    <span class="text-sm text-gray-500">2024년 {{ 12 - $i }}월</span>
                                                </div>
                                                <p class="text-gray-700">정말 만족스러운 상품입니다. 품질도 좋고 디자인도 예뻐요. 다음에도 이용할 것 같습니다.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <!-- 배송 정보 -->
                        <div x-show="activeTab === 'shipping'" class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">배송 정보</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-4">
                                        <div class="flex items-start space-x-3">
                                            <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                            <div>
                                                <h4 class="font-medium text-gray-900">무료배송</h4>
                                                <p class="text-sm text-gray-600">5만원 이상 구매 시 무료배송</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start space-x-3">
                                            <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div>
                                                <h4 class="font-medium text-gray-900">빠른배송</h4>
                                                <p class="text-sm text-gray-600">당일 오후 2시 이전 주문 시 당일발송</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex items-start space-x-3">
                                            <svg class="w-5 h-5 text-purple-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div>
                                                <h4 class="font-medium text-gray-900">안전포장</h4>
                                                <p class="text-sm text-gray-600">파손 방지를 위한 안전 포장</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start space-x-3">
                                            <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            <div>
                                                <h4 class="font-medium text-gray-900">교환/반품</h4>
                                                <p class="text-sm text-gray-600">구매 후 7일 이내 교환/반품 가능</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 연관 상품 섹션 -->
            @if($relatedProducts->isNotEmpty())
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">연관 상품</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($relatedProducts as $relatedProduct)
                                <div class="group cursor-pointer">
                                    <a href="{{ route('products.show', $relatedProduct) }}" class="block">
                                        <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden mb-4 group-hover:opacity-75 transition-opacity">
                                            @if($relatedProduct->image_url)
                                                <img src="{{ $relatedProduct->image_url }}"
                                                     alt="{{ $relatedProduct->name }}"
                                                     class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-sm font-medium text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                            {{ $relatedProduct->name }}
                                        </h3>
                                        <div class="space-y-1">
                                            @if($relatedProduct->isOnSale())
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-lg font-bold text-red-600">
                                                        ₩{{ number_format($relatedProduct->getEffectivePrice()) }}
                                                    </span>
                                                    <span class="text-sm text-gray-500 line-through">
                                                        ₩{{ number_format($relatedProduct->price) }}
                                                    </span>
                                                </div>
                                                <span class="inline-block bg-red-100 text-red-800 px-2 py-0.5 rounded text-xs font-medium">
                                                    {{ $relatedProduct->getDiscountPercentage() }}% OFF
                                                </span>
                                            @else
                                                <span class="text-lg font-bold text-gray-900">
                                                    ₩{{ number_format($relatedProduct->price) }}
                                                </span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>