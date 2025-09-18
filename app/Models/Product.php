<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'image_url',
        'additional_images',
        'category_id',
        'brand_id',
        'is_active',
        'weight',
        'dimensions',
        'tags',
    ];

    protected $casts = [
        'price'             => 'decimal:2',
        'sale_price'        => 'decimal:2',
        'is_active'         => 'boolean',
        'dimensions'        => 'array',
        'tags'              => 'array',
        'additional_images' => 'array',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getRelatedProducts(int $limit = 4)
    {
        return self::where('id', '!=', $this->id)
            ->where('is_active', true)
            ->where('stock_quantity', '>', 0)
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->when($this->brand_id, function ($query) {
                $query->where('brand_id', $this->brand_id);
            })
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    public function getDiscountPercentage(): ?int
    {
        if (!$this->sale_price || $this->sale_price >= $this->price) {
            return null;
        }

        return (int)round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    public function getEffectivePrice(): float
    {
        return $this->sale_price && $this->sale_price < $this->price
            ? (float)$this->sale_price
            : (float)$this->price;
    }

    public function isOnSale(): bool
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }
}
