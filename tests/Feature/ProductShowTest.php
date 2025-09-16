<?php

use App\Models\Product;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('authenticated user can view product details', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create([
        'name' => 'Test Product',
        'description' => 'Test description',
        'price' => 50000,
        'stock_quantity' => 10,
        'is_active' => true,
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertViewIs('products.show')
        ->assertViewHas('product', $product)
        ->assertViewHas('relatedProducts')
        ->assertSee($product->name)
        ->assertSee($product->description)
        ->assertSee('₩50,000');
});

test('product show page displays sale price correctly', function () {
    $user = User::factory()->create();
    $product = Product::factory()->onSale()->create([
        'name' => 'Sale Product',
        'price' => 100000,
        'sale_price' => 80000,
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('₩80,000')
        ->assertSee('₩100,000')
        ->assertSee('20% OFF');
});

test('product show page displays out of stock status', function () {
    $user = User::factory()->create();
    $product = Product::factory()->outOfStock()->create();

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('품절')
        ->assertSee('구매 불가');
});

test('product show page displays product tags', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create([
        'tags' => ['패션', '스타일', '트렌드'],
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('패션')
        ->assertSee('스타일')
        ->assertSee('트렌드');
});

test('product show page displays weight and dimensions', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create([
        'weight' => 500,
        'dimensions' => [30, 20, 10],
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('500g')
        ->assertSee('30 x 20 x 10');
});

test('product show page displays stock quantity', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create([
        'stock_quantity' => 5,
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('재고 5개');
});

test('unauthenticated user can access product show page', function () {
    $product = Product::factory()->create();

    $response = $this->get(route('products.show', $product));

    $response->assertOk();
});

test('product show page returns 404 for non-existent product', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/products/999999');

    $response->assertNotFound();
});

test('product show page displays related products', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create([
        'category_id' => null,
        'brand_id' => null,
    ]);

    // 연관 상품들 생성 (같은 카테고리, 브랜드)
    $relatedProducts = Product::factory()->count(3)->create([
        'category_id' => null,
        'brand_id' => null,
        'is_active' => true,
        'stock_quantity' => 5,
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('연관 상품');

    // 연관 상품들이 표시되는지 확인
    foreach ($relatedProducts as $relatedProduct) {
        $response->assertSee($relatedProduct->name);
    }
});

test('product show page displays tabs correctly', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('상품 상세')
        ->assertSee('제품 사양')
        ->assertSee('리뷰 (24)')
        ->assertSee('배송 정보');
});

test('product show page displays review section', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('고객 리뷰')
        ->assertSee('리뷰 작성')
        ->assertSee('4.0')
        ->assertSee('24개 리뷰');
});

test('product show page displays shipping information', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('무료배송')
        ->assertSee('빠른배송')
        ->assertSee('안전포장')
        ->assertSee('교환/반품');
});

test('product show page displays image gallery with additional images', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create([
        'image_url' => 'https://example.com/main.jpg',
        'additional_images' => [
            'https://example.com/detail1.jpg',
            'https://example.com/detail2.jpg',
            'https://example.com/detail3.jpg',
            'https://example.com/detail4.jpg',
        ],
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('https://example.com/main.jpg')
        ->assertSee('https://example.com/detail1.jpg')
        ->assertSee('https://example.com/detail2.jpg')
        ->assertSee('https://example.com/detail3.jpg')
        ->assertSee('https://example.com/detail4.jpg')
        ->assertSee('selectedImage:', false);
});

test('product model helper methods work correctly', function () {
    $product = Product::factory()->create([
        'price' => 100000,
        'sale_price' => 80000,
    ]);

    expect($product->isOnSale())->toBeTrue();
    expect($product->getDiscountPercentage())->toBe(20);
    expect($product->getEffectivePrice())->toBe(80000.0);

    $productNoSale = Product::factory()->create([
        'price' => 50000,
        'sale_price' => null,
    ]);

    expect($productNoSale->isOnSale())->toBeFalse();
    expect($productNoSale->getDiscountPercentage())->toBeNull();
    expect($productNoSale->getEffectivePrice())->toBe(50000.0);
});

test('product show page displays rating stars', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertOk()
        ->assertSee('4.0 (24 리뷰)');
});
