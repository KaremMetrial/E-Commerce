<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Transaction extends Model
    {
        protected $fillable = ['payment_method', 'transaction_id', 'order_id'];

        public function order(): BelongsTo
        {
            return $this->belongsTo(Order::class);
        }
    }
