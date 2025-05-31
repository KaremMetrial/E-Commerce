<?php

    namespace App\Models;

    use App\Enums\OrderStatus;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Order extends Model
    {
        protected $fillable = [
            'user_name',
            'user_phone',
            'user_email',
            'price',
            'shipping_price',
            'total_price',
            'note',
            'status',
            'country',
            'governorate',
            'city',
            'street',
            'user_id',
        ];
        protected $casts = [
            'status' => OrderStatus::class,
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
        public function items(): HasMany
        {
            return $this->hasMany(OrderItem::class);
        }
        public function transactions(): HasMany
        {
            return $this->hasMany(Transaction::class);
        }
    }
