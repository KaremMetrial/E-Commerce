<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Product extends Model
    {
        protected $fillable = [
            'name',
            'small_description',
            'description',
            'status',
            'sku',
            'available_for',
            'price',
            'discount',
            'start_discount',
            'end_discount',
            'manage_stock',
            'quantity',
            'available_in_stock',
            'views',
            'brand_id',
            'category_id',
        ];

        public function brand(): BelongsTo
        {
            return $this->belongsTo(Brand::class);
        }

        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

        public function images(): HasMany
        {
            return $this->hasMany(ProductImage::class);
        }

        public function previews(): HasMany
        {
            return $this->hasMany(ProductPreview::class);
        }

        public function wishlists(): HasMany
        {
            return $this->hasMany(Wishlist::class);
        }

        public function orderItems(): HasMany
        {
            return $this->hasMany(OrderItem::class);
        }
        public function productTags(): HasMany
        {
            return $this->hasMany(ProductTag::class);

        }
    }
