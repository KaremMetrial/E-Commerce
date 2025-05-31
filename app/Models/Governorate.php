<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Governorate extends Model
    {
        protected $fillable = ['name', 'country_id'];
        public $timestamps = false;

        public function cities(): HasMany
        {
            return $this->hasMany(City::class);
        }

        public function country(): BelongsTo
        {
            return $this->belongsTo(Country::class);
        }
        public function shippingGovernorates(): HasMany
        {
            return $this->hasMany(ShippingGovernorate::class);
        }
    }
